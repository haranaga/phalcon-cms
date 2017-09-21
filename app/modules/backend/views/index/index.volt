<h1>Backend</h1>

{% if login.is_login %}
    login
{% else %}
    logout
{% endif %}

{{login.user_email}}
{{date('Y-m-d h:i:s')}}
