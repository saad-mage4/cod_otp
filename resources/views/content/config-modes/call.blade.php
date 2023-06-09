@php
$shop_id = \Illuminate\Support\Facades\Auth::id();
$config = new App\Models\AppConfigurations();
$exist = $config->config_exist($shop_id);
if ($exist == true) {
$app = $config->load_configuration($shop_id);
}
@endphp

<!--<div class="grid-box">
                <div class="box left">
                    <div class="text">
                        <h2>Click to call</h2>
                    </div>
                </div>
                <div class="box right">
                    <div class="item">
                        <label for="enb-dis">Phone number</label>
                        <input
                            name="phone_no"
                            maxlength="17"
                            type="number"
                            placeholder="e.g 9998987878"

                        />
                        <div class="buy_now_center">
                            <a href="/">
                                <button type="submit" class="buy_now">
                                    Make a Test Call
                                </button>
                            </a>
                        </div>
                    </div>
                </div>
            </div>-->

<div class="grid-box">
    <div class="box left">
        <div class="text">
            <h2>Schedule delay Call</h2>
        </div>
    </div>
    <div class="box right">
        <div class="item">
            <label for="schedule_delay_call">Status</label>
            <select id="schedule_delay_call" name="schedule_delay_call">
                @if($exist)
                <option value="<?=$app['schedule_delay_call']?>" selected hidden><?=($app['schedule_delay_call'] == 1) ? 'Enable':'Disable'?></option>
                @endif
                <option value="0">Disable</option>
                <option value="1">Enable</option>
            </select>
            <div class="intervals {{($app['schedule_delay_call'] == 1) ? '' : 'hide'}}">
                <label for="time-intervals">You can also select the Main calls time intervals in drop down list</label>
                <select id="time-intervals" name="schedule_delay_call_mins">
                    @if($exist)
                    <option value="<?=$app['schedule_delay_call_mins']?>" selected hidden><?=$app['schedule_delay_call_mins']?> later</option>
                    @endif
                    <option value="1 minute">1 minute later</option>
                    <option value="5 minutes">5 minutes later</option>
                    <option value="15 minutes">15 minutes later</option>
                    <option value="30 minutes">30 minutes later</option>
                    <option value="1 hour">1 hour later</option>
                    <option value="2 hours">2 hours later</option>
                    <option value="3 hours">3 hours later</option>
                </select>
            </div>
        </div>

    </div>
</div>


<script>
    $(document).ready(function() {
        $('#schedule_delay_call').on('change', function() {
            let index = $(this).children('option:selected').val();
            console.log(index);
            if (index == 1) {
                $(this).next().removeClass('hide');
            } else {
                $(this).next().addClass('hide');
            }
        });
    });
</script>
