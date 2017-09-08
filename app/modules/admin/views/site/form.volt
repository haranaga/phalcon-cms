<div class="row justify-content-center">
    <div class="col-sm-6">

    {{content()}}

    {{form(html.admin_url('site/new'), 'method':'post','class':'hd-form hd-form-block')}}
        {{form.render('site_id')}}
        {{form.renderBS('site_name')}}
        {{form.renderBS('site_domain')}}
        {{form.renderBS('site_title')}}
        {{form.renderBS('site_description')}}
        {{form.renderBS('site_keywords')}}
        {{form.renderBS('site_url')}}
        <div class="hd-form-group">
            <button class="btn btn-primary button-large" type="submit">{{t._('action_new')}}</button>
        </div>
    {{endForm()}}

    </div>
</div>
