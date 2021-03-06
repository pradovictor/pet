@extends('base.master')

@section('content')
@if(Auth::user()->can('AGENDA3-A') || Auth::user()->can('AGENDA3-E'))
<div id="form-modal-agenda" class="form-modal modal fade" role="dialog" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Agendamento</h4>
                <button class="close" type="button" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-agenda" method="POST" action="{{config('app.url')}}/action/aplicativo3/calendario/agenda" onsubmit="return false;"
                    data-parsley-validate="">
                    <input type="hidden" id="id" name="id" value="" />
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="clientepf">Cliente</label>
                                <select class="form-control" id="a3clientepf_id" name="a3clientepf_id">
                                    <option value="">Escolher..</option>
                                         @foreach($clientespf as $clientepf)
                                            <option value="{{$clientepf->id}}" @if(!empty($clientepf->a3clientepf_id) && $clientepf->a3clientepf_id  === $clientepf->id) selected @endif>{{$clientepf->nome}}</option>
                                        @endforeach 
                                </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="nome">Titulo</label>
                            <input type="text" id="titulo" name="titulo" class="form-control" placeholder="Digite o titulo"
                                data-parsley-maxlength="64" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3">
                            <label for="data">Data inicio</label>
                                <div class="input-prepend input-group">
                                <span class="add-on input-group-addon">
                                    <i class="glyph-icon icon-calendar"></i>
                                </span>
                                <input id="data_inicio" name="data_inicio" type="text" class="bootstrap-datepicker form-control"
                                    placeholder="dd/mm/aaa" value="" data-date-format="dd/mm/yyyy" data-parsley-required>
                                </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label for="data">Hora inicio</label>
                            <div class="bootstrap-timepicker dropdown">
                                <input class="timepicker-example form-control" id="hora_inicio" name="hora_inicio" type="text">
                            </div>
                        </div>    
                        <div class="form-group col-md-3 my-1">
                            <label for="botao1"></label>
                            <div class="input-prepend input-group">
                                <button id="botao1" name="botao1" type="button" class="btn btn-info ml-2" onclick="padrao();">Consulta Padrão</button>
                            </div>
                        </div>    
                    </div>
                    <div class="row">    
                        <div class="form-group col-md-3">
                            <label for="data">Data final</label>
                                <div class="input-prepend input-group">
                                <span class="add-on input-group-addon">
                                    <i class="glyph-icon icon-calendar"></i>
                                </span>
                                <input id="data_fim" name="data_fim" type="text" class="bootstrap-datepicker form-control"
                                    placeholder="dd/mm/aaa" value="" data-date-format="dd/mm/yyyy" >
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                                <label for="data">Hora final</label>
                                <div class="bootstrap-timepicker dropdown">
                                    <input class="timepicker-example form-control" id="hora_fim" name="hora_fim" type="text">
                                </div>
                        </div>          
                    </div>     
                    @if (!empty($clientepf))
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label title="cor" for="cor">Status</label>
                            <select class="form-control" id="cor" name="cor" data-parsley-required>
                                <option value="">Escolher..</option>
                                <option value="#ff9800" @if('#ff9800'==$clientepf->cor) selected @endif>Agendado</option>
                                <option value="#4CAF50" @if('#4CAF50'==$clientepf->cor) selected @endif>Aguardando na sala de espera</option>
                                <option value="#f44336" @if('#f44336'==$clientepf->cor) selected @endif>Não compareceu</option>
                            </select>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="a3profissional_id">Profissional</label>
                                <select class="form-control" id="a3profissional_id" name="a3profissional_id">
                                    <option value="">Escolher..</option>
                                         @foreach($profissionais as $profissional)
                                            <option value="{{$profissional->id}}" @if(!empty($profissional->a3profissional_id) && $profissional->a3profissional_id  === $profissional->id) selected @endif>{{$profissional->nome}}</option>
                                        @endforeach 
                                </select>
                        </div>
                    </div>
                    @else
                    <div class="row">
                        <div class="form-group col-md-5">
                            <label title="cor" for="cor">Status</label>
                            <select class="form-control" id="cor" name="cor" data-parsley-required>
                                <option value="">Escolher..</option>
                                <option value="#2196F3" selected >Sem vinculo</option>
                            </select>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                <button id="saveform-agenda" type="button" class="btn btn-primary">Salvar</button>

            </div>
        </div>
    </div>
</div>
@endif

{{-- CALENDARIO --}}
<div class="form-group row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div  id="calendar-example-1111">
    </div>        
    <div class="col-md-1"></div>

</div>

{{-- FILTRO - BANCO DE DADOS --}}
<div class="form-group col">
        <div class="form-group col-md-3">
            <input type="hidden" id="tipodata" name="tipodata">
            <label for="" class="control-label">Selecione o periodo</label>
            <div class="input-prepend input-group">
                <span class="add-on input-group-addon">
                        <i class="glyph-icon icon-calendar"></i>
                </span>
                <input type="text" id="periodo" name="periodo" class="form-control" placeholder="dd/mm/aaaa - dd/mm/aaaa" value="" data-date-format="dd/mm/yyyy">
            </div>
        </div>
        <div class="form-group col-md-8 my-4">
            <div class="text-left ">
                <button type="button" class="btn btn-info ml-2 mx-2" onclick="SubmitFilter();">Periodo</button>
                <button type="button" class="btn btn-warning " onclick="Filterhoje();">Agendados - Hoje</button>
                <button type="button" class="btn btn-yellow ml-2" onclick="CancelaFilter();">Todos</button>
            </div>
        </div>
</div>

{{-- BANCO DE DADOS - AGENDA --}}
<div class="form-group col">
    <div class="panel simplecrud-panel">
        <div class="panel-body" id="agenda"></div>
    </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/parsley.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/pt-br.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/interactions-ui/resizable.js')}}"></script>

<script type="text/javascript" src="{{asset('theme-assets/widgets/interactions-ui/draggable.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/interactions-ui/sortable.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/interactions-ui/selectable.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/daterangepicker/moment.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datepicker/datepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/daterangepicker/daterangepicker.js')}}"></script>


<script type="text/javascript" src="{{asset('theme-assets/widgets/timepicker/timepicker.js')}}"></script>
{{-- <script type="text/javascript" src="{{asset('theme-assets/widgets/calendar/calendar.js')}}"></script> --}}
{{-- datatables --}}
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/sorting/moment.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/JSZip-2.5.0/jszip.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/DataTables-1.10.18/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/DataTables-1.10.18/js/dataTables.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/Buttons-1.5.2/js/dataTables.buttons.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/Buttons-1.5.2/js/buttons.bootstrap4.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/sorting/datetime-moment.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/pdfmake-0.1.36/pdfmake.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/pdfmake-0.1.36/vfs_fonts.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/Buttons-1.5.2/js/buttons.html5.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/Buttons-1.5.2/js/buttons.print.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/Buttons-1.5.2/js/buttons.colVis.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/timepicker/timepicker.js')}}"></script>
{{-- biblioteca nitsys --}}
<script type="text/javascript" src="{{asset('js/nitsys.js')}}"></script>
{{-- links --}}
{{-- <link rel="stylesheet" type="text/css" href="{{asset('theme-assets/widgets/calendar/calendar.css')}}"> --}}
<link rel="stylesheet" type="text/css" href="{{asset('theme-assets/widgets/timepicker/timepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('theme-assets/widgets/daterangepicker/daterangepicker.css')}}" />

<script type="text/javascript">
    var simpleCRUDObj = SimpleCRUD.load({
        dataTables: {
            columns: [
                // {
                //     id: "titulo",
                //     title: "titulo",
                //     visible: true,
                //     order: 1,
                //     priority: 1
                // },
                // {
                //     id: "a3clientepf_id",
                //     title: "id_Cliente",
                //     visible: true,
                //     order: 2,
                //     priority: 3
                // },
                {
                    id: "data_inicio",
                    title: "Data inicio",
                    visible: true,
                    order: 1,
                    priority: 1
                },
                {
                    id: "data_fim",
                    title: "Data final",
                    visible: false,
                    order: 2,
                    priority: 3
                },
                {
                    id: "horario",
                    title: "Horario",
                    visible: true,
                    order: 3,
                    priority: 4
                },
                // {
                //     id: "hora_fim",
                //     title: "Horario final",
                //     visible: true,
                //     order: 4,
                //     priority: 5
                // },
                {
                    id: "cliente",
                    title: "Cliente / Titulo",
                    visible: true,
                    order: 5,
                    priority: 6
                },                
                {
                    id: "cor",
                    title: "Status",
                    visible: true,
                    order: 6,
                    priority: 7
                },      
                {
                    id: "profissional",
                    title: "Profissional",
                    visible: true,
                    order: 7,
                    priority: 8
                },      
                {
                    id: "action",
                    edit: true,
                    delete: true,
                    show: true,
                    order: 7,
                    priority: 8
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
            actionDescription: "cliente",
            container: "agenda",
            formEntity: "form-agenda",
            editType: "modal",
            // addType: @if(Auth::user()->can('PRECADASTRO2-CATEGORIA-A')) "modal" @else "none" @endif,
            addType: "modal",
            addButtonText: "Adicionar Agendamento",
            externalFilter: {
                // datainicio: 'datainicio',
                // datafinal: 'datafinal',
                periodo: 'periodo',
            },
            filterFooter: true,
            urls: {
                list: "{{config('app.url')}}/action/aplicativo3/calendario/agenda/list",
                delete: "{{config('app.url')}}/action/aplicativo3/calendario/agenda/delete/",
                edit: "{{config('app.url')}}/action/aplicativo3/calendario/agenda/editar/",
                add: "{{config('app.url')}}/action/aplicativo3/calendario/agenda/novo"
            }
        }
    });
    
    @if(Auth::user()->can('AGENDA3-A') || Auth::user()->can('AGENDA3-E'))
        $('#form-agenda').parsley().on('form:success', function () {
            // console.log('---------------aaaaaaaa');
            Nitsys.saveForm('form-agenda', simpleCRUDObj);
        });
        $('.form-modal').on('hidden.bs.modal', function (e) {
            Nitsys.clearForm('form-agenda');
            $('#form-agenda').parsley().reset();
            $(".parsley-errors-list").remove();
        });
    @endif  

    $('#data_inicio').bsdatepicker({
        format: 'dd/mm/yyyy'
    });
    $('#data_inicio').mask('00/00/0000', {
        reverse: true
    });

    $('#data_fim').bsdatepicker({
        format: 'dd/mm/yyyy'
    });
    $('#data_fim').mask('00/00/0000', {
        reverse: true
    });

    // limpando valores um ou outro - cliente / titulo
    $('#a3clientepf_id').change(function () {
        $('#titulo').val($('option:selected', $('#titulo')).attr('data-entidade-type'));
    });
    $('#titulo').change(function () {
        $('#a3clientepf_id').val($('option:selected', $('#a3clientepf_id')).attr('data-entidade-type'));
    });

    // $('#data_inicio').change(function () {
    //     // var textoDigitado = $(this).val();
    //     // $('#data_fim').val($('#data_inicio').attr('id'));
    //     // $('#data_fim').val(textoDigitado);
    //     var valor = document.getElementById('data_inicio').value;
    //     $('#data_fim').val(valor);
    // });
    
    function padrao(){
        var data = document.getElementById('data_inicio').value;
        $('#data_fim').val(data);
        
        horaInicio=document.getElementById('hora_inicio').value;
        horaSomada='00:15';
        // var hora = document.getElementById('hora_inicio').value;
        horaIni = horaInicio.split(':'); 
	    horaSom = horaSomada.split(':'); 
	    horasTotal = parseInt(horaIni[0], 10) + parseInt(horaSom[0], 10); 
	    minutosTotal = parseInt(horaIni[1], 10) + parseInt(horaSom[1], 10); 

	    if(minutosTotal >= 60){ 
		    minutosTotal -= 60; horasTotal += 1; 
	    } 
        horaFinal = horasTotal + ":" + minutosTotal; 
        // preenche hora final
        if (horaInicio) { $('#hora_fim').val(horaFinal);}
        // status - agendado (orange)
        $('#cor').val('#ff9800');
    }


    // parametrizacao - timepicker
    // $(function() {
    //     $('#xyz').timepicker({ 
    //     'timeFormat': 'H:i',
    //     defaultTime: 'current',
    //     minuteStep: 1,
    //     disableFocus: true,
    //     template: 'dropdown'});
    //     });    

    // timepicker : hora_inicio
    $('#hora_inicio').timepicker({
        showMeridian: false,
        use24hours: true,
        format: 'HH:mm'
    });
    $('#hora_inicio').mask('00:00', {
        reverse: true
    });
    
    // timepicker : hora_fim  
    $('#hora_fim').timepicker({
        showMeridian: false,
        use24hours: true,
        format: 'HH:mm'
    });
    $('#hora_fim').mask('00:00', {
        reverse: true
    });

    // filtro / cancela - banco de dados agenda
    // $('#datainicio').bsdatepicker({
    //     format: 'dd/mm/yyyy'
    // });

    // $('#datafinal').bsdatepicker({
    //     format: 'dd/mm/yyyy'
    // });

    $('#periodo').daterangepicker({
        opens: 'right',
        format: 'DD/MM/YYYY',
        locale: {
            applyLabel: 'Aplicar',
            cancelLabel: 'Cancela',
            fromLabel: 'Inicio',
            toLabel: 'Final',
        }
    });

    function SubmitFilter() {
        simpleCRUDObj.dataTablesObj.ajax.reload();
    }

    function CancelaFilter() {
        $('#periodo').val('');
        simpleCRUDObj.dataTablesObj.ajax.reload();
    }   

    function Filterhoje() {
        data = new Date();
        // inteiro
        dia     = data.getDate();
        mes     = data.getMonth() + 1;
        ano    = data.getFullYear();
        if (dia.toString().length === 1){dia = '0' + dia};
        if (mes.toString().length === 1){mes = '0' + mes};
        str_data = dia + '/' + mes + '/' + ano;
        str_periodo = str_data +' - ' + str_data;
        // console.log(str_periodo);
        $('#periodo').val(str_periodo);
        simpleCRUDObj.dataTablesObj.ajax.reload();
    }   

</script>
@endsection