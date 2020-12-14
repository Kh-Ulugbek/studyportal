<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Study Portal</title>

    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/jquery-ui.min.css">
    <link rel="stylesheet" type="text/css" href="{{asset('slick')}}/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="{{asset('slick')}}/slick.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/style.css">
    <link rel="stylesheet" type="text/css" href="{{asset('css')}}/media-queries.css">
    <link rel="stylesheet" type="text/css" href="{{asset('fontawesome/css')}}/all.min.css">

    <link rel="shortcut icon" href="{{asset('favicon.ico')}}" type="image/x-icon">
</head>
<body>

<div class="page-404">
    <a href="{{route('index')}}">
        <img class="logo" src="{{asset('images')}}/logo.png">
    </a>
    <div class="content">
        <img src="{{asset('images')}}/403.svg">
        <h5>
            @lang('validation.error_403.permission_denied')
        </h5>
		<span>
			@lang('validation.error_403.not_admin')
		</span>
        <a href="{{route('index')}}">@lang('validation.error_403.to_main')</a>
    </div>
</div>

<script src="{{asset('js')}}/jquery-3.5.1.min.js"></script>
<script src="{{asset('js')}}/jquery-ui.min.js"></script>
<script src="{{asset('slick')}}/slick.min.js"></script>
<script src="{{asset('js')}}/bootstrap.min.js"></script>
<script src="{{asset('js')}}/main.js"></script>

</body>
</html>