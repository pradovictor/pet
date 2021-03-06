@extends('base.master')

@section('css')
<style media="print">
    #page-content {
        width: 100%;
        margin-left: 0px;
    }
    #page-header, #page-title, #botaoimp {
        display: none;
    }
    li {
        font-size: 13px; 
    }
</style>
@endsection

@section('content')

<div id="clientepfviewext" class="content-box w-80">
    {{-- INICIO --}}
    <ul class="reset-ul">
        <div class="content-box-header btn-info">
            <h5>Informação pessoal</h5>
        </div>
        <div class="form-group col-lg-12">
            <li><b>Nome: </b>{{$clientepf->nome}}</li>
            <li><b>CPF: </b>{{$clientepf->cpf}}</li>
            <li><b>RG: </b>{{$clientepf->rg}}</li>      
            <li><b>Endereço: </b>{{$clientepf->endereco}}</li> 
            <li><b>Cidade: </b>{{$clientepf->cidade}}</li>  
            <li><b>Bairro: </b>{{$clientepf->bairro}}</li>  
            <li><b>Estado: </b>{{$clientepf->estado}}</li>  
            <li><b>Cep: </b>{{$clientepf->cep}}</li>  
            <li><b>Telefone: </b>{{$clientepf->telefone}}</li>  
        </div>
        <div class="content-box-header btn-purple">
            <h5>Primeira Consulta</h5>
        </div>
        @php($aa = DB::table('a3clientepf_formulario')->select('*')->where('a3clientepf_id', '=',$clientepf->id)->orderBy('nome','asc')->get())   
        @foreach($aa as $registro)
            <div class="col-md-11 my-2">
                <div class="tl-label bs-label label-warning ">{{$registro->nome}}</div>
            </div>
            @php($linha=substr_count($registro->descricao,"\n"))
            <textarea class="form-control " rows={{$linha+1}} disabled id="descricao" name="descricao">{!!$registro->descricao!!}</textarea>
            {{-- <textarea  cols="160" rows={{$linha+1}} readonly id="historico" name="historico">{!!$registro->descricao!!}</textarea> --}}
            <br>
        @endforeach 

        @php($aa = DB::table('a3clientepf_historico')->select('*')->where('a3clientepf_id', '=',$clientepf->id)->orderBy('data','asc')->get())   
        <div class="content-box-header btn-success">
            <h5>Evolução - consulta</h5>
        </div>
        <br>
        @foreach($aa as $registro)
            @php($xdata = date_format(date_create($registro->data),'d/m/Y'))
            <div class="col-md-2 my-2">
                <div class="tl-label bs-label label-warning ">Data: {{$xdata}}</div>
                {{-- <li><b>Data: </b>{{$xdata}}</li> --}}
            </div>
            <div class="col-md-2">    
                <li><b>Peso (kg): </b>{{$registro->peso}}</li>
            </div>    
            <div class="col-md-2">    
                <li><b>Altura (cm): </b>{{$registro->altura}}</li>
            </div>    
            <div class="col-md-2">    
                <li><b>PA : </b>{{$registro->pa}}</li>
            </div>    
            <div class="col-md-2">    
                <li><b>Fc : </b>{{$registro->fc}}</li>
            </div>    
            <div class="col-md-2">    
                <li><b>Temperatura : </b>{{$registro->temperatura}}</li>
            </div>    
            
            @php($linha=substr_count($registro->historico,"\n"))
            <textarea class="form-control " rows={{$linha+1}} disabled id="historico" name="historico">{!!$registro->historico!!}</textarea>
            {{-- <textarea  cols="160" rows={{$linha+1}} readonly id="historico" name="historico">{!!$registro->historico!!}</textarea> --}}
            <br>
        @endforeach 

    </ul>     
    {{-- FIM --}}
    <div class="d-block text-center btn">
            <button id="botaoimp" onclick="impressao()">Impressão</button>
    </div>
</div>

<script>
    function impressao() {
        window.print();
    }
</script>

@endsection