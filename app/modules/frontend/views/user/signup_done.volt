<div class="hd-center">
    <h3>{{t._('Sign up')}}{{t._('Done')}}</h3>
    {{content()}}
    {% if config.mail_check %}
        <div class="hd-center-float">
            {{t._('We sent a e-mail to the address, Please check your mail and access to URL in the mail.')}}
        </div>
    {% endif %}
</div>
