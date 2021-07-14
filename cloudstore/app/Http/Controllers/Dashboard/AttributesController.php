<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\AttributeRequest;
use App\Http\Requests\BrandRequest;
use App\Http\Requests\MainCategoryRequest;
use App\Models\Attribute;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;

class AttributesController extends Controller
{

    public function index()
    {
        $attributes = Attribute::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.attributes.home', compact('attributes'));
    }

    public function create()
    {
        return view('dashboard.attributes.create');
    }


    public function store(AttributeRequest $request)
    {


        DB::beginTransaction();
        $attribute = Attribute::create([]);

        //save translations
        $attribute->name = $request->name;
        $attribute->save();
        DB::commit();
        return redirect()->route('attributes.index')->with(['success' => 'تم ألاضافة بنجاح']);



    }


    public function edit($id)
    {

        $attribute = Attribute::find($id);

        if (!$attribute)
            return redirect()->route('attributes.index')->with(['error' => 'هذا العنصر  غير موجود ']);

        return view('dashboard.attributes.edit', compact('attribute'));

    }


    public function update($id, AttributeRequest $request)
    {
        try {

            $attribute = Attribute::find($id);

            if (!$attribute)
                return redirect()->route('attributes.index')->with(['error' => 'هذا العنصر غير موجود']);


            DB::beginTransaction();

            //save translations
            $attribute->name = $request->name;
            $attribute->save();

            DB::commit();
            return redirect()->route('attributes.index')->with(['success' => 'تم ألتحديث بنجاح']);

        } catch (\Exception $ex) {

            DB::rollback();
            return redirect()->route('attributes.index')->with(['error' => 'حدث خطا ما برجاء المحاوله لاحقا']);
        }

    }


    public function destroy($id)
    {
        try {
            $attribute = Attribute::orderBy('id', 'DESC')->find($id);

            if (!$attribute)

                return redirect()->route('subcategories.index')->with(['error' => 'هذا القسم غير موجود ']);

            $attribute->delete();
            return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);

        } catch (Exception $exception) {

            return redirect()->back()->with(['error' => 'هناك خطأ ما يرجى المحاولة في ما بعد']);

        }
    }

}
