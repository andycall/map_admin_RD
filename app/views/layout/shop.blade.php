<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>商家页面</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    @yield("css")
</head>
<body>
    <div class="container-fluid">
       <div class="row">
         <div class="col-xs-12 col-md-2 siderbar">
            @yield("sidebar")
         </div>
         <div class="col-xs-6 col-md-10 max_height">
            @yield("content")
         </div>
       </div>
    </div>
</body>

@yield("script")
</html>