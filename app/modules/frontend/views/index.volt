<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{get_title()}}
        <link rel="stylesheet" href="http://localhost:8080/hard-ui/build/hard-ui.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

        {{javascript_include('https://unpkg.com/vue',true)}}
        {{javascript_include('https://unpkg.com/axios/dist/axios.min.js',true)}}

    </head>
    <body class="hd-sticky-footer">
        <header>
            {{partial('header')}}
        </header>
        <div class="hd-wrapper">
            <div class="hd-container">
                {{ content() }}
            </div>
        </div>
        <footer>
            {{partial('footer')}}
        </footer>
    </body>
</html>
