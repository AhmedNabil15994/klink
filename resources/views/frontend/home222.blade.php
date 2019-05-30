<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <meta http-equiv="content-language" content="{{\App::getLocale()}}">
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="stylesheet" href="/front/css/app.css">
  <title>Fast Wheel</title>
</head>
<body>
  <div id="app"></div>
  <script>
    window.Laravel = 'ahmed';
  </script>
  <script id="langScript" src="/js/lang-{{ \App::getLocale() }}.js"></script>
  <script id="AppScript" src="{{mix('/front/js/app.js')}}"></script>

</body>
</html>