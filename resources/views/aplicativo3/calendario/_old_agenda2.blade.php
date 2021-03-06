{{-- CALENDARIO --}}
<div class="panel-body">
<div class="tl-label bs-label label-default">Legenda :</div>
<div class="tl-label bs-label label-success">Cliente Aguardando na sala</div>
<div class="tl-label bs-label label-warning">Cliente Agendado</div>
<div class="tl-label bs-label label-danger">Não compareceu</div>
<div class="tl-label bs-label label-info">Sem vinculo com Cliente</div>
<br>
<br>
<div class="form-group row">
    <div class="col-md-1"></div>
    <div class="col-md-10">
        <div  id="calendar-example-1">
    </div>        
    <div class="col-md-1"></div>
    <br>
    <br>
</div>


{{-- BANCO DE DADOS - AGENDA --}}
{{-- <div class="form-group col">
    <div class="panel simplecrud-panel">
        <div class="panel-body" id="agenda"></div>
    </div>
</div> --}}

</div>

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
<script type="text/javascript" src="{{asset('theme-assets/widgets/calendar/calendar.js')}}"></script>
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
<link rel="stylesheet" type="text/css" href="{{asset('theme-assets/widgets/calendar/calendar.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('theme-assets/widgets/timepicker/timepicker.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('theme-assets/widgets/daterangepicker/daterangepicker.css')}}" />

<script type="text/javascript">
   
    // @if(Auth::user()->can('AGENDA3-A') || Auth::user()->can('AGENDA3-E'))
    //     $('#form-agenda').parsley().on('form:success', function () {
    //         // console.log('---------------aaaaaaaa');
    //         Nitsys.saveForm('form-agenda', simpleCRUDObj);
    //     });
    //     $('.form-modal').on('hidden.bs.modal', function (e) {
    //         Nitsys.clearForm('form-agenda');
    //         $('#form-agenda').parsley().reset();
    //         $(".parsley-errors-list").remove();
    //     });
    // @endif

    // aumenta tamanho de texto no calendario 
    $("#calendar-example-1").css("font-size", "1.25em");

    $('#calendar-example-1').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: '2014-01-12',
            editable: true,
            events: [{
                title: 'All Day Event',
                start: '2014-01-02'
            }, {
                title: 'Longo evento xxx',
                start: '2014-01-07',
                end: '2014-01-11'
            }, 
            {
                id: 999,
                title: 'Repeating Event',
                start: '2014-01-09T16:00:00'
            },
            {
                id: 999,
                title: 'Repeating Event',
                start: '2014-01-16T16:00:00'
            },
            {
                title: 'Meeting',
                start: '2014-01-12T10:30:00',
                end: '2014-01-12T12:30:00'
            },
            {
                title: 'Lunch',
                start: '2014-01-12T12:00:00'
            },
            {
                title: 'Birthday Party',
                start: '2014-01-13T07:00:00'
            },
            {
                title: 'Click for Googleeeeee',
                url: 'http://google.com/',
                start: '2014-01-28'
            }
            ]
    });




    // preenchendo calendario a partir de 1 ano anterior
    @php($intervalo = $parametro->intervalo)
    @php($horamin = $parametro->horamin)
    @php($horamax = $parametro->horamax)
    @php($zdata = date('Y-m-d'))
    @php($xdata = date('Y-m-d', strtotime("-1 year", strtotime($zdata))))
    @php($registros = DB::table('a3agenda')->select('*')->where('data_inicio', '>', $xdata)->get())
    // @php($registros = DB::table('a3agenda')->select('*')->where('a3profissional_id', '=', 1)
    
    $('#calendar-example-11').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay'
            },
            defaultDate: Date(),
            axisFormat: 'HH:mm',
            // timeFormat: {
            //     agenda: 'H:mm{ - h:mm}'
            // },
            timeFormat: {
                agenda: 'HH:mm'
            },
            slotDuration: '<?php echo $intervalo; ?>',
            minTime: '<?php echo $horamin; ?>',
            maxTime: '<?php echo $horamax; ?>',
            editable: false,
            events: [
                <?php
                    foreach($registros as $registro){
                        // $url = '/aplicativo3/paciente/selecao/5';
                        $nomes = DB::table('a3clientepf')->select('*')->where('id', '=', $registro->a3clientepf_id)->get();
                        foreach($nomes as $nome){ $xx = $nome->nome;}
                        $url = '/aplicativo3/paciente/selecao/'.$registro->a3clientepf_id;
                        if (!empty($registro->hora_inicio)&&(!empty($registro->a3clientepf_id))){
                            ?>
                            {
                            title: '<?php echo $xx; ?>',
                            start: '<?php echo $registro->data_inicio; ?> <?php echo $registro->hora_inicio; ?>',
                            end:   '<?php echo $registro->data_fim; ?> <?php echo $registro->hora_fim; ?>',
                            color: '<?php echo $registro->cor; ?>',
                            url: '<?php echo $url; ?>',
                            },<?php
                        }     

                        if (!empty($registro->hora_inicio)&&(empty($registro->a3clientepf_id))){
                            ?>
                            {
                            title: '<?php echo $registro->titulo; ?>',
                            start: '<?php echo $registro->data_inicio; ?> <?php echo $registro->hora_inicio; ?>',
                            end:   '<?php echo $registro->data_fim; ?> <?php echo $registro->hora_fim; ?>',
                            color: '<?php echo $registro->cor; ?>',
                            },<?php
                        } 
                        // para mais de 1 dia , ferias por exemplo, all-day
                        if (empty($registro->hora_inicio)){
                            ?>
                            {
                            title: '<?php echo $registro->titulo;?>',
                            start: '<?php echo $registro->data_inicio;?>',
                            end:   '<?php echo $registro->data_fim;?>',
                            color: '#2196F3',
                            },<?php
                        }                                         
                    }              
                ?>
            ]
    });
    
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