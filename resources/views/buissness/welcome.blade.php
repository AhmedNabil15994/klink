<!DOCTYPE html>
<html lang="{{\App::getLocale()}}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="content-language" content="{{\App::getLocale()}}">
    <link rel="stylesheet" href="/front/css/app.css">
    <link rel="stylesheet" href="/front/css/styles.css">
    
    
    <title>{{trans('frontend/seo.title')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="{{trans('frontend/seo.description')}}">
    <meta name="description" content="{{trans('frontend/seo.keywords')}}">
    <meta name="google-site-verification" content="C23mwtHjJ67SdQnWEAM_mhJg4tKDTCSsZleWw_1Ovog" />
</head>

<body>
    <div id="app">
        
    </div>
    <script id="langScript" src="/js/lang-{{ \App::getLocale() }}.js"></script>
    <script src="/front/js/buissnessApp.js"></script>
</body>

</html>