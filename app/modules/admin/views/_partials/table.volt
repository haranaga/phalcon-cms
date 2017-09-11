{% if page.total_items > 0 %}

<style media="screen">
    th {
        white-space: nowrap;
        text-overflow: ellipsis;
    }
    .fade-enter-active, .fade-leave-active {
      transition: opacity 1.0s;
    }
    .fade-enter, .fade-leave-to  {
      opacity: 0;
    }

</style>
<div id="tableApp">
    {{partial('table_toolbar')}}
    <table class="table table-responsive table-bordered mb-1">
        <thead>
            {# check box #}
            <th><input type="checkbox" name="checkall" id="checkAll" :value="1" @change="toggleCheck()" v-model="checkAll"></th>
            {# edit button #}
            <th> <i class="fa fa-pencil fa-fw" aria-hidden="true"></i> </th>
            {% for col in columns  %}
                <th nowrap>
                    <a href="{{html.current_url_update(['order':col,'desc':order.desc ? '0':'1'])}}">
                        {{t._(col)}}
                    </a>
                    {% if order.name == col %}
                        <a href="{{html.current_url_update(['order':col,'desc':order.desc ? '0':'1'])}}">
                            <div style="float:right;">
                                {{order.desc ? '<i class="fa fa-sort-desc fa-fw" aria-hidden="true"></i>': ''}}
                                {{!order.desc ? '<i class="fa fa-sort-asc fa-fw" aria-hidden="true"></i>': ''}}
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
                    <input type="checkbox" class="form-control" value="{{item.offsetGet(id)}}" v-model="checkedId" @change="somethingChecked = true">
                </td>
                <td class="btn-cell">
                    <a class="btn btn-outline-success btn-sm" href="{{html.admin_url(dispatcher.getControllerName()~'/edit/'~item.offsetGet(id))}}" data-toggle="tooltip" data-placement="bottom" title="{{t._('Edit')}}">
                        <i class="fa fa-pencil fa-fw" aria-hidden="true"></i>
                    </a>
                </td>

                {% for col in columns %}
                    <td>
                        {% if loop.index == 2 %}
                            <a href="{{html.admin_url(dispatcher.getControllerName()~'/detail/'~item.offsetGet(id))}}">
                        {% endif %}
                        {% if d.get(col) is not empty %}
                            {{t._(d.get(col).get(item.offsetGet(col)))}}
                        {% else %}
                            {{item.offsetGet(col)}}
                        {% endif %}
                    </td>
                    {% if loop.index == 2 %}
                        </a>
                    {% endif %}
                {% endfor %}

                <td class="btn-cell">
                    {% if request.getQuery('is_trash') == 1 %}
                        <a class="btn btn-outline-primary btn-sm" href="#" @click="trash({{item.readAttribute(id)}},$event)" data-toggle="tooltip" data-placement="bottom" title="{{t._('Recycle')}}">
                            <i class="fa fa-recycle" aria-hidden="true"></i>
                        </a>
                    {% else %}
                        <a class="btn btn-outline-danger btn-sm" href="#" @click="trash({{item.readAttribute(id)}},$event)" data-toggle="tooltip" data-placement="bottom" title="{{t._('Trash')}}">
                            <i class="fa fa-trash fa-fw" aria-hidden="true"></i>
                        </a>
                    {% endif %}
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
    {{partial('table_toolbar')}}

    <div class="center-block">
        {{partial('pager')}}
    </div>

</div>

    <script type="text/javascript">
    $(function () {
      $('[data-toggle="tooltip"]').tooltip()
    })
        var vm = new Vue({
            delimiters: ['${','}'],
            el: '#tableApp',

            data :{
                rows: {{page.items|json_encode}},
                checkedId:[],
                checkAll: 0,
                somethingChecked: false,
            },
            methods: {
                toggleCheck: function(event) {
                    if (this.checkAll) {
                        this.checkedId = [];
                        this.rows.forEach((row, i) => {
                            this.checkedId.push(row.{{id}});
                        });
                        this.somethingChecked = true;
                    } else {
                        this.checkedId = [];
                    }
                },
                trash: function(id,event) {
                    event.preventDefault();
                    event.stopPropagation();
                    var yes = confirm(id+":"+"{{t._('Trash?')}}");
                    if (yes) {
                        var form = document.createElement("form");
                        form.action = "{{html.admin_url(dispatcher.getControllerName()~'/trash')}}";
                        var input = document.createElement("input");
                        input.setAttribute('type', 'hidden');
                        input.setAttribute('name', '{{id}}');
                        input.setAttribute('value', id);
                        form.appendChild(input);
                        form.setAttribute('method', 'post');
                        document.body.appendChild(form);
                        form.submit();
                    }
                }
            }
        });
    </script>

{% else %}
    <p>{{t._('No data')}}</p>
{% endif %}
