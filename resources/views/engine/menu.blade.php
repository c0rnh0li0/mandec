@hasrole('Admin')
<div class="admin-menu">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="#">Admin menu</a>
        </div>
        <ul class="navbar-nav navbar-right">
            <li><a href="#">+ Add category</a></li>
            <li><a href="#">+ Add page</a></li>
            <li>
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">+ Add widget</a>
                <ul class="dropdown-menu">
                    <li class="draggable-widgets">
                        @foreach ($widgets as $widget)
                            <div id="widget-{{ $widget->id }}" class="draggable-widgets">{{ $widget->name }}</div>
                        @endforeach
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</div>
<div class="clearfix"></div>
@endhasrole
<nav class="collapse navbar-collapse navbar-right" role="navigation">
    <ul id="nav" class="nav navbar-nav menu">
    @if ($menu_items->count())
        @foreach ($menu_items as $k => $menu_item)
            @if (($menu_item->page_id && is_object($menu_item->page)) || !$menu_item->page_id)
                @if ($menu_item->children->count())
                    @foreach ($menu_item->children as $i => $child)
                        <li class="navitem dropdown {{ ($k==0)?' fistitem':'' }} {{ ($child->url() == Request::url())?'active':'' }}">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{ $menu_item->name }} <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                @foreach ($menu_item->children as $i => $child)
                                    <li class=""><a href="{{ $child->url() }}">{{ $child->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </li>
                    @endforeach
                @else
                    <li class="navitem {{ ($k==0)?' fistitem':'' }} {{ ($menu_item->url() == Request::url())?' active':'' }}">
                        <a href="{{ $menu_item->url() }}">{{ $menu_item->name }}</a>
                    </li>
                @endif
            @endif
        @endforeach
    @endif
    </ul>
</nav>