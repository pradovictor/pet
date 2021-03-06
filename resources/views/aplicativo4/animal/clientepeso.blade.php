<div class="panel-body">
    <div id="form-container" class="d-none">
        <div class="content-box w-80">
            @if(Auth::user()->can('ANIMAL-A') || (Auth::user()->can('ANIMAL-E')))
            <h3 class="content-box-header bg-primary">
                Peso
                <div class="header-buttons-separator">
                    <a href="javascript:Nitsys.hideInPageForm()" class="icon-separator">
                        <i class="glyph-icon icon-times"></i>
                    </a>
                </div>
            </h3>
            <hr class="">
            <form id="form-clientepeso" class="form-horizontal" action="{{config('app.url')}}/action/aplicativo4/animal/peso/save/{{$cliente->id}}"
                method="POST" onsubmit="return false;" data-parsley-validate="">
                <input type="hidden" id="id" name="id" value="">
                <div class="row">
                    <div class="form-group col-md-3">
                        <label for="data">Data</label>
                        <div class="input-prepend input-group">
                            <span class="add-on input-group-addon">
                                <i class="glyph-icon icon-calendar"></i>
                            </span>
                            <input id="data" name="data" type="text" class="bootstrap-datepicker form-control"
                                placeholder="dd/mm/aaa" value="" data-date-format="dd/mm/yyyy" data-parsley-required>
                        </div>
                    </div> 
                     <div class="form-group col-md-3">
                        <label for="peso">Peso (kg)</label>
                        <input type="text" id="peso" name="peso" class="valor form-control" style="display:inline-block" placeholder="Digite o peso" data-parsley-required/>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="d-block text-right">
                        <button id="saveform-clientepeso" type="button" class="btn btn-primary my-2 mx-2 save">SALVAR</button>
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
        <div id="clientepeso">
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
                    id: "data",
                    title: "Data",
                    visible: true,
                    order: 1,
                    priority: 1
                },
                {
                    id: "peso",
                    title: "Peso (kg)",
                    visible: true,
                    order: 3,
                    priority: 4
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
            actionDescription: "data",
            container: "clientepeso",
            formEntity: "form-clientepeso",
            editType: "inPage",
            addType: @if(Auth::user()->can('ANIMAL-A')) "inPage" @else "none" @endif,
            // addType: "inPage",
            addButtonText: "Adicionar",
            urls: {
                list: "{{config('app.url')}}/action/aplicativo4/animal/peso/{{$cliente->id}}/list",
                delete: "{{config('app.url')}}/action/aplicativo4/animal/peso/delete/",
                edit: "{{config('app.url')}}/action/aplicativo4/animal/peso/getbyid/",
            }
        }
    });

    $(document).off("click", ".save"); //removing click action from save form button
    $(document).off("click", ".delete"); //removing click action from delete form button
    $("#form-clientepeso").parsley().destroy(); //removing form parsley instance

    parsleyInstance = $("#form-clientepeso").parsley();

    parsleyInstance.on('form:success', function () {
        Nitsys.saveForm('form-clientepeso', simpleCRUDObj);
    });
   
    $('#data').bsdatepicker({
        format: 'dd/mm/yyyy'
    });
    $('#data').mask('00/00/0000', {
        reverse: true
    });  

    $('#peso').mask('000.0', {reverse: true});
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