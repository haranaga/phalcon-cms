<nav class="navbar navbar-sm navbar-light mb-1" style="padding:0">
    <transition name="fade">
        <div v-if="somethingChecked">

            <form class="form-inline">
                <select name="bulk_action" class="form-control form-control-sm">
                    <option value="default">{{t._('BulkAction')}}</option>
                    <option value="modify">{{t._('Edit')}}</option>
                    <option value="trash">{{t._('Archive')}}</option>
                </select>
                <button type="button" class="btn btn-outline-primary btn-sm ml-1" name="button">{{t._('Execute')}}</button>
            </form>

        </div>
    </transition>

    <span class="navbar-text">
        {{t._('Page', ['name' : page.current~'/'~page.total_pages])}}
        {{t._('Total',['name':page.total_items])}}
    </span>
</nav>
