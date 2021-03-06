@extends('base.master')

@section('content')
<div id="master-panel" class="panel">
    <div class="panel-body">
        <div class="row mb-5">
            <div class="form-group col-md-5">
                <label for="clientepf">Selecione o Medico</label>
                <select class="form-control" id="selecao1" name="selecao1">
                    <option value="">Escolher..</option>
                    @foreach($profissionais as $profissional)
                        <option value="{{$profissional->id}}">{{$profissional->nome}}</option>
                    @endforeach 
                </select>
            </div>
        </div>
        <div class="row tecnologiaButton">
                    <div id="botao1" class="mx-1">
                        <div data-url="{{config('app.url')}}/aplicativo3/calendario/agenda2/{{$profissional->id}}" title="Agenda"
                            class="btn btn-md btn-info">
                            <span class="glyph-icon icon-separator">
                                <i class="glyph-icon icon-linecons-note"></i>
                            </span>
                            <span class="button-content">
                                Ve Agenda
                            </span>
                        </div>
                    </div>
         </div>

        <div id="selecao-content"></div>
        
    </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
    // esta funcao é para o primeiro clque inicil - info)
    $('.btn').click(function (e) {
        $('#selecao-content').load($(this).attr('data-url'), function (result) {
            body_sizer();
        });
    });
</script>
@endsection