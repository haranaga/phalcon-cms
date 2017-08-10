<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        {{get_title()}}
        <link rel="stylesheet" href="http://www.hard-ui.com/build/hard-ui.min.css">

        <script src="https://unpkg.com/vue/dist/vue.js"></script>

    </head>
    <body>
        <div class="hd-wrapper">
            <div class="hd-container">
                <h1><a href="{{url('')}}">Phalcon-CMS Frontend</a></h1>
                {{ content() }}
            </div>
        </div>
    </body>
</html>
