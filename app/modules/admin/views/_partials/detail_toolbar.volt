<ul class="nav">
    <li class="nav-item">
        <a href="{{html.admin_url(dispatcher.getControllerName()~'/edit/'~item.readAttribute(id))}}" class="btn btn-success">
            <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>{{t._('action_edit')}}
        </a>
    </li>
    <li class="nav-item">
        <a href="{{html.admin_url(dispatcher.getControllerName()~'/trash/'~item.readAttribute(id))}}" class="btn btn-danger">
            <i class="fa fa-trash fa-fw" aria-hidden="true"></i>{{t._('action_trash')}}
        </a>
    </li>
</ul>
