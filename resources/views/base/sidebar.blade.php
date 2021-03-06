<div class="scroll-sidebar">
    <ul id="sidebar-menu">
        @if(!empty($primaryMenu))
            @if(!empty($primaryMenu["header"]))
                <li class="header"><span>{{$subMenu["header"]}}</span></li>
            @endif
            @foreach($primaryMenu["itens"] as $item)
                <li>
                    <a href="{{config('app.url')}}/{{$item['href']}}" title="@if(!empty($item['helper'])){{$item['helper']}}@endif">
                        @if(!empty($item["icon"]))
                        <i class="glyph-icon {{$item['icon']}}"></i>
                        @endif
                        <span>{{$item['title']}}</span>
                    </a>
                    @if(!empty($item['subItens']))
                        <div class="sidebar-submenu">
                            <ul>
                                @foreach($item['subItens'] as $subItem)
                                    <li>
                                        <a href="{{config('app.url')}}/{{$subItem['href']}}" title="@if(!empty($subItem['helper'])){{$subItem['helper']}}@endif">
                                            <span>{{$subItem['title']}}</span>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </li>
                @endforeach
                <li>
                    <a class="header-btn" href="{{config('app.url')}}/logout"
                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Sair">
                        <i class="glyph-icon icon-power-off"></i>
                        <span>Sair</span>
                    </a>
                </li>
        @endif
        @if(!empty($subMenu))
            @foreach($subMenu as $menu)
                <li class="divider"></li>
                @if(!empty($menu["header"]))
                    <li class="header"><span>{{$menu["header"]}}</span></li>
                @endif
                @foreach($menu["itens"] as $item)
                    <li>
                        <a href="{{config('app.url')}}/{{$item['href']}}" title="@if(!empty($item['helper'])){{$item['helper']}}@endif">
                            @if(!empty($item["icon"]))
                            <i class="glyph-icon icon-linecons-cog"></i>
                            @endif
                            <span>{{$item['title']}}</span>
                        </a>
                        @if(!empty($item['subItens']))
                            <div class="sidebar-submenu">
                                <ul>
                                    @foreach($item['subItens'] as $subItem)
                                        <li>
                                            <a href="{{config('app.url')}}/{{$subItem['href']}}" title="@if(!empty($subItem['helper'])){{$subItem['helper']}}@endif">
                                                <span>{{$subItem['title']}}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    </li>
                @endforeach
            @endforeach
        @endif
    </ul>
</div>
