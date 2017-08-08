<section>
        <div class="hd-row">
            <div class="col-6"></div>
            <div class="col-12">
                <div class="hd-card">
                    <div class="hd-card-body clearfix">
                        <h3 class="hd-mgt-1 hd-mgb-2 hd-center">登録</h3>
                        <form class="hd-form hd-form-block" action="{{url('_frontend/member/register')}}" method="post" autocomplete="off">
                            <div class="hd-form-group">
                                <label class="hd-form-label" for="user_login">ログイン名</label>
                                <input type="text" name="user_login" value="" placeholder="ログイン名">
                            </div>
                            <div class="hd-form-group">
                                <label class="hd-form-label" for="user_password">パスワード</label>
                                <input type="password" name="user_password" autocomplete="new-password" placeholder="パスワード">
                            </div>
                            <div class="hd-form-group">
                                <label class="hd-form-label" for="user_password_confirm">パスワード確認</label>
                                <input type="password" name="user_password_confirm" autocomplete="new-password" placeholder="同じパスワード">
                            </div>
                            <div class="hd-form-group">
                                <label class="hd-form-label" for="">利用規約</label>
                                <label for="chk11">
                                    <input type="checkbox" name="chk" id="chk11" value="1">
                                    <a href="{{url('_frontend/member/tos')}}" target="_blank">ご利用規約</a>に同意する
                                </label>
                                <button type="submit" class="hd-mgt-1 hd-right">登録</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-6"></div>
        </div>
</section>
