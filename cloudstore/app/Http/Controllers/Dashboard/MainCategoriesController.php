<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Enumerations\CategoryType;
use App\Http\Requests\MainCategoriesRequest;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class MainCategoriesController extends Controller
{

    public function index()
    {
        $categories = Category::with('_parent')->orderBy('id','DESC') ->paginate(PAGINATION_COUNT);
        return view('dashboard.categories.home', compact('categories'));
    }


    public function create()
    {
        $categories = Category::select('id','parent_id')->get();

        return view('dashboard.categories.create',compact('categories'));
    }


    public function store(MainCategoriesRequest $request)
    {

        try {

            DB::beginTransaction();

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            if ($request -> type == CategoryType::mainCategory)
            {
                $request->request->add(['parent_id' => null]);

            }

            $category = Category::create($request->except('_token'));


            //save translation
            $category->name = $request->name;
            $category->save();

            DB::commit();
            return redirect()->route('categories.index')->with(['success' => 'تم الاضافة بنجاح']);

        } catch (Exception $exception) {

            DB::rollBack();
            return redirect()->back()->with(['success' => 'هناك خطأ ما يرجى المحاولة في ما بعد']);

        }
    }





    public function edit($id)
    {
        $categories = Category::orderBy('id', 'DESC')->find($id);

        if (!$categories)

            return redirect()->route('categories.index')->with(['error' => 'هذا القسم غير موجود ']);

        return view('dashboard.categories.edit', compact('categories'));
    }


    public function update(MainCategoriesRequest $request, $id)
    {
        try {
            //validation

            //update


            $category = Category::find($id);

            if (!$category)
                return redirect()->route('categories.index')->with(['error' => 'هذا القسم غير موجود']);

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $category->update($request->all());


            //save translation
            $category->name = $request->name;
            $category->save();


            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        } catch (Exception $exception) {

            return redirect()->back()->with(['error' => 'هناك خطأ ما يرجى المحاولة في ما بعد']);

        }
    }


    public function destroy($id)
    {
        try {
            $categories = Category::orderBy('id', 'DESC')->find($id);

            if (!$categories)

                return redirect()->route('categories.index')->with(['error' => 'هذا القسم غير موجود ']);

            $categories->delete();
            return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);

        } catch (Exception $exception) {

            return redirect()->back()->with(['error' => 'هناك خطأ ما يرجى المحاولة في ما بعد']);

        }
    }
}
