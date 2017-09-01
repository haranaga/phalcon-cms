{{content()}}

{{form(html.admin_url('site/new'), 'method':'post','class':'hd-form hd-form-block')}}
    {{form.render('site_id')}}
    {{form.renderHD('site_name')}}
    {{form.renderHD('site_domain')}}
    {{form.renderHD('site_title')}}
    {{form.renderHD('site_description')}}
    {{form.renderHD('site_keywords')}}
    {{form.renderHD('site_url')}}
    <div class="hd-form-group">
        <button class="hd-btn-default hd-right" type="submit">{{t._('action_new')}}</button>
    </div>
{{endForm()}}
