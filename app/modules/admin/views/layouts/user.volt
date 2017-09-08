<div class="d-flex justify-content-between align-items-start">

    <h3 class="float-left"><a href="{{html.admin_url(dispatcher.getControllerName())}}">{{t._(dispatcher.getControllerName())}}</a></h3>
    <a class="btn btn-primary " href="{{html.admin_url(dispatcher.getControllerName()~'/new')}}">
        <i class="fa fa-plus" aria-hidden="true"></i>
        {{t._('action_new')}}
    </a>

</div>

{{content()}}
