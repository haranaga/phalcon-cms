<h1 class="hd-center hd-mg-2">Database</h1>
        {{content()}}
        <form class="hd-form hd-form-block" action="{{url('_/setup/save')}}" method="post">
            <div class="hd-form-group">
                <label for="host" class="hd-form-label">Db host</label>
                <input type="text" name="host" value="localhost">
            </div>
            <div class="hd-form-group">
                <label for="host" class="hd-form-label">Db name</label>
                <input type="text" name="dbname" value="phalcon-cms">
            </div>
            <div class="hd-form-group">
                <label for="username" class="hd-form-label">Db user</label>
                <input type="text" name="username" value="root">
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
