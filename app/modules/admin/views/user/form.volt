{{content()}}

{{form(html.admin_url('user/'~dispatcher.getActionName()), 'method':'post','class':'hd-form hd-form-block')}}
    {{form.render('user_id')}}
    {{form.renderHD('user_name')}}
    {{form.renderHD('user_login')}}
    {{form.renderHD('user_email')}}
    {% if dispatcher.getActionName() == 'new' %}
        {{form.renderHD('user_password')}}
    {% endif %}
    {{form.renderHD('user_status')}}
    {{form.renderHD('user_role')}}
    {{form.renderHD('user_image')}}
    <div class="hd-form-group">
        <button class="hd-btn-default hd-right" type="submit">{{t._('action_new')}}</button>
    </div>
{{endForm()}}
