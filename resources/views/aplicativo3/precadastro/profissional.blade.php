@extends('base.master')

@section('content')
@if(Auth::user()->can('PRECADASTRO3-PROFISSIONAL-A') || Auth::user()->can('PRECADASTRO3-PROFISSIONAL-E'))
<div id="form-modal-profissional" class="form-modal modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Profissional</h4>
                <button class="close" type="button" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-profissional" method="POST" action="{{config('app.url')}}/action/aplicativo3/precadastro/profissional" onsubmit="return false;"
                    data-parsley-validate="">
                    <input type="hidden" id="id" name="id" value="" />
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome "
                                data-parsley-maxlength="80" data-parsley-required />
                        </div>
                        <div class="form-group col-md-3">
                            <label title="cor" for="cor">Cor</label>
                            <select class="form-control" id="cor" name="cor" data-parsley-required data-parley-pattern="^(?:#ff9800|#4CAF50|#f44336|#2196F3|#ee82ee|#4169e1)$">
                                <option value="">Escolher..</option>
                                    {{-- <option value="#ff9800" @if('#ff9800'==$a3profissional->cor) selected @endif>Laranja</option>
                                    <option value="#4CAF50" @if('#4CAF50'==$profissional->cor) selected @endif>Verde</option>
                                    <option value="#f44336" @if('#f44336'==$profissional->cor) selected @endif>Vermelho</option> --}}
                                    <option value="#ffff00" >Amarelo</option>
                                    <option value="#4169e1" >Anil</option>
                                    <option value="#2196F3" >Azul</option>
                                    <option value="#ff9800" >Laranja</option>
                                    <option value="#f44336" >Vermelho</option>
                                    <option value="#4CAF50" >Verde</option>
                                    <option value="#ee82ee" >Violeta</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>                
                <button id="saveform-profissional" type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>
@endif
<div class="panel simplecrud-panel">
    <div class="panel-body" id="profissional">
    </div>
</div>
<li>Observação: ao eliminar o profissional, serão <mark>deletados</mark> todos os respectivos registros de agendamento</li>
{{-- <u>texto sublinhado</u> --}}
@endsection


@section('javascript')
{{-- <script type="text/javascript" src="{{asset('theme-assets/widgets/ckeditor/ckeditor.js')}}"></script> --}}
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/DataTables-1.10.18/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/Buttons-1.5.2/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/Buttons-1.5.2/js/buttons.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/JSZip-2.5.0/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/Buttons-1.5.2/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/Buttons-1.5.2/js/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/Buttons-1.5.2/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/parsley.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/pt-br.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
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
                    // render: 'hyperlink',
                },
                {
                    id: "cor",
                    title: "Cor",
                    visible: true,
                    order: 2,
                    priority: 3
                },
                {
                    id: "action",
                    edit: true,
                    delete: true,
                    show: true,
                    order: 4,
                    priority: 5
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
            container: "profissional",
            formEntity: "form-profissional",
            editType: "modal",
            addType: @if(Auth::user()->can('PRECADASTRO3-REMEDIO-A')) "modal" @else "none" @endif,
            addButtonText: "Adicionar Profissional",
            urls: {
                list: "{{config('app.url')}}/action/aplicativo3/precadastro/profissional/list",
                delete: "{{config('app.url')}}/action/aplicativo3/precadastro/profissional/delete/",
                edit: "{{config('app.url')}}/action/aplicativo3/precadastro/profissional/editar/",
                add: "{{config('app.url')}}/action/aplicativo3/precadastro/profissional/novo"
            }
        }
    });

    @if(Auth::user()->can('PRECADASTRO3-PROFISSIONAL-A') || Auth::user()->can('PRECADASTRO3-PROFISSIONAL-E'))
        $('#form-profissional').parsley().on('form:success', function () {
            Nitsys.saveForm('form-profissional', simpleCRUDObj);
        });
        $('.form-modal').on('hidden.bs.modal', function (e) {
            Nitsys.clearForm('form-profissional');
            $('#form-profissional').parsley().reset();
            $(".parsley-errors-list").remove();
        });
    @endif

</script>
@endsection