<ul class="navbar-nav pt-lg-3">
    @foreach($menus as $menu)
        @if($menu->type == 'divider')
            <li class="nav-item">
                <div class="nav-link" href="#">
                <span class="nav-link-title">
                    {{ $menu->title }}
                  </span>
                </div>
            </li>
        @else
            @if($menu->children->isEmpty())
                <li class="nav-item">
                    <a class="nav-link" target="{{ $menu->target }}" href="{{ $menu->url }}">
                        <x-tabler :icon="$menu->icon_class" w="20" h="20" style="margin-right: 5px"/>
                        <span class="nav-link-title">
                    {{ $menu->title }}
                  </span>
                    </a>
                </li>
            @else
                <li class="nav-item dropdown">
                    <a
                        class="nav-link dropdown-toggle"
                        href="#navbar-base"
                        data-bs-toggle="dropdown"
                        data-bs-auto-close="false"
                        role="button"
                        aria-expanded="false"
                    >
                  <span class="nav-link-icon d-md-none d-lg-inline-block">
                    <x-tabler :icon="$menu->icon_class" w="20" h="20" style="margin-right: 5px"/>
                  </span>
                    <span class="nav-link-title">
                        {{ $menu->title }}
                    </span>
                    </a>
                    <div class="dropdown-menu">
                        <div class="dropdown-menu-columns">
                            <div class="dropdown-menu-column">
                                @foreach($menu->children as $child)
                                <a class="dropdown-item" target="{{ $child->target }}" href="{{ $child->url }}">
                                    {{ $child->title }}
                                </a>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </li>
            @endif
        @endif
    @endforeach
</ul>
