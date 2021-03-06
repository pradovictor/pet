{{-- <li>{{$nome}}</li> --}}
<div id="form-modal-animal" class="form-modal modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Animal</h4>
                <button class="close" type="button" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-animal" method="POST" action="{{config('app.url')}}/action/aplicativo3/precadastro/animal" onsubmit="return false;"
                    data-parsley-validate="">
                    <input type="hidden" id="id" name="id" value="" />
                    
                    <div class="row">
                        <div class="form-group col-md-2">
                            <label for="nome">Nome</label>
                            <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome "
                                data-parsley-maxlength="64" data-parsley-required />
                        </div>
                        <div class="form-group col-md-2">
                            <label for="nome">Sexo</label>
                            <input type="text" id="sexo" name="sexo" class="form-control" placeholder="Digite o sexo"
                                data-parsley-maxlength="1"/>
                        </div>
                        <div class="form-group col-md-8 ">
                            <label for="prop">Proprietario</label>
                            <select class="form-control" id="proprietario_id" name="proprietario_id">
                                <option value="">Escolher..</option>                         
                                 @foreach($proprietarios as $proprietario)
                                    <option value="{{$proprietario->id}}">{{$proprietario->nome}} --------- CPF:{{$proprietario->cpf}}</option>
                                @endforeach
                            </select>
                        </div>


                        <div class="form-group col-md-12">
                            <label for="nome">Historico</label>
                            <textarea class="form-control textarea-lg" id=historico name=historico></textarea>
                            {{-- <input type="text" id="historico" name="historico" class="form-control" placeholder="Digite o historico" /> --}}
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>                
                <button id="saveform-animal" type="button" class="btn btn-primary">Salvar</button>
                {{-- <button id="saveform-formulario" type="button" class="btn btn-primary ml-2" onclick="teste();">TESTE on click</button>     --}}
            </div>
        </div>
    </div>
</div>
<div class="panel simplecrud-panel">
    <div class="panel-body" id="animal">
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
                    id: "sexo",
                    title: "Sexo",
                    visible: true,
                    order: 2,
                    priority: 3
                },
                {
                    id: "pedigree",
                    title: "pedigree",
                    visible: true,
                    order: 3,
                    priority: 4
                },               
                {
                    id: "proprietario",
                    title: "Proprietario ID",
                    visible: true,
                    order: 4,
                    priority: 5
                },               
                {
                    id: "historico",
                    title: "Historico",
                    visible: true,
                    order: 5,
                    priority: 6
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
            container: "animal",
            formEntity: "form-animal",
            editType: "modal",
            addType: @if(Auth::user()->can('PRECADASTRO3-REMEDIO-A')) "modal" @else "none" @endif,
            addButtonText: "Adicionar animal",
            urls: {
                list: "{{config('app.url')}}/action/aplicativo3/precadastro/animal/list/"+"{{$XX}}",
                delete: "{{config('app.url')}}/action/aplicativo3/precadastro/animal/delete/",
                edit: "{{config('app.url')}}/action/aplicativo3/precadastro/animal/editar/",
                add: "{{config('app.url')}}/action/aplicativo3/precadastro/animal/novo"
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


    @if(Auth::user()->can('PRECADASTRO3-REMEDIO-A') || Auth::user()->can('PRECADASTRO3-REMEDIO-E'))
        $('#form-animal').parsley().on('form:success', function () {
            Nitsys.saveForm('form-animal', simpleCRUDObj);
        });
        $('.form-modal').on('hidden.bs.modal', function (e) {
            Nitsys.clearForm('form-animal');
            $('#form-animal').parsley().reset();
            $(".parsley-errors-list").remove();
        });
    @endif

    function teste() {
        console.log('111');
        $('#form-animal').parsley().on('form:success', function () {
            console.log('222');
        });
    }

</script>
