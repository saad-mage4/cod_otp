@php
$shop_id = \Illuminate\Support\Facades\Auth::id();
$config = new App\Models\AppConfigurations();
$exist = $config->config_exist($shop_id);
if ($exist == true) {
$app = $config->load_configuration($shop_id);
}
@endphp

<form id="settings">
    {{-- Application status --}}
    <div class="grid-box">
        <div class="box left">
            <div class="text">
                <h2>Application status</h2>
                <p>
                    Enable or disable the app.
                </p>
            </div>
        </div>
        <div class="box right">
            <div class="item">
                <label for="enb-dis">Status</label>
                <select name="app_status">
                    @if($exist == true)
                    <option value="{{$app['app_status']}}" selected hidden="">{{$app['app_status']}}</option>
                    <option value="Disable">Disable</option>
                    <option value="Enable">Enable</option>
                    @else
                    <option value="Disable">Disable</option>
                    <option value="Enable">Enable</option>
                    @endif

                </select>
            </div>
        </div>
    </div>

    {{-- Verification Mode --}}
    <div class="grid-box">
        <div class="box left">
            <div class="text">
                <h2>Verification Mode</h2>
                <p>On place new COD order action will be done based on selected mode and as per customer input app will
                    add tags in the order.</p>
            </div>
        </div>
        <div class="box right">
            <div class="boxs">
                @if($exist==true)
                <div class="boxs_data box_click {{$app['app_mode'] == 'Call' ? 'box_selected':''}}" data-mode="Call">
                    @else
                    <div class="boxs_data box_click" data-mode="Call">
                        @endif

                        <i class="fa-solid fa-phone"></i>
                        <h3>Voice Call Mode</h3>
                        <h2>Confirm COD orders only by voice cal</h2>
                    </div>
                    @if($exist==true)
                    <div class="boxs_data box_click {{$app['app_mode'] == 'WhatsApp' ? 'box_selected':''}}" data-mode="WhatsApp">
                        @else
                        <div class="boxs_data box_click " data-mode="WhatsApp">
                            @endif
                            <i class="fa-brands fa-whatsapp"></i>
                            <h3>WhatsApp Mode</h3>
                            <h2>Confirm COD orders only by WhatsApp</h2>
                        </div>

                        @if($exist==true)
                        <div class="boxs_data box_click {{$app['app_mode'] == 'Call/WhatsApp' ? 'box_selected':''}}" data-mode="Call/WhatsApp">
                            @else
                            <div class="boxs_data box_click" data-mode="Call/WhatsApp">
                                @endif

                                <i class="fa-solid fa-envelopes-bulk"></i>
                                <h3>Call & WhatsApp Mode</h3>
                                <h2>Confirm orders by call or WhatsApp</h2>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Render content -->
                <div class="box_content"></div>


                {{-- Follow-up Settings --}}
                <div class="grid-box">
                    <div class="box left">
                        <div class="text">
                            <h2>Follow-up Settings </h2>
                            <p>
                                Trigger follow-up calls if your customer doesn't
                                answer the first call.
                            </p>
                        </div>
                    </div>
                    <div class="box right">
                        <div class="item">
                            <label for="follow_up_calls">Status</label>
                            <select name="follow_up_call" id="follow_up_calls">
                                @if($exist==true)
                                <option value="{{$app['follow_up_call']}}" selected hidden="">{{$app['follow_up_call']}}</option>
                                <option value="Enable">Enable</option>
                                <option value="Disable">Disable</option>
                                @else
                                <option value="Disable">Disable</option>
                                <option value="Enable">Enable</option>
                                @endif
                            </select>
                            <div class="intervals {{($app['follow_up_call'] == 'Enable') ? '' : 'hide'}}">
                                <label for="configuration_call_followup_time">You can also select the follow-up
                                    calls time intervals
                                    in drop down list</label>
                                <select id="configuration_call_followup_time" name="follow_up_call_mins">
                                @if($exist==true)
                                <option value="<?=($app['follow_up_call_mins'])?>" selected hidden><?=($app['follow_up_call_mins'])?> minute later</option>
                                <option value="20">20 minute later</option>
                                <option value="40">40 minute later(recommended)</option>
                                <option value="60">60 minute later</option>
                                @else
                                <option value="20">20 minute later</option>
                                <option value="40" selected="">40 minute later(recommended)</option>
                                <option value="60">60 minute later</option>
                                @endif
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Cancel Order --}}
                <div class="grid-box">
                    <div class="box left">
                        <div class="text">
                            <h2>Cancel Order</h2>
                            <p>Want to automatically cancel order and restock items?</p>
                        </div>
                    </div>
                    <div class="box right">
                        <div class="item">
                            <div class="ckeckbox_div">
                                <label for="cancel_order">If an order is cancelled, automatically cancel the order
                                    in Shopify.</label>
                                @if($exist==true)
                                <input type="checkbox" name="cancel_order" {{$app['cancel_order'] == '1' ? 'checked':''}} id="cancel_order" />
                                @else
                                <input type="checkbox" name="cancel_order" id="cancel_order" />
                                @endif
                            </div>
                            <p class="ckeckbox_div_P">
                                NOTE: If you have selected the "automatically
                                cancel the order in Shopify" checkbox, we also
                                auto restock items from the cancelled order.
                            </p>
                        </div>
                    </div>
                </div>
                {{-- Prepaid Orders --}}
                <div class="grid-box">
                    <div class="box left">
                        <div class="text">
                            <h2>Prepaid Orders</h2>
                            <p>Would you like to validate pre-paid orders?</p>
                        </div>
                    </div>
                    <div class="box right">
                        <div class="item">
                            <div class="ckeckbox_div">
                                <label for="prepaid_orders">
                                    Enable verification for non-COD/Prepaid
                                    orders as well.
                                </label>
                                @if($exist==true)
                                <input type="checkbox" name="prepaid_order" {{$app['prepaid_order'] == '1' ? 'checked':''}} id="prepaid_orders" />
                                @else
                                <input type="checkbox" name="prepaid_order" id="prepaid_orders" />
                                @endif
                            </div>
                        </div>
                    </div>

                    <input type="hidden" name="mode" value="">
                </div>
                <button type="submit" class="button submit-form">Save</button>

</form>


<script>
    $(document).ready(function() {
        let mode = '<?= $app['app_mode'] ?>';
        if (mode == 'Call') {
            setTimeout(() => {
                $(`.box_click[data-mode="${mode}"]`).trigger('click');
            }, 500);
        } else if (mode == 'WhatsApp') {
            setTimeout(() => {
                $(`.box_click[data-mode="${mode}"]`).trigger('click');
            }, 500);
        } else if(mode == 'Call/WhatsApp') {
            setTimeout(() => {
                $(`.box_click[data-mode="${mode}"]`).trigger('click');
            }, 500);
        }
    });
</script>