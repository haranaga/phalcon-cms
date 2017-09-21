<div class="hd-row">
    <div class="col-l-8 col-m-6 col-s-3"></div>
    <div class="col-l-8 col-m-12 col-s-18">
        <h3 class="hd-mgt-1 hd-mgb-2 hd-center">{{t._('Sign in')}}</h3>
        <form class="hd-form hd-form-block" action="{{url('_/user/signin')}}" method="post" autocomplete="off">
            <div class="hd-form-group">
                {{content()}}
            </div>

            <div class="hd-form-group">
                {% if messages is not empty %}
                    <ul class="hd-mgb-1 hd-color-error">
                        {% for message in messages %}
                            <li>{{message}}</li>
                        {% endfor %}
                    </ul>
                {% endif %}
            </div>

            {#{{form.renderHD('user_login')}}#}
            {{form.renderHD('user_email')}}
            {{form.renderHD('user_password')}}

            <div class="hd-form-group hd-mg-3">
                <button type="submit" class="hd-mgt-1 hd-center">{{t._('Sign in')}}</button>
            </div>
        </form>
    </div>
    <div class="col-l-8 col-m-6 col-s-2"></div>
</div>
