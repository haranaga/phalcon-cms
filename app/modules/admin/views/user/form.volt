<div class="row justify-content-center">
    <div class="col-sm-6">
        {{content()}}
        {{form(html.admin_url('user/'~dispatcher.getActionName()), 'method':'post')}}
            {{form.render('user_id')}}
            {{form.renderBS('user_name')}}
            {{form.renderBS('user_login')}}
            {{form.renderBS('user_email')}}
            {% if dispatcher.getActionName() == 'new' %}
                {{form.renderBS('user_password')}}
            {% endif %}
            {{form.renderBS('user_status')}}
            {{form.renderBS('user_role')}}
            {{form.renderBS('user_image')}}

            <button class="btn btn-primary button-large" type="submit">{{t._('action_new')}}</button>

        {{endForm()}}
    </div>
</div>
