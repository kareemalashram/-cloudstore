<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubCategoriesRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class SubCategoriesController extends Controller
{
    public function index()
    {
        $categories = Category::child()->orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.subcategories.home', compact('categories'));
    }


    public function create()
    {
        $categories = Category::parent()->orderBy('id', 'DESC')->get();
        return view('dashboard.subcategories.create', compact('categories'));
    }


    public function store(SubCategoriesRequest $request)
    {

        try {

            DB::beginTransaction();

            if (!$request->has('is_active'))
                $request->request->add(['is_active' => 0]);
            else
                $request->request->add(['is_active' => 1]);

            $category = Category::create($request->except('_token'));


            //save translation
            $category->name = $request->name;
            $category->save();

            DB::commit();
            return redirect()->route('subcategories.index')->with(['success' => 'تم الاضافة بنجاح']);

        } catch (Exception $exception) {

            DB::rollBack();
            return redirect()->back()->with(['success' => 'هناك خطأ ما يرجى المحاولة في ما بعد']);

        }
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::orderBy('id', 'DESC')->find($id);

        if (!$category)

            return redirect()->route('subcategories.index')->with(['error' => 'هذا القسم غير موجود ']);

        $categories = Category::parent()->orderBy('id', 'DESC')->get();


        return view('dashboard.subcategories.edit', compact('category', 'categories'));


//        $categories = Category::orderBy('id', 'DESC')->find($id);
//
//        if (!$categories)
//
//            return redirect()->route('subcategories.index')->with(['error' => 'هذا القسم غير موجود ']);
//
//        return view('dashboard.subcategories.edit', compact('categories'));
    }


    public function update(SubCategoriesRequest $request, $id)
    {
        try {
            //validation

            //update


            $category = Category::find($id);

            if (!$category)
                return redirect()->route('subcategories.index')->with(['error' => 'هذا القسم غير موجود']);

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

                return redirect()->route('subcategories.index')->with(['error' => 'هذا القسم غير موجود ']);

            $categories->delete();
            return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);

        } catch (Exception $exception) {

            return redirect()->back()->with(['error' => 'هناك خطأ ما يرجى المحاولة في ما بعد']);

        }
    }
}
