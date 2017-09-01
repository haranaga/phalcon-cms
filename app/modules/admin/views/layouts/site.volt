<nav class="hd-nav hd-nav-gray">
    <ul class="hd-nav-x">
        <li class="hd-nav-brand"><a href="{{html.admin_url('site')}}">{{t._('site')}}</a></li>
        <li><a href="{{html.admin_url('site/new')}}">{{t._('action_new')}}</a></li>
        <li><a href="#">Menu2</a></li>
        <li><a href="#">Menu3</a></li>
        <li><a href="#">Menu4</a></li>
        <li><p>Text</p></li>
    </ul>
</nav>

<div class="hd-container">
    {{content()}}
</div>
