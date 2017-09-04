<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{get_title()}}
        <link rel="stylesheet" href="http://localhost:8080/hard-ui/build/hard-ui.min.css">

        {{javascript_include('https://unpkg.com/vue',true)}}
        {{javascript_include('https://unpkg.com/axios/dist/axios.min.js',true)}}

    </head>
    <body class="hd-sticky-footer">
        <header>
            <h1 class="hd-center hd-mgtb-1"><a href="{{url('')}}">{{config.name}}</a></h1>
        </header>
        <div class="hd-wrapper">
            <div class="hd-container">
                {{ content() }}
            </div>
        </div>
        <footer>
            <div class="hd-center">
                Powered by {{config.name}}
            </div>
        </footer>
    </body>
</html>
