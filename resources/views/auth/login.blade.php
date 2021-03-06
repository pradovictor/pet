@extends('base.guest')
@section('content')
  <div class="center-vertical">
    <div class="center-content row">
      <div class="col-md-3 center-margin">
        <form method="post" action="">
          {{csrf_field()}}
          <div class="content-box wow bounceInDown modal-content">
            <h3 class="content-box-header content-box-header-alt bg-default text-center">
                <img style="width:168px" src="{{ asset('images/cliente/'. explode('.', Request::server('HTTP_HOST'))[0].'.png')}}" onerror="this.style.display='none'"/>
                <img style="width:168px" src="{{ asset('images/cliente/'. explode('.', Request::server('HTTP_HOST'))[0].'2.png')}}" onerror="this.style.display='none'"/>
                <span class="header-wrapper ml-2 text-left mt-3">
                Área restrita
                <small>Acesse com sua conta.</small>
              </span>
            </h3>
            <div class="content-box-wrapper">
              <div class="form-group">
                <div class="input-group">
                  <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Email" name="email">
                  <span class="input-group-addon bg-blue">
                    <i class="glyph-icon icon-envelope-o"></i>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <div class="input-group">
                  <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Senha" name="password">
                  <span class="input-group-addon bg-blue">
                    <i class="glyph-icon icon-unlock-alt"></i>
                  </span>
                </div>
              </div>
              <div class="form-group">
                <label for="remember" class="checkbox-inline">
                  <input type="checkbox" name="remember" value="true">
                  Manter Logado
                </label>
              </div>
              <div class="form-group text-right">
                <a href="{{config('app.url')}}/password/reset" title="Recover password">Esqueceu sua senha?</a>
              </div>
              <button class="btn btn-success btn-block">Acessar</button>
              <p class="text-center mt-3"><small> Desenvolvido por <a href="http://www.vpes.com.br">VP Engenharia e Sistemas</a></small></p>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

@endsection
