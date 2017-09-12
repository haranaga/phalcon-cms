<section id="app">
    <div class="hd-row">
        <div class="col-l-6 col-m-3"></div>
        <div class="col-l-12 col-m-18">
            <h3 class="hd-mgt-1 hd-mgb-2 hd-center">{{t._('Sign up')}}</h3>
            {{content()}}
            <form class="hd-form hd-form-block" action="{{url('_/user/signup')}}" method="post" autocomplete="off">

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
                <div v-bind:class="{'hd-color-error': color.error, 'hd-color-safe': color.success}">
                    {{form.renderHD('user_password',['@keyup':'checkPasswordStrength','help':'${message.user_password}'])}}
                </div>
                {#<div v-if="message.user_password" class="hd-form-group" v-bind:class="{'hd-color-error': color.error, 'hd-color-safe': color.success}">
                    <p>${message.user_password}</p>
                </div>#}
                {{form.renderHD('user_password_confirm')}}
                {{form.renderHD('user_agree')}}

                <div class="hd-form-group">
                    <button type="submit" class="hd-mgt-1 hd-right">{{t._('Sign up')}}</button>
                </div>
            </form>
        </div>
        <div class="col-l-6 col-m-3"></div>
    </div>
</section>

<section>
    <div class="hd-mgt-2 hd-mgb-4 hd-center">
        {{t._('Already have an account?')}} {{link_to('_/user/signin', t._('Sign in'))}}
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
