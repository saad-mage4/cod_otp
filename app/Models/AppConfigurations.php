<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppConfigurations extends Model
{
    use HasFactory;

    /**
     * @param $request
     * @param $shop
     * @return void
     */
    public function store_configuration($request, $shop): void
    {
        $new = new AppConfigurations();
        $new->shop_id = $shop;
        $new->app_status = $request->app_status;
        $new->app_mode = $request->mode;
        $new->schedule_delay_call = (int)$request->schedule_delay_call;
        $new->schedule_delay_call_mins = $request->schedule_delay_call_mins;
        $new->follow_up_call = $request->follow_up_call;
        $new->follow_up_call_mins = $request->follow_up_call_mins;
        $new->cancel_order = (int)$request->cancel_order;
        $new->prepaid_order = (int)$request->prepaid_order;
        $new->save();
    }

    /**
     * @param $request
     * @param $shop
     * @return void
     */
    public function update_configuration($request, $shop): void
    {
        AppConfigurations::where('shop_id', $shop)->update(
            ['app_status' => $request->app_status,
                'app_mode' => $request->mode,
                'schedule_delay_call' => (int)$request->schedule_delay_call,
                'schedule_delay_call_mins' => $request->schedule_delay_call_mins,
                'follow_up_call' => $request->follow_up_call,
                'follow_up_call_mins' => $request->follow_up_call_mins,
                'cancel_order' => (int)$request->cancel_order,
                'prepaid_order' => (int)$request->prepaid_order]
        );
    }

    public function load_configuration($shop_id)
    {
        $shop_config = AppConfigurations::query()->select('*')->where('shop_id', $shop_id)->get()->toArray();
        $shop_config = $shop_config[0];
        return $shop_config;
    }

    /**
     * @param $shop_id
     * @return bool
     */
    public function config_exist($shop_id): bool
    {
        $exist = AppConfigurations::query()->where('shop_id', $shop_id)->exists();
        return $exist;
    }

}
