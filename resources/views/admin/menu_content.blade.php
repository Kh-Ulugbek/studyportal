<div class="main-menu-content">
    <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
        <li class=" nav-item"><a href="{{route('admin.home')}}"><i class="feather icon-home"></i><span class="menu-title" data-i18n="Dashboard">Админ-панель</span></a>
            <ul class="menu-content">
                <li class="{{(URL::current()==route('admin.home'))? 'active':''}}"><a href="{{route('admin.analytics.index')}}"><i class="feather icon-circle"></i><span class="menu-item" data-i18n="Analytics">Аналитика</span></a>
                </li>
                <li><a href="{{route('admin.files.index')}}"><i class="feather icon-file-text"></i><span class="menu-item" data-i18n="eCommerce">Файл пользователю</span></a>
                </li>
            </ul>
        </li>
        @foreach($menu_contents as $item)
            <li class=" navigation-header"><span>{{$item->name}}</span>
            @if (count($item->sub_menu)> 0)
                @foreach($item->sub_menu as $sub_menu)
                    <li class="{{(URL::current()==asset($sub_menu->link))? 'active':''}} nav-item"><a href="{{asset($sub_menu->link)}}"><i class="{{$sub_menu->icon}}"></i><span
                                    class="menu-title" data-i18n="{{$sub_menu->name}}">{{$sub_menu->name}}</span></a>

                        @if (count($sub_menu->sub_menu)> 0)
                            <ul class="menu-content">
                                @foreach($sub_menu->sub_menu as $sub_item)
                                    <li><a href="{{asset($sub_item->link)}}"><i class="{{$sub_item->icon}}"></i><span
                                                    class="menu-item"
                                                    data-i18n="{{$sub_item->name}}">{{$sub_item->name}}</span></a>
                                    </li>
                                @endforeach
                            </ul>
                    </li>
                    @else   </li>
                    @endif
                @endforeach
            @else
            @endif
        @endforeach
    </ul>
</div>