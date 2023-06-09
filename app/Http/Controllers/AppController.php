<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\AppConfigurations;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;

class AppController extends Controller
{
    public function index(Request $request)
    {
//        dd($request->cookie());
//        Auth::user()->api()->re
        return view('welcome');
    }

    public function call()
    {
        return view('content.config-modes.call');
    }

    public function callandwhatsapp()
    {
        return view('content.config-modes.callandwhatsapp');
    }

    public function whatsapp()
    {
        return view('content.config-modes.whatsapp');
    }

    /**
     * @param Request $request
     */
    public function save_config(Request $request)
    {
        $config = new AppConfigurations();
        $msg = '';
        $shop = Auth::user()->getAuthIdentifier();
        $check_config = DB::table('app_configurations')->where('shop_id', $shop)->exists();
        if (!$check_config) {
            $config->store_configuration($request, $shop);
            $msg = 'Configuration has been saved.';
        } else {
            $config->update_configuration($request, $shop);
            $msg = 'Configuration has been updated.';
        }
        return response($msg, 200);
    }

    public function callback(Request $request)
    {
        // Verify the request is from Shopify (using HMAC validation)

        $shop = User::where('name', $request->shop)->firstOrFail();

        $accessToken = Auth::user()->api()->requestAccessToken($request->code);

        // Store the access token
        $shop->access_token = $accessToken;
        $shop->save();

        // Perform any necessary setup or additional logic

        return redirect()->route('home'); // Redirect to the desired page after authentication
    }



}
