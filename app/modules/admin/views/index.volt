<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        {{get_title()}}
        {{stylesheet_link('http://localhost:8080/hard-ui/build/hard-ui.css', true)}}
        {{javascript_include('components/vue/dist/vue.js')}}
        {{javascript_include('components/axios/dist/axios.js')}}
    </head>
    <body class="hd-sticky-footer">

        <nav class="hd-nav">
            <ul class="hd-nav-x">
                <li class="hd-nav-brand"><a href="{{html.admin_url('')}}">{{config.name}} ADMIN</a></li>
                <li><a href="{{html.admin_url('user')}}">{{t._('user')}}</a></li>
                <li><a href="#">Menu2</a></li>
                <li><a href="#">Menu3</a></li>
                <li><a href="#">Menu4</a></li>
                <li><p>Text</p></li>
            </ul>
        </nav>

        {{ content() }}

        <footer>
            <div class="hd-center">
                UI by {{link_to('http://www.hard-ui.com/','HARD-UI',false)}} 
                &copy;cms {{html.test('hoge')}}
            </div>
        </footer>

    </body>
</html>
