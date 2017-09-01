{% if page.total_pages > 1 %}
<nav>
    {{t._('Total',['name':page.total_items])}}
    <ul class="hd-pager">
        {% if page.current == 1  %}
            <li class="hd-pager-item disabled"><a class="page-link" href="#">前</a></li>
        {% else %}
            <li class="hd-pager-item"><a href="{{html.current_url_update(['page':page.before])}}">前</a></li>
        {% endif %}
        {% for index in 1..page.total_pages %}
            {% if loop.index == 1 or (loop.index >= page.current - 1 and loop.index <= page.current + 1) or loop.last %}
                <li class="hd-pager-item page{% if page.current == index %} active{% endif %}"><a href="{{html.current_url_update(['page':index])}}">{{index}}</a></li>
            {% endif %}
            {% if (loop.index == page.current - 2 and loop.index != 1) or (loop.index == page.current + 2 and loop.index != loop.last) %}
                <li class="hd-pager-item disabled"><a href="#"> … </a></li>
            {% endif %}
        {% endfor %}
        {% if page.current == page.last  %}
            <li class="hd-pager-item disabled"><a href="#">次</a></li>
        {% else %}
            <li class="hd-pager-item"><a href="{{html.current_url_update(['page':page.next])}}">次</a></li>
        {% endif %}
    </ul>
    {{t._('Page', ['name' : page.current~'/'~page.total_pages])}}
</nav>
{% endif %}
