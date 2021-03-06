{{-- <li>{{$nome}}</li> --}}
<div id="form-modal-cliente" class="form-modal modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header btn-info">
                <h4 class="modal-title">Cliente</h4>
                <button class="close" type="button" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-cliente" method="POST" action="{{config('app.url')}}/action/aplicativo4/animal/cliente" onsubmit="return false;"
                    data-parsley-validate="">
                    <input type="hidden" id="id" name="id" value="" />
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome "
                                data-parsley-maxlength="64" data-parsley-required />
                        </div>
                        <div class="form-group col-md-6 ">
                            <label for="prop">Proprietario</label>
                            <select class="form-control" id="a4proprietario_id" name="a4proprietario_id">
                                <option value="">Escolher..</option>                         
                                @foreach($proprietarios as $proprietario)
                                    <option value="{{$proprietario->id}}">{{$proprietario->nome}} --------- CPF:{{$proprietario->cpf}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>                        
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>                
                <button id="saveform-cliente" type="button" class="btn btn-primary">Salvar</button>
                {{-- <button id="saveform-formulario" type="button" class="btn btn-primary ml-2" onclick="teste();">TESTE on click</button>     --}}
            </div>
        </div>
    </div>
</div>
<div class="panel simplecrud-panel">
    <div class="panel-body" id="cliente">
    </div>
</div>

@php($XX=$nome)

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
                    id: "proprietario",
                    title: "Proprietário",
                    visible: true,
                    order: 2,
                    priority: 3
                },                
                {
                    id: "action",
                    edit: true,
                    delete: true,
                    show: true,
                    order: 6,
                    priority: 7
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
            container: "cliente",
            formEntity: "form-cliente",
            // editType: "modal",
            editType: "redirect",
            filterFooter: true,
            // addType: @if(Auth::user()->can('ANIMAL-A')) "modal" @else "none" @endif,
            addType: "none",
            // addButtonText: "Adicionar Cliente",
            urls: {
                list: "{{config('app.url')}}/action/aplicativo4/animal/cliente/list/"+"{{$XX}}",
                delete: "{{config('app.url')}}/action/aplicativo4/animal/cliente/delete/",
                // edit: "{{config('app.url')}}/action/aplicativo4/animal/cliente/editar/",
                edit: "{{config('app.url')}}/aplicativo4/animal/clienteopcao/",
                add: "{{config('app.url')}}/action/aplicativo4/animal/cliente/novo"
            }
        }
    });
    // CKEDITOR.timestamp = Math.random().toString(36).substring(7);
    // CKEDITOR.replace( 'descricao', { customConfig : "{{asset('theme-assets/widgets/ckeditor/nitconfig.js')}}"});   
    // // atualiza texto do editor para textarea
    // $('#form-formulario').parsley().on('form:success', function () {
    //     $('textarea.ckeditor').each(function () {
    //         var $textarea = $(this);
    //         $textarea.val(CKEDITOR.instances[$textarea.attr('name')].getData());
    //     });
    //     Nitsys.saveForm('form-formulario');
    // });


    @if(Auth::user()->can('ANIMAL-A') || Auth::user()->can('ANIMAL-E'))
        $('#form-cliente').parsley().on('form:success', function () {
            Nitsys.saveForm('form-cliente', simpleCRUDObj);
        });
        $('.form-modal').on('hidden.bs.modal', function (e) {
            Nitsys.clearForm('form-cliente');
            $('#form-cliente').parsley().reset();
            $(".parsley-errors-list").remove();
        });
    @endif

</script>
