<section>
    <h3>{{link_to('_admin', 'Admin')}}</h3>
    <ul>
        <li>{{link_to('_admin/site',t._('site'))}}</li>
        <li>{{link_to('_admin/user',t._('user'))}}</li>
    </ul>
    <h3>{{link_to('_/', 'Frontend')}}</h3>
    <ul>
        <li>{{link_to('_/user/signup',t._('Sign up'))}}</li>
        <li>{{link_to('_/user/signin',t._('Sign in'))}}</li>
    </ul>
</section>
