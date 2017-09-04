<ul class="nav">
    <li class="nav-item">
        <a class="nav-link {{dispatcher.getActionName() == 'index' ? 'active': ''}}" href="{{html.admin_url('user')}}">
            {{t._('action_index')}}
        </a>
    </li>
    <li class="nav-item">
      <a class="nav-link {{dispatcher.getActionName() == 'new' ? 'active': ''}}" href="{{html.admin_url('user/new')}}">
          {{t._('action_new')}}
      </a>
    </li>
    <li class="nav-item"><a class="nav-link" href="#">Menu2</a></li>
    <li class="nav-item"><a class="nav-link" href="#">Menu3</a></li>
    <li class="nav-item"><a class="nav-link" href="#">Menu4</a></li>
</ul>

<div class="hd-container">
    {{content()}}
</div>
