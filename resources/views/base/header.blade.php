<div id="mobile-navigation">
    <button id="nav-toggle" class="collapsed" data-toggle="collapse" data-target="#page-sidebar"><span><i
                class=""></i></span></button>
</div>
<div id="header-logo" class="logo-bg">
    <a href="{{config('app.url')}}" class="logo-content-big" title="{{config('app.name')}}">
        {{config('app.name')}}
    </a>
    <a href="{{config('app.url')}}" class="logo-content-small" title="{{config('app.name')}}">
        {{config('app.name')}}
    </a>
    <a id="close-sidebar" href="#" title="Close sidebar">
        <i class="glyph-icon icon-angle-left"></i>
    </a>
</div>
@if (!empty(Auth::user()))
<div class="row">   

    
    <div class="col-md-6 my-2">
        <div id="header-nav-left">
            <div class="user-account-btn">
                <div class="row">
                {{-- <a  title="Usuario" class="user-profile clearfix" data-toggle="dropdown"> --}}
                    <i class="glyph-icon icon-user mx-1"></i>
                    {{-- <h4>{{Auth::user()->nome}}</h4> --}}
                {{-- </a> --}}

                <a  title="Usuario" class="user-profile clearfix" data-toggle="dropdown">
                        {{-- <i class="glyph-icon icon-user"></i> --}}
                        <h4><b> {{Auth::user()->nome}}</b></h4>
                    </a>

                </div>
            </div>
        </div>
    </div>

    <div class="col-md-2 my-4">
            {{-- <img style="width:170px" src="{{ asset('images/cliente/zz.png')}}" onerror="this.style.display='none'"/> --}}
            @php($subdomain = explode('.', $_SERVER['HTTP_HOST'])[0])
            @if ($subdomain === 'fundepag' )
                <img style="width:170px" src="{{ asset('images/cliente/'.explode('.', $_SERVER['HTTP_HOST'])[0].'2.png')}}" onerror="this.style.display='none'"/>
            @endif    
    </div>     
    @if ($subdomain === 'ii')     
        <div class="col-md-2 my-1">            
            <img style="width:125px" src="{{ asset('images/cliente/'.explode('.', $_SERVER['HTTP_HOST'])[0].'.png')}}" onerror="this.style.display='none'"/>
        </div>
    @elseif  ($subdomain === 'parqtec')     
        <div class="col-md-2 my-2">            
            <img style="width:78px" src="{{ asset('images/cliente/'.explode('.', $_SERVER['HTTP_HOST'])[0].'.png')}}" onerror="this.style.display='none'"/>
        </div>          
    @elseif  ($subdomain === '4dev')     
        <div class="col-md-2 my-1">            
            <img style="width:120px" src="{{ asset('images/cliente/'.explode('.', $_SERVER['HTTP_HOST'])[0].'.png')}}" onerror="this.style.display='none'"/>
        </div>
    @elseif  ($subdomain === '2dev')     
        <div class="col-md-2 my-2">            
            <img style="width:150px" src="{{ asset('images/cliente/'.explode('.', $_SERVER['HTTP_HOST'])[0].'.png')}}" onerror="this.style.display='none'"/>
        </div>         
    @elseif  ($subdomain === 'hcm')     
        <div class="col-md-2 my-2">            
            <img style="width:150px" src="{{ asset('images/cliente/'.explode('.', $_SERVER['HTTP_HOST'])[0].'.png')}}" onerror="this.style.display='none'"/>
        </div>            
    @elseif  ($subdomain === '3dev')     
        <div class="col-md-2 my-2">            
            <img style="width:150px" src="{{ asset('images/cliente/'.explode('.', $_SERVER['HTTP_HOST'])[0].'.png')}}" onerror="this.style.display='none'"/>
        </div>      
    @elseif  ($subdomain === 'espacopillares')     
        <div class="col-md-2 my-2">            
            <img style="width:150px" src="{{ asset('images/cliente/'.explode('.', $_SERVER['HTTP_HOST'])[0].'.png')}}" onerror="this.style.display='none'"/>
        </div>      
    @elseif  ($subdomain === '')     
        <div class="col-md-2 my-3">            
            <img style="width:210px" src="{{ asset('images/cliente/'.explode('.', $_SERVER['HTTP_HOST'])[0].'.png')}}" onerror="this.style.display='none'"/>
        </div>
    @elseif  ($subdomain === 'pet')     
        <div class="col-md-2 my-1">            
            <img style="width:120px" src="{{ asset('images/cliente/'.explode('.', $_SERVER['HTTP_HOST'])[0].'.png')}}" onerror="this.style.display='none'"/>
        </div>
    @else    
        <div class="col-md-2 my-4">            
            <img style="width:170px" src="{{ asset('images/cliente/'.explode('.', $_SERVER['HTTP_HOST'])[0].'.png')}}" onerror="this.style.display='none'"/>
        </div>
    @endif    




    <div class="col-md-2 d-none d-md-block">
        <div id="header-nav-right">
            <a class="header-btn" href="{{config('app.url')}}/logout"
                onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="Sair">
                <i class="glyph-icon icon-power-off"></i>
            </a>
        </div>
    </div>

</div>

@endif