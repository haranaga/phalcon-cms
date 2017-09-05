<ul class="nav nav-tabs">
    <li class="nav-item">
        <a class="nav-link {{all ? 'active':''}}" href="{{html.admin_url(dispatcher.getControllerName())}}">{{t._('All')}}{{t._(dispatcher.getControllerName())}}</a>
    </li>
    {% if filter is not empty %}
        {% for name, lst in filter  %}
            <li class="nav-item">
                {% if lst is iterable %}
                    <a class="nav-link dropdown-toggle {{request.hasQuery(name) ? 'active':''}}" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        {% if request.hasQuery(name) %}
                            {{t._(name)}}:<b>{{request.getQuery(name)|e}}</b>
                        {% else %}
                            {{t._(name)}}
                        {% endif %}
                    </a>
                    <div class="dropdown-menu">
                        {% for k,v in lst  %}
                             <a class="dropdown-item" href="{{html.admin_url(dispatcher.getControllerName()~'?'~name~'='~v)}}">{{t._(k)}}</a>
                        {% endfor %}
                    </div>

                {% else %}
                    <a class="nav-link {{request.hasQuery(name) ? 'active':''}}" href="{{html.admin_url(dispatcher.getControllerName()~name~'='~lst)}}"></a>
                {% endif %}
            </li>
        {% endfor %}
    {% endif %}
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{request.hasQuery('search') ? 'active':''}}" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            {% if request.hasQuery('search') %}
                {{t._('Search')}}:<b>{{request.getQuery('search')|e}}</b>
            {% else %}
                {{t._('Search')}}
            {% endif %}
        </a>
        <div class="dropdown-menu">
            <form action="{{html.admin_url(dispatcher.getControllerName())}}" method="get">
            <div class="form-group p-2">
                <div class="input-group">
                  <input id="searchBox" name="search" type="text" class="form-control" style="width:100px;" value="{{request.getQuery('search')}}">
                  <span class="input-group-btn">
                    <button class="btn btn-secondary" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                  </span>
                </div>
            </div>
          </form>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link {{request.hasQuery('archive') ? 'active': ''}}" href="{{html.admin_url(dispatcher.getControllerName()~'?archive=1')}}">{{t._('Archived')}}</a>
    </li>
</ul>
