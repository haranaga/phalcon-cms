{% if page.total_pages > 1 %}
    <ul class="pagination justify-content-center my-1">
        {% if page.current == 1  %}
            <li class="page-item disabled">
                <a class="page-link" href="#">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
            </li>
        {% else %}
            <li class="page-item">
                <a class="page-link" href="{{html.current_url_update(['page':page.before])}}">
                    <i class="fa fa-chevron-left" aria-hidden="true"></i>
                </a>
            </li>
        {% endif %}
        {% for index in 1..page.total_pages %}
            {% if loop.index == 1 or (loop.index >= page.current - 1 and loop.index <= page.current + 1) or loop.last %}
                <li class="page-item{% if page.current == index %} active{% endif %}">
                    <a class="page-link" href="{{html.current_url_update(['page':index])}}">
                        {{index}}
                    </a>
                </li>
            {% endif %}
            {% if (loop.index == page.current - 2 and loop.index != 1) or (loop.index == page.current + 2 and loop.index != loop.last) %}
                <li class="page-item disabled">
                    <a class="page-link" href="#"> … </a>
                </li>
            {% endif %}
        {% endfor %}
        {% if page.current == page.last  %}
            <li class="page-item disabled">
                <a class="page-link" href="#">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </li>
        {% else %}
            <li class="page-item">
                <a class="page-link" href="{{html.current_url_update(['page':page.next])}}">
                    <i class="fa fa-chevron-right" aria-hidden="true"></i>
                </a>
            </li>
        {% endif %}
    </ul>
{% endif %}
