@extends('base.master')

@section('content')
<div class="panel">
    <div class="panel-body">
        <form id="form-clientepf" method="POST" action="{{config('app.url')}}/action/aplicativo3/paciente/clientepf/save"
            data-parsley-validate="">
            <div class="content-box">
                <input type="hidden" id="id" name="id" value="{{(!empty($clientepf->id) ? $clientepf->id : '')}}" />
                <div class="content-box-header bg-primary">
                    <h5>Pessoal</h5>
                </div>
                <div class="content-box-wrapper">
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite o cpf"
                                data-parsley-pattern="[0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2}"
                                data-parsley-required value="{{(!empty($clientepf->cpf) ? $clientepf->cpf : '')}}" />
                        </div>
                        <div class="form-group col-md-10">
                            <label for="nome">Nome completo</label>
                            <input type="text" id="nome" name="nome" class="form-control"
                                placeholder="Digite o nome completo" data-parsley-maxlength="64" data-parsley-required
                                value="{{(!empty($clientepf->nome) ? $clientepf->nome : '')}}" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telefone">Telefone</label>
                            <input type="text" id="telefone" name="telefone" class="form-control"
                                placeholder="Digite o telefone" data-parsley-maxlength="16"
                                value="{{(!empty($clientepf->telefone) ? $clientepf->telefone : '')}}" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="email">E-mail</label>
                            <input type="text" id="email" name="email" class="form-control" placeholder="Digite o email"
                                data-parsley-maxlength="100"
                                value="{{(!empty($clientepf->email) ? $clientepf->email : '')}}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="cep"> CEP</label>
                            <input type="text" id="cep" name="cep" class="form-control" placeholder="Digite o cep"
                                data-parsley-pattern="[0-9]{5}[-]?[0-9]{3}" data-parsley-maxlength="9"
                                value="{{(!empty($clientepf->cep) ? $clientepf->cep : '')}}" />
                        </div>
                        <div class="form-group col-md-6">
                            <label for="endereco">Endereço</label>
                            <input type="text" id="endereco" name="endereco" class="form-control"
                                placeholder="Digite o Endereço" data-parsley-maxlength="128"
                                value="{{(!empty($clientepf->endereco) ? $clientepf->endereco : '')}}" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="bairro">Bairro</label>
                            <input type="text" id="bairro" name="bairro" class="form-control"
                                placeholder="Digite o bairro" data-parsley-maxlength="64"
                                value="{{(!empty($clientepf->bairro) ? $clientepf->bairro : '')}}" />
                        </div>
                        <div class="form-group col-md-2">
                            <label for="cidade">Cidade</label>
                            <input type="text" id="cidade" name="cidade" class="form-control"
                                placeholder="Digite a cidade" data-parsley-maxlength="32"
                                value="{{(!empty($clientepf->cidade) ? $clientepf->cidade : '')}}" />
                        </div>
                        <div class="col-md-3">
                            <label for="estado">Estado</label>
                            <select id="estado" class="form-control" name="estado"
                                data-parsley-pattern="^(?:ac|al|ap|am|ba|ce|df|es|go|ma|mt|ms|mg|pa|pb|pr|pe|pi|rj|rn|rs|ro|rr|sc|sp|se|to)$">
                                <option value="">Escolher..</option>
                                <option value="ac" @if(!empty($clientepf->estado) && 'ac' === $clientepf->estado) selected
                                    @endif>Acre</option>
                                <option value="al" @if(!empty($clientepf->estado) && 'al' === $clientepf->estado) selected
                                    @endif>Alagoas</option>
                                <option value="ap" @if(!empty($clientepf->estado) && 'ap' === $clientepf->estado) selected
                                    @endif>Amapá</option>
                                <option value="am" @if(!empty($clientepf->estado) && 'am' === $clientepf->estado) selected
                                    @endif>Amazonas</option>
                                <option value="ba" @if(!empty($clientepf->estado) && 'ba' === $clientepf->estado) selected
                                    @endif>Bahia</option>
                                <option value="ce" @if(!empty($clientepf->estado) && 'ce' === $clientepf->estado) selected
                                    @endif>Ceará</option>
                                <option value="df" @if(!empty($clientepf->estado) && 'df' === $clientepf->estado) selected
                                    @endif>Distrito Federal</option>
                                <option value="es" @if(!empty($clientepf->estado) && 'es' === $clientepf->estado) selected
                                    @endif>Espirito Santo</option>
                                <option value="go" @if(!empty($clientepf->estado) && 'go' === $clientepf->estado) selected
                                    @endif>Goias</option>
                                <option value="ma" @if(!empty($clientepf->estado) && 'ma' === $clientepf->estado) selected
                                    @endif>Maranhão</option>
                                <option value="mt" @if(!empty($clientepf->estado) && 'mt' === $clientepf->estado) selected
                                    @endif>Mato Grosso</option>
                                <option value="ms" @if(!empty($clientepf->estado) && 'ms' === $clientepf->estado) selected
                                    @endif>Mato Grosso do Sul</option>
                                <option value="mg" @if(!empty($clientepf->estado) && 'mg' === $clientepf->estado) selected
                                    @endif>Minas Gerais</option>
                                <option value="pa" @if(!empty($clientepf->estado) && 'pa' === $clientepf->estado) selected
                                    @endif>Pará</option>
                                <option value="pb" @if(!empty($clientepf->estado) && 'pb' === $clientepf->estado) selected
                                    @endif>Paraiba</option>
                                <option value="pr" @if(!empty($clientepf->estado) && 'pr' === $clientepf->estado) selected
                                    @endif>Paraná</option>
                                <option value="pe" @if(!empty($clientepf->estado) && 'pe' === $clientepf->estado) selected
                                    @endif>Pernambuco</option>
                                <option value="pi" @if(!empty($clientepf->estado) && 'pi' === $clientepf->estado) selected
                                    @endif>Piaui</option>
                                <option value="rj" @if(!empty($clientepf->estado) && 'rj' === $clientepf->estado) selected
                                    @endif>Rio de Janeiro</option>
                                <option value="rn" @if(!empty($clientepf->estado) && 'rn' === $clientepf->estado) selected
                                    @endif>Rio Grande do Norte</option>
                                <option value="rs" @if(!empty($clientepf->estado) && 'rs' === $clientepf->estado) selected
                                    @endif>Rio Grande do Sul</option>
                                <option value="ro" @if(!empty($clientepf->estado) && 'ro' === $clientepf->estado) selected
                                    @endif>Rondônia</option>
                                <option value="rr" @if(!empty($clientepf->estado) && 'rr' === $clientepf->estado) selected
                                    @endif>Roraima</option>
                                <option value="sc" @if(!empty($clientepf->estado) && 'sc' === $clientepf->estado) selected
                                    @endif>Santa Catarina</option>
                                <option value="sp" @if(!empty($clientepf->estado) && 'sp' === $clientepf->estado) selected
                                    @endif>São Paulo</option>
                                <option value="se" @if(!empty($clientepf->estado) && 'se' === $clientepf->estado) selected
                                    @endif>Sergipe</option>
                                <option value="to" @if(!empty($clientepf->estado) && 'to' === $clientepf->estado) selected
                                    @endif>Tocantins</option>
                            </select>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="rg">Registro Geral</label>
                            <input type="text" id="rg" name="rg" class="form-control" placeholder="Digite o rg"
                                data-parsley-maxlength="15" value="{{(!empty($clientepf->rg) ? $clientepf->rg : '')}}" />
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-box">
                <div class="content-box-header bg-primary">
                    <h5>Anotações gerais</h5>
                </div>
                <div class="content-box-wrapper">
                    <div class="form-group col-md-12">
                        <textarea id="anotacao_geral" name="anotacao_geral" placeholder="Digite anotações gerais" rows="2"
                            class="form-control textarea-md">{{(!empty($clientepf->anotacao_geral) ? $clientepf->anotacao_geral : '')}}</textarea>
                    </div>
                </div>
            </div>

            <div class="text-right">
                <button type="button" class="btn btn-default mr-2" data-dismiss="modal"
                    onclick="history.back(-1);">Voltar</button>
                <button id="saveform-table-content" type="button" class="btn btn-primary ml-2"
                    onclick="$('#form-clientepf').parsley().validate();">Salvar</button>
            </div>


        </form>    
    </div>
</div>

@endsection


@section('javascript')
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/parsley.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/pt-br.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/nitsys.js')}}"></script>
<script type="text/javascript">
    $('#cpf').mask('000.000.000-00', {
        reverse: true
    });
    $('#cep').mask('00000-000', {
        reverse: true
    });
    $('#cep').change(function () {
        Nitsys.checkCEP($('#cep').val(), 'form-clientepf');
    });
    $('#rg').mask('00.000.000-0', {
        reverse: true
    });
    $('#form-clientepf').parsley().on('form:success', function () {
        Nitsys.saveForm('form-clientepf');
    });
</script>
@endsection