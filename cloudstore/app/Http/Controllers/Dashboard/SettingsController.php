<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\ShippingsRequest;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;


class SettingsController extends Controller
{

    public function editShippingMethods($type)
    {

        //free , inner , outer for shipping method

        if ($type === 'free')
            $shippingMethod = Setting::where('key', 'free_shipping_label')->first();

        elseif ($type === 'inner')
            $shippingMethod = Setting::where('key', 'local_label')->first();

        elseif ($type === 'outer')
            $shippingMethod = Setting::where('key', 'outer_label')->first();
        else
            $shippingMethod = Setting::where('key', 'free_shipping_label')->first();

        return view('dashboard.setting.shippings.edit', compact('shippingMethod'));
    }


    /**
     * @param ShippingsRequest $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateShippingMethods(ShippingsRequest $request, $id)
    {

        try{

            DB::beginTransaction();
            $shipping_method = Setting::find($id);

            $shipping_method->update(['plain_value' => $request->plain_value]);

            //save translations
            $shipping_method->value = $request->value;
            $shipping_method->save();

            DB::commit();
            return redirect()->back()->with(['success' => 'تم التحديث بنجاح']);

        }catch (Exception $exception){

            return redirect()->back()->with(['success' => 'هناك خطأ ما يرجى المحاولة في ما بعد']);
            DB::rollBack();

        }
    }

}
