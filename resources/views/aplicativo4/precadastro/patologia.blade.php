@extends('base.master')

@section('content')
@if(Auth::user()->can('PRECADASTRO4-A') || Auth::user()->can('PRECADASTRO4-E'))
<div id="form-modal-patologia" class="form-modal modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header btn-info">
            {{-- <div class="modal-header"> --}}
                <h4 class="modal-title">Patologia</h4>
                <button class="close" type="button" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-patologia" method="POST" action="{{config('app.url')}}/action/aplicativo4/precadastro/patologia" onsubmit="return false;"
                    data-parsley-validate="">
                    <input type="hidden" id="id" name="id" value="" />
                    <div class="row">
                        <div class="form-group col-md-8">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome "
                                data-parsley-maxlength="128" data-parsley-required />
                        </div>
                    </div>
                    <div class="row">    
                        <div class="form-group col-md-12">
                            <label for="nome">Descrição</label>
                            <div class="content-box-wrapper">
                                    <textarea id="descricao" name="descricao" placeholder="Digite a descrição " rows="3" class="form-control textarea-md"></textarea>
                            </div>
                        </div>
                    </div>                    
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>                
                <button id="saveform-patologia" type="button" class="btn btn-primary">Salvar</button>
            </div>
        </div>
    </div>
</div>
@endif
<div class="panel simplecrud-panel">
    <div class="panel-body" id="patologia">
    </div>
</div>
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
                },
                {
                    id: "descricao",
                    title: "Descrição",
                    visible: true,
                    order: 2,
                    priority: 3
                },

                {
                    id: "action",
                    edit: true,
                    delete: true,
                    show: true,
                    order: 3,
                    priority: 4
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
            container: "patologia",
            formEntity: "form-patologia",
            editType: "modal",
            filterFooter: true,
            addType: @if(Auth::user()->can('PRECADASTRO4-A')) "modal" @else "none" @endif,
            addButtonText: "Adicionar Patologia",
            urls: {
                list: "{{config('app.url')}}/action/aplicativo4/precadastro/patologia/list",
                delete: "{{config('app.url')}}/action/aplicativo4/precadastro/patologia/delete/",
                edit: "{{config('app.url')}}/action/aplicativo4/precadastro/patologia/editar/",
                add: "{{config('app.url')}}/action/aplicativo4/precadastro/patologia/novo"
            }
        }
    });

    @if(Auth::user()->can('PRECADASTRO4-A') || Auth::user()->can('PRECADASTRO4-E'))
        $('#form-patologia').parsley().on('form:success', function () {
            Nitsys.saveForm('form-patologia', simpleCRUDObj);
        });
        $('.form-modal').on('hidden.bs.modal', function (e) {
            Nitsys.clearForm('form-patologia');
            $('#form-patologia').parsley().reset();
            $(".parsley-errors-list").remove();
        });
    @endif

</script>
@endsection