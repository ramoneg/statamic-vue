<!doctype html>
<html>

<head>
    <title>{{ config('app.name') }}</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
</head>

<body class="bg-white text-gray-900 text-lg" id="app">
    <app :data="{{ json_encode([
        'navigation' => App\Helpers\Tag::tag('nav:main'),
        'url' => $url
        ])
     }}" />
</body>

</html>