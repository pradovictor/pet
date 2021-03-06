@extends('base.master')

@section('content')
<div class="panel">
    <div class="panel-body">
        <form id="form-usuarios" name="formusu" method="POST"
            action="{{config('app.url')}}/action/aplicativo3/configuracao/usuarios/save" data-parsley-validate="">
            <div class="content-box">
                <input type="hidden" id="id" name="id" value="{{(!empty($usuario->id) ? $usuario->id : '')}}" />
                <div class="content-box-header bg-primary">
                    <h5>INFORMAÇÕES PESSOAL</h5>
                </div>
                <div class="content-box-wrapper">
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="email">E-mail</label>
                            <input type="text" id="email" name="email" class="form-control"
                                placeholder="Digite o e-mail" data-parsley-maxlength="128" data-parsley-required
                                value="{{(!empty($usuario->email) ? $usuario->email : '')}}" />
                        </div>
                        <div class="form-group col-md-5">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome"
                                data-parsley-maxlength="80" data-parsley-required
                                value="{{(!empty($usuario->nome) ? $usuario->nome : '')}}" />
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite o cpf"
                                data-parsley-pattern="[0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2}" 
                                value="{{(!empty($usuario->cpf) ? $usuario->cpf : '')}}" />
                        </div>
                    </div>
                    @php($subdomain = explode('.', $_SERVER['HTTP_HOST'])[0])
                    {{-- VERIFICACAO SUBDOMINIO --}}
                </div>
            </div>
            <div class="content-box">
                {{-- inicio sub dominio --}}
                {{-- fim sub dominio --}}
                <div class="content-box-header bg-primary">
                    <h5>Permissoes</h5>
                </div>
                <div class="content-box-wrapper">
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="grupo">Grupo</label>
                                <select class="form-control" id="selecaogrupo" name="selecaogrupo">
                                    <option value="3dev-usuariokey">Usuario chave - todos recursos</option>
                                    <option value="3dev-usuariovisu">Usuario - visualização</option>
                                </select>                            
                        </div>
                        <div class="form-group col-md-7 my-3">
                            <div class="text-left my-4">
                                <button type="button" class="btn btn-primary ml-2" onclick="SubmitGrupo();">Atribui
                                    permissão do
                                    grupo selecionado</button>
                                {{-- <button type="button" class="btn btn-yellow ml-2" onclick="CancelaGrupo();">Limpa
                                    permissão do
                                    grupo selecionado</button> --}}
                                <button type="button" class="btn btn-danger ml-2" onclick="CancelaTudo();">Limpa
                                    tudo</button>
                                {{-- <button type="button" class="btn btn-danger ml-2" onclick="xxo();">xx</button> --}}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group form-check col-md-6">
                            <label class="mx-1">A</label>
                            <label class="mx-1">E</label>
                            <label class="mx-1">R</label>
                            <label class="mx-1">V</label>
                        </div>
                        {{-- <div class="form-group form-check col-md-6">
                            <label class="mx-1">A</label>
                            <label class="mx-1">E</label>
                            <label class="mx-1">R</label>
                            <label class="mx-1">V</label>
                        </div> --}}
                    </div>
                    {{-- TODAS AS PERMISSOES --}}
                    <div class="row">
                        @foreach ($permissoes as $permissao)
                        <div class="form-group form-check col-md-12">
                            <input type="checkbox" id="{{$permissao->identificador}}-A" name="permissoes[]"
                                value="{{$permissao->identificador}}-A" title="Adicionar {{$permissao->nome}} "
                                @if(substr($permissao->identificador,0,4) === 'VISU')
                            Disabled
                            @else
                            @if(!empty($usuario) && ($usuario->hasPermissao($permissao->identificador."-A")))
                            checked
                            @endif
                            @endif
                            />
                            <input type="checkbox" id="{{$permissao->identificador}}-E" name="permissoes[]"
                                value="{{$permissao->identificador}}-E" title="Editar {{$permissao->nome}} "
                                @if(substr($permissao->identificador,0,4) === 'VISU' || $permissao->identificador
                            === 'INPI-RPI')
                            Disabled
                            @else
                            @if(!empty($usuario) && ($usuario->hasPermissao($permissao->identificador."-E")))
                            checked
                            @endif
                            @endif
                            />
                            <input type="checkbox" id="{{$permissao->identificador}}-R" name="permissoes[]"
                                value="{{$permissao->identificador}}-R" title="Remover {{$permissao->nome}}"
                                @if(substr($permissao->identificador,0,4) === 'VISU')
                            Disabled
                            @else
                            @if(!empty($usuario) && ($usuario->hasPermissao($permissao->identificador."-R")))
                            checked
                            @endif
                            @endif
                            />
                            <input type="checkbox" id="{{$permissao->identificador}}-V" name="permissoes[]"
                                value="{{$permissao->identificador}}-V" title="Visualizar {{$permissao->nome}}"
                                data-parsley-required @if(!empty($usuario) &&
                                ($usuario->hasPermissao($permissao->identificador."-V"))) checked @endif />
                            <label class="form-check-label">{{$permissao->nome}}</label>
                        </div>
                        @endforeach
                    </div>

                </div>
            </div>
        </form>
        <div class="text-right">
            <button type="button" class="btn btn-default mr-2" data-dismiss="modal"
                onclick="history.back(-1);">Voltar</button>
            <button id="saveform-table-content" type="button" class="btn btn-primary ml-2"
                onclick="$('#form-usuarios').parsley().validate();">Salvar</button>
        </div>
    </div>
</div>

@endsection


@section('javascript')
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/parsley.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/pt-br.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/nitsys.js')}}"></script>
<script type="text/javascript">
    $('#form-usuarios').parsley().on('form:success', function () {
        Nitsys.saveForm('form-usuarios');
    });

    function atribuigrupo(valor) {
        var atribui = $("#selecaogrupo option:selected").val();

         if (atribui === '3dev-usuariokey') {
            $('#VISUDASHBOARD3-V').prop('checked', valor);
            $('#AGENDA3-A').prop('checked', valor);
            $('#AGENDA3-E').prop('checked', valor);
            $('#AGENDA3-R').prop('checked', valor);
            $('#AGENDA3-V').prop('checked', valor);

            $('#PRECADASTRO3-FORMULARIO-A').prop('checked', valor);
            $('#PRECADASTRO3-FORMULARIO-E').prop('checked', valor);
            $('#PRECADASTRO3-FORMULARIO-R').prop('checked', valor);
            $('#PRECADASTRO3-FORMULARIO-V').prop('checked', valor);

            $('#PRECADASTRO3-REMEDIO-A').prop('checked', valor);
            $('#PRECADASTRO3-REMEDIO-E').prop('checked', valor);
            $('#PRECADASTRO3-REMEDIO-R').prop('checked', valor);
            $('#PRECADASTRO3-REMEDIO-V').prop('checked', valor);

            $('#PRECADASTRO3-PROFISSIONAL-A').prop('checked', valor);
            $('#PRECADASTRO3-PROFISSIONAL-E').prop('checked', valor);
            $('#PRECADASTRO3-PROFISSIONAL-R').prop('checked', valor);
            $('#PRECADASTRO3-PROFISSIONAL-V').prop('checked', valor);

            $('#CLIENTE3-A').prop('checked', valor);
            $('#CLIENTE3-E').prop('checked', valor);
            $('#CLIENTE3-R').prop('checked', valor);
            $('#CLIENTE3-V').prop('checked', valor);

            $('#CLIENTE3-DADOS-A').prop('checked', valor);
            $('#CLIENTE3-DADOS-E').prop('checked', valor);
            $('#CLIENTE3-DADOS-R').prop('checked', valor);
            $('#CLIENTE3-DADOS-V').prop('checked', valor);

            $('#CLIENTE3-FORMULARIO-A').prop('checked', valor);
            $('#CLIENTE3-FORMULARIO-E').prop('checked', valor);
            $('#CLIENTE3-FORMULARIO-R').prop('checked', valor);
            $('#CLIENTE3-FORMULARIO-V').prop('checked', valor);

            $('#CLIENTE3-HISTORICO-A').prop('checked', valor);
            $('#CLIENTE3-HISTORICO-E').prop('checked', valor);
            $('#CLIENTE3-HISTORICO-R').prop('checked', valor);
            $('#CLIENTE3-HISTORICO-V').prop('checked', valor);

            $('#CLIENTE3-DOCUMENTO-A').prop('checked', valor);
            $('#CLIENTE3-DOCUMENTO-E').prop('checked', valor);
            $('#CLIENTE3-DOCUMENTO-R').prop('checked', valor);
            $('#CLIENTE3-DOCUMENTO-V').prop('checked', valor);

            $('#USUARIO-A').prop('checked', valor);
            $('#USUARIO-E').prop('checked', valor);
            $('#USUARIO-R').prop('checked', valor);
            $('#USUARIO-V').prop('checked', valor);
            
            $('#VISUCLIENTE3-V').prop('checked', valor);
            $('#VISUACESSO-V').prop('checked', valor);
            

        }
        if (atribui === '3dev-usuariovisu') {
            $('#AGENDA3-V').prop('checked', valor);

            $('#CLIENTE3-V').prop('checked', valor);

            $('#CLIENTE3-DADOS-V').prop('checked', valor);

            $('#PRECADASTRO3-FORMULARIO-V').prop('checked', valor);

            $('#PRECADASTRO3-REMEDIO-V').prop('checked', valor);

            $('#PRECADASTRO3-PROFISSIONAL-V').prop('checked', valor);

            $('#CLIENTE3-HISTORICO-V').prop('checked', valor);

            $('#CLIENTE3-FORMULARIO-V').prop('checked', valor);
            
            $('#CLIENTE3-DOCUMENTO-V').prop('checked', valor);

            $('#USUARIO-V').prop('checked', valor);
            
            $('#VISUCLIENTE3-V').prop('checked', valor);

            $('#VISUACESSO-V').prop('checked', valor);

        }




    }


    function SubmitGrupo() {
        $valor = true;
        atribuigrupo($valor);

    }

    function CancelaGrupo() {
        $valor = false;
        atribuigrupo($valor);
    }

    function CancelaTudo() {
            valor = false;
            //  SISTEMA 3
            $('#VISUDASHBOARD3-V').prop('checked', valor);
            $('#AGENDA3-A').prop('checked', valor);
            $('#AGENDA3-E').prop('checked', valor);
            $('#AGENDA3-R').prop('checked', valor);
            $('#AGENDA3-V').prop('checked', valor);

            $('#PRECADASTRO3-FORMULARIO-A').prop('checked', valor);
            $('#PRECADASTRO3-FORMULARIO-E').prop('checked', valor);
            $('#PRECADASTRO3-FORMULARIO-R').prop('checked', valor);
            $('#PRECADASTRO3-FORMULARIO-V').prop('checked', valor);

            $('#PRECADASTRO3-REMEDIO-A').prop('checked', valor);
            $('#PRECADASTRO3-REMEDIO-E').prop('checked', valor);
            $('#PRECADASTRO3-REMEDIO-R').prop('checked', valor);
            $('#PRECADASTRO3-REMEDIO-V').prop('checked', valor);

            $('#PRECADASTRO3-PROFISSIONAL-A').prop('checked', valor);
            $('#PRECADASTRO3-PROFISSIONAL-E').prop('checked', valor);
            $('#PRECADASTRO3-PROFISSIONAL-R').prop('checked', valor);
            $('#PRECADASTRO3-PROFISSIONAL-V').prop('checked', valor);

            $('#CLIENTE3-A').prop('checked', valor);
            $('#CLIENTE3-E').prop('checked', valor);
            $('#CLIENTE3-R').prop('checked', valor);
            $('#CLIENTE3-V').prop('checked', valor);

            $('#CLIENTE3-DADOS-A').prop('checked', valor);
            $('#CLIENTE3-DADOS-E').prop('checked', valor);
            $('#CLIENTE3-DADOS-R').prop('checked', valor);
            $('#CLIENTE3-DADOS-V').prop('checked', valor);

            $('#CLIENTE3-FORMULARIO-A').prop('checked', valor);
            $('#CLIENTE3-FORMULARIO-E').prop('checked', valor);
            $('#CLIENTE3-FORMULARIO-R').prop('checked', valor);
            $('#CLIENTE3-FORMULARIO-V').prop('checked', valor);

            $('#CLIENTE3-HISTORICO-A').prop('checked', valor);
            $('#CLIENTE3-HISTORICO-E').prop('checked', valor);
            $('#CLIENTE3-HISTORICO-R').prop('checked', valor);
            $('#CLIENTE3-HISTORICO-V').prop('checked', valor);

            $('#CLIENTE3-DOCUMENTO-A').prop('checked', valor);
            $('#CLIENTE3-DOCUMENTO-E').prop('checked', valor);
            $('#CLIENTE3-DOCUMENTO-R').prop('checked', valor);
            $('#CLIENTE3-DOCUMENTO-V').prop('checked', valor);

            $('#USUARIO-A').prop('checked', valor);
            $('#USUARIO-E').prop('checked', valor);
            $('#USUARIO-R').prop('checked', valor);
            $('#USUARIO-V').prop('checked', valor);
            
            $('#VISUCLIENTE3-V').prop('checked', valor);
            $('#VISUACESSO-V').prop('checked', valor);            

    }

    $('#cpf').mask('000.000.000-00', {
        reverse: true
    });
</script>
@endsection