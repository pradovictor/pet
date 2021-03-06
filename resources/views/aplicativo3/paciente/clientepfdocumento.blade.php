<div class="panel-body">
    <div id="form-add-container" class="d-none form-container-file">
        <div class="content-box w-80">
            <h3 class="content-box-header bg-primary">
                Adicionar Anexo
                <div class="header-buttons-separator">
                    <a href="javascript:$('#form-add-container').addClass('d-none');" class="icon-separator">
                        <i class="glyph-icon icon-times"></i>
                    </a>
                </div>
            </h3>
            <hr class="">
            <form id="form-upload" class="form-horizontal" method="POST" action="{{config('app.url')}}/action/aplicativo3/paciente/documento/save/{{$cliente->id}}" data-parsley-validate>
                <input type="hidden" id="_token" name="_token" value="{{csrf_token()}}"/>
                <div class="row">
                    <div class="form-group col-md-6 mx-4">
                        <label for="xfile">Seleção do arquivo</label>
                        <input type="file" class="form-control" id="file" name="file" data-parsley-required> 
                    </div>
                    <div class="form-group col-md-5 mx-4">
                        <label for="nome">Nome do anexo</label>
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome do anexo"
                            value="" data-parsley-maxlength="128" data-parsley-required />
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="d-block text-right">
                        <button id="save-file" type="button" class="btn btn-primary my-2 mx-2">SALVAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div id="form-container" class="d-none">
        <div class="content-box w-80">
            <h3 class="content-box-header bg-primary">
                Dados do Anexo
                <div class="header-buttons-separator">
                    <a href="javascript:Nitsys.hideInPageForm()" class="icon-separator">
                        <i class="glyph-icon icon-times"></i>
                    </a>
                </div>
            </h3>
            <hr class="">
            <form id="form-documento" class="form-horizontal" action="{{config('app.url')}}/action/aplicativo3/paciente/documento/save/{{$cliente->id}}"
                method="POST" onsubmit="return false;" data-parsley-validate>
                <input type="hidden" id="id" name="id" value="">
                <div class="row">
                    <div class="form-group col-md-5 mx-4">
                        <label for="nome">Nome do anexo</label>
                        <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome do anexo"
                            value="" data-parsley-maxlength="128" data-parsley-required />
                    </div>
                    <div class="form-group col-md-5 ">
                        <label for="descricao">Descrição</label>
                        <input type="text" id="descricao" name="descricao" class="form-control" placeholder="Digite a descrição"
                            value="" data-parsley-maxlength="128" />
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-11 mx-4">
                        <label for="comentario">Comentarios</label>
                        <textarea id="comentario" name="comentario" placeholder="Digite anotações gerais" rows="3"
                            class="form-control textarea-md"></textarea>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="d-block text-right">
                        <button id="saveform-documento" type="button" class="btn btn-primary my-2 mx-2 save">SALVAR</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    
    <div id="view-container" class="d-none"></div>
    @if(Auth::user()->can('CLIENTE3-DOCUMENTO-A'))
        <button id="add-documento" type="button" class="btn btn-primary table-action my-2" onclick="$('#form-add-container').removeClass('d-none');">Adicionar anexo</button>
    @endif
    <div class=" simplecrud-panel">
        <div id="documento">
        </div>
    </div>
</div>

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
<script type="text/javascript" src="{{asset('theme-assets/widgets/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/autocomplete/autocomplete.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/autocomplete/menu.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datepicker/datepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/parsley.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/pt-br.js')}}"></script>
<script type="text/javascript" src="{{asset('js/nitsys.js')}}"></script>
{{-- touchspin --}}
<script type="text/javascript" src="{{asset('theme-assets/widgets/touchspin/touchspin.js')}}"></script>
<script type="text/javascript">
    var simpleCRUDObj = SimpleCRUD.load({
        dataTables: {
            columns: [
                {
                    id: "documento",
                    title: "Anexo",
                    visible: true,
                    order: 1,
                    priority: 1,
                    render: 'hyperlink'
                },
                {
                    id: "nome",
                    title: "Nome",
                    visible: true,
                    order: 2,
                    priority: 3
                },
                {
                    id: "extensao",
                    title: "Extensão",
                    visible: true,
                    order: 3,
                    priority: 4
                },
                {
                    id: "descricao",
                    title: "Descrição",
                    visible: true,
                    order: 4,
                    priority: 5
                },
                {
                    id: "data_cadastro",
                    title: "Data cadastro",
                    visible: true,
                    order: 5,
                    priority: 6
                },
                {
                    id: "comentario",
                    title: "Comentarios",
                    visible: true,
                    order: 6,
                    priority: 7
                },
                {
                    id: "action",
                    edit: true,
                    delete: true,
                    view: true,
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
            container: "documento",
            formEntity: "form-documento",
            editType: "inPage",
            addType: "none",
            addButtonText: "Adicionar",
            urls: {
                list: "{{config('app.url')}}/action/aplicativo3/paciente/documento/{{$cliente->id}}/list",
                delete: "{{config('app.url')}}/action/aplicativo3/paciente/documento/delete/",
                edit: "{{config('app.url')}}/action/aplicativo3/paciente/documento/edit/",
                view: "{{config('app.url')}}/action/aplicativo3/paciente/documento/visualizar/",
            }
        }
    });


    $(document).off("click", "#save-file"); //removing click action from save form button
    $(document).off("click", ".save"); //removing click action from save form button
    $(document).off("click", ".delete"); //removing click action from delete form button
    $("#form-documento").parsley().destroy(); //removing form parsley instance
  
    parsleyInstance = $("#form-documento").parsley();

    parsleyInstance.on('form:success', function () {
        Nitsys.saveForm('form-documento', simpleCRUDObj);
    });

    $('#form-upload').parsley().on('form:success', function() {
        Nitsys.saveFile('form-upload', simpleCRUDObj);
    });

    $('#save-file').click(function(e){
        $('#form-upload').parsley().validate();
    });

    $('#data_aprovacao').bsdatepicker({
        format: 'dd/mm/yyyy'
    });
    $('#data_aprovacao').mask('00/00/0000', {
        reverse: true
    });

</script>