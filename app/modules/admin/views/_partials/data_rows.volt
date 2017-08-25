{% set path = dispatcher.getControllerName()  %}
{{html.admin_url(path)}}
{% if page.total_items > 0 %}
    <div style="overflow-x:auto;">
        <table>
            <thead>
                {% for col in columns  %}
                    <th>
                        <a href="{{html.current_url_update(['order':col,'desc':order.desc ? '0':'1'])}}">
                            {{t._(col)}}
                        </a>
                        {% if order.name == col %}
                            <a href="{{html.current_url_update(['order':col,'desc':order.desc ? '0':'1'])}}">
                                {{order.desc ? '▼': '　'}}
                                {{!order.desc ? '▲': '　'}}
                            </a>
                        {% endif %}
                    </th>
                {% endfor %}
            </thead>
            <tbody>
                {% for item in page.items  %}
                    {% set row = item.toArray() %}
                    <tr>
                        {% for col in columns %}
                            <td>{{row[ col ]}}</td>
                        {% endfor %}
                    </tr>
                {% endfor %}
            </tbody>
        </table>
    </div>
    {{partial('pager')}}
{% else %}
    <p>no data</p>
{% endif %}

<?phpinfo();?>
