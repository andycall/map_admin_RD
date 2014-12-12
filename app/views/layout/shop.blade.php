<!doctype html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>商家页面</title>
    @yield("css")
</head>
<body>
    <div class="container-fluid">
       <div class="row">
         <div class="col-xs-12 col-md-8">
            @yield("sidebar")
         </div>
         <div class="col-xs-6 col-md-4">
            @yield("content")
         </div>
       </div>
    </div>
</body>

@yield("script")
</html>