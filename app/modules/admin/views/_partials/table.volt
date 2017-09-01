{% set path = dispatcher.getControllerName()  %}
{% if page.total_items > 0 %}
    <div style="overflow-x:auto;">
        <table id="tableApp" class="hd-table">
            <thead>
                <th><input type="checkbox" name="checkall" id="checkAll" :value="1" @change="toggleCheck()" v-model="checkAll"></th>
                <th><i class="icon ion-edit"></i></th>
                {% for col in columns  %}
                    <th class="{{col}}">
                        <a href="{{html.current_url_update(['order':col,'desc':order.desc ? '0':'1'])}}">
                            {{t._(col)}}
                        </a>
                        {% if order.name == col %}
                            <a href="{{html.current_url_update(['order':col,'desc':order.desc ? '0':'1'])}}">
                                {{order.desc ? '<i class="icon ion-arrow-down-b"></i>': ''}}
                                {{!order.desc ? '<i class="icon ion-arrow-up-b"></i>': ''}}
                            </a>
                        {% endif %}
                    </th>
                {% endfor %}
                <th><i class="icon ion-trash-a"></i></th>
            </thead>
            <tbody>
                <tr v-for="row in rows">
                    <td><input type="checkbox" :value="row.{{id}}" v-model="checkedId"></td>
                    <td><a :href="'{{html.admin_url(path~'/edit/')}}'+ row.{{id}}"><i class="icon ion-edit"></i></a></td>
                    <td v-for="(item,index) in row" :class="index">
                        ${item}
                    </td>
                    <td><a :href="'{{html.admin_url(path~'/trash/')}}'+ row.{{id}}"><i class="icon ion-trash-a"></i></a></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="hd-mgtb-1 hd-center">
        {{partial('pager')}}
    </div>

    <script type="text/javascript">

        var vm = new Vue({
            delimiters: ['${','}'],
            el: '#tableApp',

            data :{
                rows: {{page.items|json_encode}},
                checkedId:[],
                checkAll: 0,
            },
            methods: {
                toggleCheck: function(event) {
                    if (this.checkAll) {
                        this.checkedId = [];
                        this.rows.forEach((row, i) => {
                            this.checkedId.push(row.{{id}});
                        });
                    } else {
                        this.checkedId = [];
                    }
                }
            }
        });
    </script>

{% else %}
    <p>{{t._('No data')}}</p>
{% endif %}
