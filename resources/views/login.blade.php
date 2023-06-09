<head>

    <title>App Authenticate</title>
    <style>

        .container{
            padding: 16px;
        }

    </style>
</head>

<body>
<form action="{{ url('/authenticate') }}" method="get">
    <div class="imgcontainer">
        <img src="https://seeklogo.com/images/S/shopify-logo-3CDF9B62B3-seeklogo.com.png" alt="Avatar" >
    </div>
    <div class="container" style="margin-left: 25%;margin-right: 25%;text-align: center;">
        <label for="uname"><b>Shop URL (App Extension)</b></label>
        <input type="text" placeholder="store.myshopify.com" name="shop" required>
        <button type="submit">Login</button>
    </div>
</form>
</body>
