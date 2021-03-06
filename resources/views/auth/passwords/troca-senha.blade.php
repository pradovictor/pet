@extends('base.guest')

@section('content')
<div class="center-vertical">
    <div class="center-content row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-heading">Redefinição de senha</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('primeiroacesso.actiontrocasenha') }}">
                        {{ csrf_field() }}
                        <input type="hidden" id="id" name="id" value={{$user->id}}>
                        <div class="form-group{{ $errors->has('senha-atual') ? ' has-error' : '' }}">
                            <label for="senha-atual" class="col-md-4 control-label">Senha Atual</label>
                            <div class="col-md-6">
                                <input id="senha-atual" type="password" class="form-control" name="senha-atual" required>
                                @if ($errors->has('senha-atual'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('senha-atual') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Senha</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label for="password-confirm" class="col-md-4 control-label">Confirmação de Senha</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Redefinir Senha
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
