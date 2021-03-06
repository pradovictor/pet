@extends('base.master')

@section('content')

<div class="content-box-header bg-primary">
    <h4>NOVO CLIENTE</h4>
</div>
<form id="form-novocliente" method="POST" action="{{config('app.url')}}/action/aplicativo4/animal/cliente" onsubmit="return false;"
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
                <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>                
                {{-- <button id="saveform-novocliente" type="button" class="btn btn-primary">Salvar</button> --}}


    <button id="saveform-novocliente" type="button" class="btn btn-primary ml-2" onclick="$('#form-novocliente').parsley().validate();">Salvar</button>
</form>    

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
    
    $('#form-novocliente').parsley().on('form:success', function () {
        alert('existe ja....');
        Nitsys.saveForm('form-novocliente');
    });

</script>
@endsection
