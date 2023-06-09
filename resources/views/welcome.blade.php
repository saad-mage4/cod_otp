@extends('shopify-app::layouts.default')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.11/dist/sweetalert2.min.css">
<link rel="stylesheet" href="{{ asset('/css/style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossOrigin="anonymous"></script>
@section('content')
<div class="container">

    <div class="tab-links">
        <a href="#!"><i class="fa-solid fa-home"></i> Over-view</a>
        <a href="#!"><i class="fa-solid fa-gear"></i> Configuration</a>
        <a href="#!"><i class="fa-solid fa-dollar"></i> Abandoned Carts</a>
        <a href="#!"><i class="fa-solid fa-dollar"></i> Analytics & Logs</a>
        <a href="#!"><i class="fa-solid fa-dollar"></i> Integration</a>
        <a href="#!"><i class="fa-solid fa-dollar"></i> Pricing</a>
    </div>
    <div class="tab-content">
        <div class="content">
            @include('/.content/over-view')
        </div>
        <div class="content hide">
            @include('/.content/configuration')
        </div>
        <div class="content hide">
            @include('/.content/abandoned-carts')
        </div>
        <div class="content hide">
            @include('/.content/analytics')
        </div>
        <div class="content hide">
            @include('/.content/integration')
        </div>
        <div class="content hide">
            @include('/.content/pricing')
        </div>
    </div>
</div>

@endsection

@section('scripts')
@parent

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.11/dist/sweetalert2.all.min.js"></script>
<script src="{{asset('js/myapp-script.js')}}"></script>
<script type="text/javascript">
    var AppBridge = window['app-bridge'];
    var actions = AppBridge.actions;
    var TitleBar = actions.TitleBar;
    var Button = actions.Button;
    var Redirect = actions.Redirect;
    var titleBarOptions = {
        title: 'Welcome',
    };
    var myTitleBar = TitleBar.create(app, titleBarOptions);
</script>
@endsection