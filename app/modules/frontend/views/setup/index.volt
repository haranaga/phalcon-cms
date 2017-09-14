<h1 class="hd-center hd-mg-2">Setup</h1>
<div class="hd-row hd-center">

    <div class="col-m-6 col-s-3 col-l-6">

    </div>
    <div class="col-m-12 col-s-18 col-l-12">
        {{content()}}
        <form class="hd-form hd-form-block" action="{{url('_/setup/save')}}" method="post">
            <div class="hd-form-group">
                <label for="host" class="hd-form-label">Db host</label>
                <input type="text" name="host" value="localhost">
            </div>
            <div class="hd-form-group">
                <label for="user" class="hd-form-label">Db user</label>
                <input type="text" name="user" value="root">
            </div>
            <div class="hd-form-group">
                <label for="password" class="hd-form-label">Db password</label>
                <input type="text" name="password" value="">
            </div>
            <div class="hd-form-group hd-mg-1">
                <input type="submit" class="hd-btn" value="setup">
            </div>
        </form>
    </div>
    <div class="col-m-6 col-s-3 col-l-6">

    </div>
</div>
