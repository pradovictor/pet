<div class="panel-body">
    <div id="form-container" class="d-none">
        <div class="content-box w-80">
            @if(Auth::user()->can('CLIENTE3-FORMULARIO-A') || (Auth::user()->can('CLIENTE3-FORMULARIO-E')))
            <h3 class="content-box-header bg-primary">
                Dados da Anamnese
                <div class="header-buttons-separator">
                    <a href="javascript:Nitsys.hideInPageForm()" class="icon-separator">
                        <i class="glyph-icon icon-times"></i>
                    </a>
                </div>
            </h3>
            <hr class="">
            <form id="form-clientepfformulario" class="form-horizontal" action="{{config('app.url')}}/action/aplicativo3/paciente/formulario/save/{{$cliente->id}}"
                method="POST" onsubmit="return false;" data-parsley-validate="">
                <input type="hidden" id="id" name="id" value="">
                <div class="row">
                     <div class="form-group col-md-7">
                        <label for="peso">Nome</label>
                        <input type="text" id="nome" name="nome" class="valor form-control" style="display:inline-block" placeholder="Digite o nome"/>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-md-12">
                        <label title="descricao">Descrição</label>
                        {{-- <textarea class="ckeditor form-control textarea-lg" id="historico" name="historico">{{$cliente->historico}}</textarea> --}}
                        <textarea class="form-control textarea-lg" id="descricao" name="descricao"></textarea>
                    </div>
                </div>

                <div class="col-xs-12">
                    <div class="d-block text-right">
                        <button id="saveform-clientepfformulario" type="button" class="btn btn-primary my-2 mx-2 save">SALVAR</button>
                    </div>
                </div>
            </form>
            @endif
        </div>
    </div>

    <div id="view-container" class="d-none"></div>
    <div class="simplecrud-panel">
        <div id="table-content"></div>
    </div>
    
    <div class=" simplecrud-panel">
        <div id="clientepfformulario">
        </div>
    </div>

</div>

<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/sorting/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/ckeditor/ckeditor.js')}}"></script>
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
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/sorting/datetime-moment.js')}}"></script> {{-- ordena data --}}
<script type="text/javascript" src="{{asset('theme-assets/widgets/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/autocomplete/autocomplete.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/autocomplete/menu.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datepicker/datepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/parsley.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/pt-br.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/nitsys.js')}}"></script>
{{-- touchspin --}}
{{-- <script type="text/javascript" src="{{asset('theme-assets/widgets/touchspin/touchspin.js')}}"></script> --}}
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
                    view: false,
                    order: 3,
                    priority: 4,
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
            container: "clientepfformulario",
            formEntity: "form-clientepfformulario",
            editType: "inPage",
            addType: @if(Auth::user()->can('CLIENTE3-FORMULARIO-A')) "inPage" @else "none" @endif,
            // addType: "inPage",
            addButtonText: "Adicionar",
            urls: {
                list: "{{config('app.url')}}/action/aplicativo3/paciente/formulario/{{$cliente->id}}/list",
                delete: "{{config('app.url')}}/action/aplicativo3/paciente/formulario/delete/",
                edit: "{{config('app.url')}}/action/aplicativo3/paciente/formulario/getbyid/",
            }
        }
    });

    $(document).off("click", ".save"); //removing click action from save form button
    $(document).off("click", ".delete"); //removing click action from delete form button
    $("#form-clientepfformulario").parsley().destroy(); //removing form parsley instance

    parsleyInstance = $("#form-clientepfformulario").parsley();

    parsleyInstance.on('form:success', function () {
        Nitsys.saveForm('form-clientepfformulario', simpleCRUDObj);
    });
   
    // CKEDITOR.timestamp = Math.random().toString(36).substring(7);
    // // atualizacao  do editor quando muda de views [pesquisadores / anexos] 
    // CKEDITOR.replace( 'historico', { customConfig : "{{asset('theme-assets/widgets/ckeditor/nitconfig.js')}}"});
    // // atualiza texto do editor para textarea
    // $('#form-clientepfhistorico').parsley().on('form:success', function () {
    //     $('textarea.ckeditor').each(function () {
    //         var $textarea = $(this);
    //         $textarea.val(CKEDITOR.instances[$textarea.attr('name')].getData());
    //     });
    //     Nitsys.saveForm('form-clientepfhistorico');
    // });

    // $('#data').bsdatepicker({
    //     format: 'dd/mm/yyyy'
    // });
    // $('#data').mask('00/00/0000', {
    //     reverse: true
    // });  
    // $('#peso').mask('000.0', {reverse: true});
    // $('#altura').mask('000.0', {reverse: true});
    // $('#temperatura').mask('000.0', {reverse: true});
    // $('#fc').mask('000', {reverse: true});

    // $('#peso').change(function () {
    //     peso = document.getElementById('peso').value;
    //     altura = document.getElementById('altura').value;
    //     if (altura) {
    //         imc = peso / ((altura*altura)/10000);
    //         imc = parseFloat(imc).toFixed(2);
    //         $('#imc').val(imc);
    //     }
    // });

    // $('#altura').change(function () {
    //     peso = document.getElementById('peso').value;
    //     altura = document.getElementById('altura').value;
    //     if (altura) {
    //         imc = peso / ((altura*altura)/10000);
    //         imc = parseFloat(imc).toFixed(2);
    //         $('#imc').val(imc);
    //     }
    // });

        
</script>