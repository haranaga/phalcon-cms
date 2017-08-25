<nav>
    <div class="row">
        <div class="col-sm-8">
            <ul class="pagination pagination-sm">
                {% if page.current == 1  %}
                    <li class="page-item disabled prev"><a class="page-link" href="#">前</a></li>
                {% else %}
                    <li class="page-item prev"><a class="page-link" href="{{html.current_url_update(['page':page.before])}}">前</a></li>
                {% endif %}
                {% for index in 1..page.total_pages %}
                    {% if loop.index == 1 or (loop.index >= page.current - 1 and loop.index <= page.current + 1) or loop.last %}
                        <li class="page-item page{% if page.current == index %} active{% endif %}"><a  class="page-link" href="{{html.current_url_update(['page':index])}}">{{index}}</a></li>
                    {% endif %}
                    {% if (loop.index == page.current - 2 and loop.index != 1) or (loop.index == page.current + 2 and loop.index != loop.last) %}
                        <li class="page-item disabled"><a class="page-link" href="#"> … </a></li>
                    {% endif %}
                {% endfor %}
                {% if page.current == page.last  %}
                    <li class="page-item disabled next"><a class="page-link" href="#">次</a></li>
                {% else %}
                    <li class="page-item next"><a  class="page-link" href="{{html.current_url_update(['page':page.next])}}">次</a></li>
                {% endif %}
            </ul>

        </div>
        <div class="col-sm-4">
            {#<ul class="pagination pagination-sm">
                <li class="page-item disabled"><a href="#" class="page-link">{{page.total_items}}</a></li>
            </ul>#}

            <div style="float:right;font-size:0.8rem">
                全{{page.total_items}}件
            </div>
        </div>
    </div>


</nav>
