<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>End Points</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <style>
        /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */
        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%
        }

        body {
            margin: 0
        }

        a {
            background-color: transparent
        }

        [hidden] {
            display: none
        }

        html {
            font-family: system-ui, -apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Helvetica Neue, Arial, Noto Sans, sans-serif, Apple Color Emoji, Segoe UI Emoji, Segoe UI Symbol, Noto Color Emoji;
            line-height: 1.5
        }

        *, :after, :before {
            box-sizing: border-box;
            border: 0 solid #e2e8f0
        }

        a {
            color: inherit;
            text-decoration: inherit
        }

        svg, video {
            display: block;
            vertical-align: middle
        }

        video {
            max-width: 100%;
            height: auto
        }
    </style>

    <style>
        body {
            font-family: 'Nunito', sans-serif;
        }

        .table {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 5vw;
        }

        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
            margin: 0 auto;
        }

        td, th {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        tr:nth-child(even) {
            background-color: #dddddd;
        }
    </style>
</head>
<body class="antialiased">
<div class="container">
    <div class="table">
        <h2>End Points</h2>
        <table>
            @foreach($routes as $route)
                <tr>
                    <th>{{ \App\Helpers\FormatString::serialize_method($route['method']) }}</th>
                    <th>{{ \App\Helpers\FormatString::serialize_uri($route['uri']) }}</th>
                    <th>{{ \App\Helpers\FormatString::serialize_middleware($route['middleware']) }}</th>
                    <th>{{ \App\Helpers\FormatString::serialize_params($route['params']) }}</th>
                </tr>
            @endforeach
        </table>
    </div>
</div>
</body>
</html>
