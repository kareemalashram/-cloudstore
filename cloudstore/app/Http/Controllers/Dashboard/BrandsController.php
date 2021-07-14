<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\BrandsRequest;
use App\Http\Requests\ProfilesRequest;
use App\Http\Requests\SubCategoriesRequest;
use App\Models\Admin;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

use Illuminate\Http\Request;
use function Sodium\add;

class BrandsController extends Controller
{
    public function index()
    {
        $brands = Brand::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.brands.home', compact('brands'));
    }


    public function create()
    {

        return view('dashboard.brands.create');
    }


    public function store(BrandsRequest $request)
    {

        try {

            DB::beginTransaction();


            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);


            $fileName = "";
            if ($request->has('photo')){
                $fileName = uploadImage('brands', $request->photo);
            }
            $brand = Brand::create($request->except('_token','photo'));


            //save translation
            $brand->name = $request->name;
            $brand->photo =$fileName;
            $brand->save();

            DB::commit();
            return redirect()->route('brands.index')->with(['success' => 'تم الاضافة بنجاح']);

        } catch (Exception $exception) {

            DB::rollBack();
            return redirect()->back()->with(['success' => 'هناك خطأ ما يرجى المحاولة في ما بعد']);



        }
    }



    public function edit($id)
    {
        $brand = Brand::find($id);

        if (!$brand)

            return redirect()->route('brands.index')->with(['error' => 'هذا الماركة غير موجود ']);


        return view('dashboard.brands.edit', compact('brand'));

    }


    public function update($id, BrandsRequest $request)
    {
        try {
            //validation

            //update

            $brand = Brand::find($id);


            if (!$brand)
                return redirect()->route('brands.index')->with(['error' => 'هذا الماركة غير موجود']);
            DB::beginTransaction();

            if ($request->has('photo')) {

                $fileName = uploadImage('brands', $request->photo);
                Brand::where('id', $id)
                    ->update([
                        'photo' => $fileName,
                    ]);
            }


            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $brand->update($request->except('_token', 'id', 'photo'));


            //save translation
            $brand->name = $request->name;
            $brand->save();
            DB::commit();


            return redirect()->route('brands.index')->with(['success' => 'تم التحديث بنجاح']);

        } catch (Exception $exception) {
            DB::rollBack();

            return redirect()->route('brands.index')->with(['error' => 'هناك خطأ ما يرجى المحاولة في ما بعد']);

        }
    }


    public function destroy($id)
    {
        try {
            $brand = Brand::find($id);

            if (!$brand)

                return redirect()->route('brands.index')->with(['error' => 'هذا القسم غير موجود ']);

            $brand->delete();
            return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);

        } catch (Exception $exception) {

            return redirect()->back()->with(['error' => 'هناك خطأ ما يرجى المحاولة في ما بعد']);

        }
    }
}
