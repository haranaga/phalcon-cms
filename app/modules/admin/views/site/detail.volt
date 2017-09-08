<dl class="list-inline">
    {% for col,val in item.toArray() %}
        <dt class="">
            {{t._(col)}}
        </dt>
        <dd class="">
            {% if d.offsetExists(col) %}
                {{t._(d.get(col).get(val))|default('')}}
            {% else %}
                {{val|default('')}}
            {% endif %}
        </dd>
    {% endfor %}
</dl>
{{partial('detail_toolbar')}}
