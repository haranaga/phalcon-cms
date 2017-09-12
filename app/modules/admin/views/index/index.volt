<div class="list-group">
    <a href="{{html.admin_url('site')}}" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{t._('site')}}</h5>
            <small></small>
        </div>
        <p class="mb-1">{{t._('Site management description')}}</p>
        <small></small>
    </a>
    <a href="{{html.admin_url('user')}}" class="list-group-item list-group-item-action flex-column align-items-start">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{t._('user')}}</h5>
            <small></small>
        </div>
        <p class="mb-1">{{t._('User management description')}}</p>
        <small></small>
    </a>
</div>
