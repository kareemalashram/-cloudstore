<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProfilesRequest;
use App\Models\Admin;
use Mockery\Exception;

use Illuminate\Http\Request;
use function Sodium\add;

class ProfileController extends Controller
{
    public function editProfile (){

    $admin = Admin::find(auth('admin')->user()->id);

    return view('dashboard.profile.edit',compact('admin'));

    }

    public function updatePerofile (ProfilesRequest $request){

        try{

            $admin = Admin::find(auth('admin')->user()->id);


            if ($request->filled('password')){

                $request->merge(['password' => bcrypt($request->password)]);
            }

            unset($request['id']);
            unset($request['password_confirmation']);

            $admin->update($request->all());

            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        }catch (Exception $exception){

            return redirect()->back()->with(['error' => 'هناك خطأ ما يرجى المحاولة في ما بعد']);

        }


    }


}
