@extends('base.master')

@section('content')
<div id="master-panel" class="panel">
    <div class="panel-body">
        <div class="row">
            <div class="form-group col-md-3">
                <label for="peso">Nome do Pet</label>
                <input type="text" id="vnome" name="vnome" class="valor form-control" style="display:inline-block" placeholder="Digite o nome" data-parsley-required/>
            </div>
            @php($zz='')
            {{-- <div class="row tecnologiaButton">
                <div id="botao1" class="mx-4 my-4">
                    <div data-url="{{config('app.url')}}/xxxxxaplicativo4/animal/cliente/{{$zz}}" title="Busca nome do cliente (digite * para todos os proprietários)"
                        class="btn btn-md btn-success">
                        <span class="glyph-icon icon-separator">
                            <i class="glyph-icon icon-linecons-search"></i>
                        </span>
                        <span class="button-content">
                            Busca Cliente
                        </span>
                    </div>
                </div>
            </div> --}}
            <div class="form-group col-md-3">
                <span class="glyph-icon icon-separator">
                    <i class="glyph-icon icon-linecons-search"></i>
                    <button type="button" class="btn btn-success my-4" onclick="buscacliente();">Busca Pet</button>   
                </span>
            </div>
            <div class="form-group col-md-3">
                <button type="button" class="btn btn-info my-4 mx-5" onclick="novocliente();">Adiciona Cliente</button>   
            </div>    
        </div>

        <div id="clienteselecao-content"></div>
        
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    // $('.btn').click(function (e) {
    //     zz = $('#vnome').val();
    //     // $('#animalselecao-content').load($(this).attr('data-url'), function (result) {
    //     //     body_sizer();
    //     // });
    //     console.log(e);
    //     $( "#clienteselecao-content" ).load( "{{config('app.url')}}/aplicativo4/animal/cliente/"+ zz, function() {
    //         console.log(zz);
    //         body_sizer(); 
    //     });
    // });

    function novocliente(){
        $( "#clienteselecao-content" ).load( "{{config('app.url')}}/aplicativo4/animal/novocliente", function() {
            body_sizer(); 
        });
    }

    function buscacliente(){
        zz = $('#vnome').val();
        $( "#clienteselecao-content" ).load( "{{config('app.url')}}/aplicativo4/animal/cliente/"+ zz, function() {
            console.log(zz);
            body_sizer(); 
        });
    }
    
    // function botao2(id) {
    //     $.ajax({
    //         url: "{{config('app.url')}}/aplicativo3/precadastro/animal/BIANCA" ,
    //         method: 'GET',
    //         success: function (data) {
    //                 // console.log(data);
    //                 // $('#idform').val(data['id']);
    //                 // $('#xxx').val(data['nome']);
    //                 // $('#yyy').val(data['descricao']);
    //             },
    //             error: function (data) {
    //                 console.log('error', data);
    //             }
    //     });
    //     // $('#modalteste').modal('show');
    //     body_sizer();

    // }     

</script>
@endsection