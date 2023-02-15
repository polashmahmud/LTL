<ul class="navbar-nav">
    @foreach($menus as $menu)
        @if($menu->children->isEmpty())
            <li class="nav-item {{ activeMenu($menu->url) }}">
                <a class="nav-link"
                   target="{{ $menu->target }}"
                   href="{{ $menu->url }}">
                    <x-tabler :icon="$menu->icon_class" h="22" w="22" style="color: #6c7a91; margin-right: 5px"/>
                    <span class="nav-link-title">
                        {{ $menu->title }}
                    </span>
                </a>
            </li>
        @else
            <li class="nav-item dropdown {{ activeParentMenu($menu) }}">
                <a class="nav-link dropdown-toggle" href="#navbar-help" data-bs-toggle="dropdown" data-bs-auto-close="outside"
                   role="button" aria-expanded="false">
                    <x-tabler :icon="$menu->icon_class" h="22" w="22" style="color: #6c7a91; margin-right: 5px"/>
                    <span class="nav-link-title">
                      {{ $menu->title }}
                    </span>
                </a>
                <div class="dropdown-menu">
                    @foreach($menu->children as $child)
                    <a class="dropdown-item {{ activeMenu($child->url) }}"
                       href="{{ $child->url }}" target="{{ $child->target }}"
                       rel="noopener">
                        <!-- Download SVG icon from http://tabler-icons.io/i/heart -->
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-inline me-1" width="24" height="24"
                             viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                             stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                            <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"/>
                        </svg>
                        {{ $child->title }}
                    </a>
                    @endforeach
                </div>
            </li>
        @endif
    @endforeach
</ul>
