<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>phalcon-cms admin</title>
        <link rel="stylesheet" href="{{url('http://localhost:8080/hard-ui/build/hard-ui.css')}}">
        <script src="{{url('/components/vue/dist/vue.js')}}" charset="utf-8"></script>
        <script src="{{url('/components/axios/dist/axios.js')}}" charset="utf-8"></script>
    </head>
    <body class="hd-sticky-footer">

        <nav class="hd-nav">
            <ul class="hd-nav-x">
                <li class="hd-nav-brand"><a href="#">ADMIN</a></li>
                <li><a href="#">Menu1</a></li>
                <li><a href="#">Menu2</a></li>
                <li><a href="#">Menu3</a></li>
                <li><a href="#">Menu4</a></li>
                <li><p>Text</p></li>
            </ul>
        </nav>

        <div class="hd-container">
            {{ content() }}
        </div>

        <footer>
            <div class="hd-center">
                &copy;cms
            </div>
        </footer>
    </body>
</html>
