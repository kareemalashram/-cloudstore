<?php

namespace App\Http\Controllers\Dashboard;
use App\Http\Controllers\Controller;
use App\Http\Requests\TagsRequest;
use App\Models\Tag;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class TagsController extends Controller
{
    public function index()
    {
        $tags = Tag::orderBy('id', 'DESC')->paginate(PAGINATION_COUNT);
        return view('dashboard.tages.home', compact('tags'));
    }


    public function create()
    {

        return view('dashboard.tages.create');
    }


    public function store(TagsRequest $request)
    {



            DB::beginTransaction();

            $tags = Tag::create(['slug' => $request -> slug]);

            //save translation
            $tags->name = $request->name;
            $tags->save();

            DB::commit();
            return redirect()->route('tags.index')->with(['success' => 'تم الاضافة بنجاح']);

    }


    public function edit($id)
    {
        $tag = Tag::find($id);

        if (!$tag)

            return redirect()->route('tags.index')->with(['error' => 'هذا الماركة غير موجود ']);


        return view('dashboard.tages.edit', compact('tag'));

    }


    public function update($id, TagsRequest $request)
    {
        try {
            //validation

            //update

            $tag = Tag::find($id);


            if (!$tag)
                return redirect()->route('tags.index')->with(['error' => 'هذا tag غير موجود']);
            DB::beginTransaction();


            $tag->update($request->except('_token', 'id', 'photo'));


            //save translation
            $tag->name = $request->name;
            $tag->save();
            DB::commit();


            return redirect()->route('tags.index')->with(['success' => 'تم التحديث بنجاح']);

        } catch (Exception $exception) {
            DB::rollBack();

            return redirect()->route('tags.index')->with(['error' => 'هناك خطأ ما يرجى المحاولة في ما بعد']);

        }
    }


    public function destroy($id)
    {
        try {
            $tag = Tag::find($id);

            if (!$tag)

                return redirect()->route('tags.index')->with(['error' => 'هذا القسم غير موجود ']);

            $tag->delete();
            return redirect()->back()->with(['success' => 'تم الحذف بنجاح']);

        } catch (Exception $exception) {

            return redirect()->back()->with(['error' => 'هناك خطأ ما يرجى المحاولة في ما بعد']);

        }
    }
}
