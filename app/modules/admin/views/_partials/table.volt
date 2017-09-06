{% set path = dispatcher.getControllerName()  %}
{% if page.total_items > 0 %}
<style media="screen">
    th {
        white-space: nowrap;
    }
</style>
        <table id="tableApp" class="table table-responsive table-bordered">
            <thead>
                <th><input type="checkbox" name="checkall" id="checkAll" :value="1" @change="toggleCheck()" v-model="checkAll"></th>
                <th><i class="fa fa-pencil-square fa-fw" aria-hidden="true"></i></th>
                {% for col in columns  %}
                    <th>
                        <a href="{{html.current_url_update(['order':col,'desc':order.desc ? '0':'1'])}}">
                            {{t._(col)}}
                        </a>
                        {% if order.name == col %}
                            <a href="{{html.current_url_update(['order':col,'desc':order.desc ? '0':'1'])}}">
                                <div style="float:right;">
                                    {{order.desc ? '<i class="fa fa-sort-amount-desc fa-fw" aria-hidden="true"></i>': ''}}
                                    {{!order.desc ? '<i class="fa fa-sort-amount-asc fa-fw" aria-hidden="true"></i>': ''}}
                                </div>
                            </a>
                        {% endif %}
                    </th>
                {% endfor %}
                <th><i class="fa fa-trash" aria-hidden="true"></i></th>
            </thead>
            <tbody>

                {# volt version #}
                {% for item in page.items  %}
                    <tr>
                        <td>
                            <input type="checkbox" class="form-control" value="{{item.offsetGet(id)}}" v-model="checkedId">
                        </td>
                        <td>
                            <a href="{{html.admin_url(dispatcher.getControllerName()~'/edit/'~item.user_id)}}">
                                <i class="fa fa-pencil-square fa-fw" aria-hidden="true"></i>
                            </a>
                        </td>

                        {% for col in columns %}
                            <td>
                                {% if d.get(col) is not empty %}
                                    {{t._(d.get(col).get(item.offsetGet(col)))}}
                                {% else %}
                                    {{item.offsetGet(col)}}
                                {% endif %}
                            </td>
                        {% endfor %}

                        <td>
                            <a href="{{html.admin_url(dispatcher.getControllerName()~'/trash/'~item.user_id)}}">
                                <i class="fa fa-trash fa-fw" aria-hidden="true"></i>
                            </a>
                        </td>
                    </tr>
                {% endfor %}
                {# vue version
                <tr v-for="row in rows">
                    <td><input type="checkbox" class="uk-checkbox" :value="row.{{id}}" v-model="checkedId"></td>
                    <td>
                        <a :href="'{{html.admin_url(path~'/edit/')}}'+ row.{{id}}">
                            <i class="fa fa-pencil-square fa-fw" aria-hidden="true"></i>
                        </a>
                    </td>
                    <td v-for="(item,index) in row" :class="index">
                        ${item}
                    </td>
                    <td>
                        <a :href="'{{html.admin_url(path~'/trash/')}}'+ row.{{id}}">
                            <i class="fa fa-trash fa-fw" aria-hidden="true"></i>
                        </a>
                    </td>
                </tr>
                #}
            </tbody>
        </table>
        <div class="center-block">
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
