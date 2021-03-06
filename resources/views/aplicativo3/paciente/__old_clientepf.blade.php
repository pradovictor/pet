@extends('base.master')

@section('content')
{{-- @if(Auth::user()->can('PROJETO2-A')) --}}
<div id="form-modal-clientepf" class="form-modal modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Adicionar Cliente</h4>
                <button class="close" type="button" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">

        <form id="form-clientepf" method="POST" action="{{config('app.url')}}/action/aplicativo3/paciente/clientepf/save"
            data-parsley-validate="">
          
                <input type="hidden" id="id" name="id" value="{{(!empty($clientepf->id) ? $clientepf->id : '')}}" />
                {{-- <div class="content-box-header bg-primary">
                    <h5>Pessoal</h5>
                </div> --}}
                <div class="content-box-wrapper">
                    <div class="row">
                        <div class="form-group col-md-9">
                            <label for="nome">Nome completo</label>
                            <input type="text" id="nome" name="nome" class="form-control"
                                placeholder="Digite o nome completo" data-parsley-maxlength="64" data-parsley-required
                                value="{{(!empty($clientepf->nome) ? $clientepf->nome : '')}}" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="cpf">CPF</label>
                            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite o cpf"
                                data-parsley-pattern="[0-9]{3}[\.]?[0-9]{3}[\.]?[0-9]{3}[-]?[0-9]{2}"
                                 value="{{(!empty($clientepf->cpf) ? $clientepf->cpf : '')}}" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telefone">Telefone</label>
                            <input type="text" id="telefone" name="telefone" class="form-control"
                                placeholder="Digite o telefone" data-parsley-maxlength="16"
                                value="{{(!empty($clientepf->telefone) ? $clientepf->telefone : '')}}" />
                        </div>
                        <div class="form-group col-md-3">
                            <label for="telefone">Celular</label>
                            <input type="text" id="celular" name="celular" class="form-control"
                                placeholder="Digite o telefone" data-parsley-maxlength="32"
                                value="{{(!empty($clientepf->celular) ? $clientepf->celular : '')}}" />
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
                        <div class="form-group col-md-3">
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
                        <div class="form-group col-md-3">
                            <label for="telefone">Ocupação</label>
                            <input type="text" id="ocupacao" name="ocupacao" class="form-control"
                                placeholder="Digite a ocupação" data-parsley-maxlength="64"
                                value="{{(!empty($clientepf->ocupacao) ? $clientepf->ocupacao : '')}}" />
                        </div>
                    </div>
                </div>
           
            {{-- <div class="content-box">
                <div class="content-box-header bg-primary">
                    <h5>Anotações gerais</h5>
                </div>
                <div class="content-box-wrapper">
                    <div class="form-group col-md-12">
                        <textarea id="anotacao_geral" name="anotacao_geral" placeholder="Digite anotações gerais" rows="2"
                            class="form-control textarea-md">{{(!empty($clientepf->anotacao_geral) ? $clientepf->anotacao_geral : '')}}</textarea>
                    </div>
                </div>
            </div> --}}

        </form>    






        </div>
            
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button id="saveform-clientepf" type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>
{{-- @endif --}}

<div id="view-container" class="d-none"></div>

<div class="panel simplecrud-panel">
    <div class="panel-body" id="clientepf"></div>
</div>

@endsection

@section('javascript')

<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/parsley.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/pt-br.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/jquery-mask-plugin/jquery.mask.min.js')}}"></script>

<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/DataTables-1.10.18/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/Buttons-1.5.2/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/Buttons-1.5.2/js/buttons.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/JSZip-2.5.0/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/parsley.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/pt-br.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/Buttons-1.5.2/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/Buttons-1.5.2/js/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/Buttons-1.5.2/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/nitsys.js')}}"></script>
<script type="text/javascript">
    var simpleCRUDObj = SimpleCRUD.load({
        dataTables: {
            columns: [
                {
                    id: "nome",
                    title: "Nome",
                    visible: true,
                    order: 1,
                    priority: 1
                },
                {
                    id: "cpf",
                    title: "CPF",
                    visible: true,
                    order: 2,
                    priority: 3
                },
                {
                    id: "telefone",
                    title: "Telefone",
                    visible: true,
                    order: 10,
                    priority: 11
                },   
                {
                    id: "email",
                    title: "E-mail",
                    visible: true,
                    order: 11,
                    priority: 12
                },   
                {
                    id: "cep",
                    title: "Cep",
                    visible: false,
                    order: 12,
                    priority: 13
                },   
                {
                    id: "endereco",
                    title: "Endereço",
                    visible: false,
                    order: 13,
                    priority: 14
                },   
                {
                    id: "bairro",
                    title: "bairro",
                    visible: false,
                    order: 14,
                    priority: 15
                },   
                {
                    id: "cidade",
                    title: "cidade",
                    visible: false,
                    order: 15,
                    priority: 16
                },   
                {
                    id: "estado",
                    title: "estado",
                    visible: false,
                    order: 16,
                    priority: 17
                },
                {   
                    id: "rg",
                    title: "RG",
                    visible: false,
                    order: 22,
                    priority: 23
                },
                {   
                    id: "anotacao_geral",
                    title: "Anotações gerais",
                    visible: false,
                    order: 30,
                    priority: 31
                },
                {
                    id: "action",
                    edit: true,
                    delete: true,
                    view: true,
                    order: 31,
                    priority: 32,
                    show: true
                }
            ],
            buttons: {
                showColumns: true,
                copy: true,
                excel: true,
                csv: true,
                pdf: true,
                print: true
            },
            actionDescription: "nome",
            container: "clientepf",
            formEntity: "form-clientepf",
            editType: "redirect",
            addType: @if(Auth::user()->can('CLIENTE3-A')) "modal" @else "none" @endif,
            // addType: "redirect",
            viewType: "redirect",
            addButtonText: "Adicionar Cliente",
            filterFooter: true,
            urls: {
                list: "{{config('app.url')}}/action/aplicativo3/paciente/clientepf/list",
                add: "{{config('app.url')}}/action/aplicativo3/paciente/clientepf/novo",
                delete: "{{config('app.url')}}/action/aplicativo3/paciente/clientepf/delete/",
                view: "{{config('app.url')}}/aplicativo3/paciente/viewext/",
                edit: "{{config('app.url')}}/aplicativo3/paciente/selecao/",
            }
        }
    });

    $('#form-clientepf').parsley().on('form:success', function () {
        Nitsys.saveForm('form-clientepf', simpleCRUDObj);
    });
    $('form-modal').on('hidden.bs.modal', function (e) {
        Nitsys.clearForm('form-clientepf');
        $('#form-clientepf').parsley().reset();
        $(".parsley-errors-list").remove();
    });

    $('#cpf').mask('000.000.000-00', {
        reverse: true
    });

    $('#cep').mask('00000-000', {
        reverse: true
    });
    $('#cep').change(function () {
        Nitsys.checkCEP($('#cep').val(), 'form-clientepf');
    });



</script>
@endsection