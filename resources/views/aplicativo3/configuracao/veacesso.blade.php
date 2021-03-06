@extends('base.master')

@section('content')


<div id="view-container" class="d-none"></div>

<div class="panel simplecrud-panel">
    <div class="panel-body" id="veacesso"></div>
</div>


@endsection

@section('javascript')
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/sorting/moment.min.js')}}"></script>
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
<script type="text/javascript" src="{{asset('theme-assets/widgets/datatables-1.10.18/sorting/datetime-moment.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/parsley.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/pt-br.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datepicker/datepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('js/nitsys.js')}}"></script>
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
                    id: "usuario",
                    title: "Login-usuario",
                    visible: true,
                    order: 2,
                    priority: 3
                },
                {
                    id: "nome",
                    title: "Nome",
                    visible: true,
                    order: 3,
                    priority: 4
                },
                {
                    id: "hora",
                    title: "Hora",
                    visible: true,
                    order: 4,
                    priority: 5
                },
                {
                    id: "tipo",
                    title: "Tipo",
                    visible: true,
                    order: 5,
                    priority: 6
                },
                // {
                //     id: "action",
                //     edit: false,
                //     delete: false,
                //     view: true,
                //     show: true
                // }
            ],
            buttons: {
                showColumns: true,
                copy: true,
                excel: true,
                csv: true,
                pdf: true,
                print: true
            },
            actionDescription: "",
            container: "veacesso",
            formEntity: "form-veacesso",
            editType: "modal",
            addType: "none",
            addButtonText: "",
            externalFilter: {
                dataReferencia: 'datareferencia'
            },
            filterFooter: true,
            urls: {
                list: "{{config('app.url')}}/action/aplicativo3/configuracao/veacesso",
            }
        }
    });

</script>
@endsection