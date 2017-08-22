<style media="screen">
    .hd-form-group {
        margin-bottom: 1rem;
    }
</style>
<section id="app">
    <div class="hd-row">
        <div class="col-l-6 col-m-3"></div>
        <div class="col-l-12 col-m-18">
            <div class="hd-card">
                <div class="hd-card-body clearfix">
                    <h3 class="hd-mgt-1 hd-mgb-2 hd-center">登録</h3>
                    {{content()}}
                    {% if messages is not empty %}
                        <ul class="hd-mgb-1 hd-color-error">
                            {% for message in messages %}
                                <li>{{message}}</li>
                            {% endfor %}
                        </ul>
                    {% endif %}
                    <form class="hd-form hd-form-block" action="{{url('_/user/signup')}}" method="post" autocomplete="off">

                        {{form.renderHD('user_login')}}
                        {{form.renderHD('user_email')}}
                        {{form.renderHD('user_password',['v-model':'user.user_password','@keyup':'checkPasswordStrength'])}}
                        <div v-if="message.user_password" class="hd-form-group" v-bind:class="{'hd-color-error': color.error, 'hd-color-safe': color.success}">
                            <p>${message.user_password}</p>
                        </div>
                        {{form.renderHD('user_password_confirm')}}
                        {{form.renderHD('user_agree')}}

                        <div class="hd-form-group">
                            <button type="submit" class="hd-mgt-1 hd-right">登録</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="hd-mg-2 hd-center">
                {{t._('Already have an account?')}} {{link_to('_/user/signin', t._('Sign In'))}}
            </div>
        </div>
        <div class="col-l-6 col-m-3"></div>
    </div>
</section>

<script>
    var vm = new Vue({
        delimiters: ['${','}'],
        el: '#app',
        data: {
            user : {
                user_login : '',
                user_password : '',
                user_password_confirm : '',
                user_agree : ''
            },
            message: {
                user_login : '',
                user_password : '',
                user_password_confirm : '',
                user_agree : '',
                error: false,
                success: true
            },
            color: {
                error: false,
                success: false
            }
        },
        methods: {
            checkPasswordStrength: function(event) {
                console.log(event.target.value);
                axios.post("{{url('_api/user/checkPasswordStrength')}}",{
                    user_password : event.target.value
                })
                .then(response => {
                    if (response.data.success) {
                        this.color.error = false;
                        this.color.success = true;
                    } else {
                        this.color.error = true;
                        this.color.success = false;
                    }
                    // console.log(response.data);
                    // this.message.user_password = response.data.messages[0];
                    this.message.user_password = response.data.messages[0];
                    return;
                })
                .catch(function(error){
                    // console.log(error);
                })
            }
        }
    });
</script>
