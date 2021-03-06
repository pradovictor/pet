@extends('base.master')

@section('content')
<div class="panel simplecrud-panel">
    <div class="panel-body" id="table-content">
    </div>
</div>
@endsection


@section('javascript')
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
            columns: [{
                    id: "email",
                    title: "E-mail",
                    visible: true,
                    order: 1,
                    priority: 1
                },
                {
                    id: "nome",
                    title: "Nome",
                    visible: true,
                    order: 3,
                    priority: 4
                },
                {
                    id: "action",
                    edit: true,
                    delete: true,
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
            actionDescription: "email",
            container: "table-content",
            formEntity: "form-usuarios",
            editType: "redirect",
            addType: @if(Auth::user()->can('USUARIO-A')) "redirect" @else "none" @endif,
            addButtonText: "Adicionar usuario",
            urls: {
                list: "{{config('app.url')}}/action/aplicativo3/configuracao/usuarios/list",
                delete: "{{config('app.url')}}/action/aplicativo3/configuracao/usuarios/",
                edit: "{{config('app.url')}}/aplicativo3/configuracao/usuarios/edit/",
                add: "{{config('app.url')}}/aplicativo3/configuracao/usuarios/novo/"
            }
        }
    });

</script>
@endsection