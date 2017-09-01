{{content()}}

{# table column styling #}
<style media="screen">
    .user_id, .user_status, .site_id {
        text-align: right;
    }
    .user_email {
        font-size: 0.9rem;
    }
    .user_name td {
        padding:0;
    }
</style>

{{partial('table')}}
