@php
    $shop_id = \Illuminate\Support\Facades\Auth::id();
    $config = new App\Models\AppConfigurations();
    $exist = $config->config_exist($shop_id);
    if ($exist == true) {
        $app = $config->load_configuration($shop_id);
    }
@endphp

<div class="grid-box_overview">
    <div class="content_overview ">
        <div class="box_left_overview">
            <div class="boxs_overview">
                <div class="boxs_data_overview">
                    <div class="boxs_data_overview_item1">
                        <h1>Total Orders</h1>
                        <div class="icons icon_background1">
                            <i class="fa-solid fa-people-carry-box "></i>
                        </div>
                    </div>
                    <div class="boxs_data_overview_item1_bottom">
                        <p>0</p>
                        <a>View Reports</a>
                    </div>
                </div>
                <div class="boxs_data_overview">
                    <div class="boxs_data_overview_item1">
                        <h1>Confirmed Orders</h1>
                        <div class="icons icon_background2">
                            <i class="fa-solid fa-check"></i>
                        </div>
                    </div>
                    <div class="boxs_data_overview_item1_bottom">
                        <p>0</p>
                        <a>View Reports</a>
                    </div>
                </div>
                <div class="boxs_data_overview">
                    <div class="boxs_data_overview_item1">
                        <h1>Canceled Orders</h1>
                        <div class="icons icon_background3">
                            <i class="fa-solid fa-xmark "></i>
                        </div>
                    </div>
                    <div class="boxs_data_overview_item1_bottom">
                        <p>0</p>
                        <a>View Reports</a>
                    </div>
                </div>
                <div class="boxs_data_overview">
                    <div class="boxs_data_overview_item1">
                        <h1>Pending Orders</h1>
                        <div class="icons icon_background4">
                            <i class="fa-solid fa-exclamation "></i>
                        </div>
                    </div>
                    <div class="boxs_data_overview_item1_bottom">
                        <p>0</p>
                        <a>View Reports</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content_overview">
        <div class="box_right_overview">
            <div class="item">
                <h1>Account and Payments</h1>
                <div class="box_right_overview_account">
                    <h2>Account</h2>
                    <div class="box_right_overview_account_Main">
                        <div class="box_right_overview_account_Status_Details">
                            App Status
                            <span class="box_right_overview_account_Status">
                                @if($exist == true)
                                    {{$app['app_status']}}d
                                @else
                                    Not Selected
                                @endif
                                    </span>
                        </div>
                        <div class="box_right_overview_account_Mode_Details">
                            App Mode
                            <span class="box_right_overview_account_Mode_Status">
                                @if($exist == true)
                                    {{$app['app_mode']}}
                                @else
                                    Not Selected
                                @endif
                                    </span>
                        </div>
                    </div>
                </div>
                <div class="box_right_overview_account">
                    <h2>Payment</h2>
                    <div class="box_right_overview_account_Main">
                        <div class="box_right_overview_account_Status_Details">
                            Payment Mode:
                            <span>Trial</span>
                        </div>
                        <div class="box_right_overview_account_Mode_Details">
                            Remaining Credits :<span>$0.500</span>
                        </div>
                    </div>
                    <div class="box_right_overview_account_button">
                        <a>+Add Credits</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
