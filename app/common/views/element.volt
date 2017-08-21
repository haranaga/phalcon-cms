{% set elementName = element.getName() %}
<div class="hd-form-block {{messages is not empty ? 'hd-color-error' : ''}}">
    hoge
    <label for="{{elementName}}" class="hd-form-label">{{t._(elementName)}}</label>
    {{element.render()}}
    {% if help is not empty %}
        <p>{{help|e}}</p>
    {% endif %}

    {% if messages is not empty %}
        {% for message in messages  %}
            <p>{{message}}</p>
        {% endfor %}

    {% endif %}
</div>
{#
    element: (Phalcon\Forms\Element\*) form element
    required : (bool) true|false
    messages : (array) Error message
    help : (string) Help message
#}
