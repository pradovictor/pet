<form id="form-clienteedit" method="POST" action="{{config('app.url')}}/action/aplicativo4/animal/cliente/save" onsubmit="return false;"
    data-parsley-validate="">
    <input type="hidden" id="id" name="id" value="{{$cliente->id}}" />
    <br>
    <div class="content-box-header bg-primary">
        <h5>Informações gerais</h5>
    </div>
    <div class="row">
        <div class="form-group col-lg-5">
            <label for="titulo">Nome do Pet</label>
            <input type="text" id="nome" name="nome" class="form-control" placeholder="Digite o nome"
                data-parsley-maxlength="256" value="{{$cliente->nome}}" />
        </div>
        <div class="form-group col-md-7 ">
            <label for="prop">Proprietario</label>
            <select class="form-control" id="a4proprietario_id" name="a4proprietario_id">
                <option value="">Escolher..</option>                         
                @foreach($proprietarios as $proprietario)
                    <option value="{{$proprietario->id}}" @if($cliente->a4proprietario_id === $proprietario->id) selected @endif>{{$proprietario->nome}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">    
        <div class="form-group col-md-3 ">
            <label for="prop">Especie</label>
            <select class="form-control" id="a4especie_id" name="a4especie_id">
                <option value="">Escolher..</option>                         
                @foreach($especies as $especie)
                    <option value="{{$especie->id}}" @if($cliente->a4especie_id === $especie->id) selected @endif>{{$especie->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3 ">
            <label for="raca">Raça<a href=""></a></label>
            <select class="form-control" id="a4raca_id" name="a4raca_id">
                <option value="">Escolher..</option>                         
                @foreach($racas as $raca)
                    <option value="{{$raca->id}}" @if($cliente->a4raca_id === $raca->id) selected @endif>{{$raca->nome}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group col-md-3 ">
            <label for="raca">Pelagem<a href=""></a></label>
            <select class="form-control" id="a4pelagem_id" name="a4pelagem_id">
                <option value="">Escolher..</option>                         
                @foreach($pelagens as $pelagem)
                    <option value="{{$pelagem->id}}" @if($cliente->a4pelagem_id === $pelagem->id) selected @endif>{{$pelagem->nome}}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">     
        <div class="form-group col-md-2">
            <label title="pedigree" for="pedigree">Pedigree</label>
            <select class="form-control" id="pedigree" name="pedigree" value="{{$cliente->pedigree}}" data-parsley-required>
                <option value="">Escolher..</option>
                <option value="sim" @if('sim'===$cliente->pedigree) selected @endif>Sim</option>
                <option value="nao" @if('nao'===$cliente->pedigree) selected @endif>Não</option>
            </select>
        </div>
        <div class="form-group col-lg-3">
            <label for="titulo">Numero Pedigree</label>
            <input type="text" id="pedigree_numero" name="pedigree_numero" class="form-control" placeholder="Digite o numero pedigree"
                data-parsley-maxlength="32" value="{{$cliente->pedigree_numero}}" />
        </div>
        <div class="form-group col-lg-2">
        </div>
        <div class="form-group col-md-2">
            <label for="data">Data Nascimento</label>
            <div class="input-prepend input-group">
                <span class="add-on input-group-addon">
                <i class="glyph-icon icon-calendar"></i>
                </span>
                <input id="data_nascimento" value="{{$cliente->data_nascimento}}" name="data_nascimento" type="text" class="bootstrap-datepicker form-control"
                    placeholder="dd/mm/aaaa" data-parsley-required data-date-format="dd/mm/yyyy" data-parsley-pattern="[0-9]{2}[/]?[0-9]{2}[/]?[0-9]{4}" >
            </div>
        </div>
        <div class="form-group col-md-2">
            <label title="Morto" for="morto">Morto</label>
            <select class="form-control" id="morto" name="morto" value="{{$cliente->morto}}" data-parsley-required>
                <option value="">Escolher..</option>
                <option value="sim" @if('sim'===$cliente->morto) selected @endif>Sim</option>
                <option value="nao" @if('nao'===$cliente->morto) selected @endif>Não</option>
            </select>
        </div>
    </div>    
    {{-- <div class="row">
        <div class="form-group col-md-12">
            <label title="historico">Histórico</label>
            <textarea class="form-control textarea-lg" id="historico" name="historico">{{$cliente->historico}}</textarea>
        </div>
    </div> --}}

    <ul class="reset-ul">
    {{-- <div class="row">

        <div class="form-group col-md-2 ">
            <label for="valor_despesa">Despesa Total Prevista (R$)</label>
            <input type="text" id="valor_despesa" name="valor_despesa" class="valor form-control" style="display:inline-block" placeholder="Digite o valor"  value="{{$projeto->valor_despesa}}" />
        </div>
        <div class="form-group col-md-2 ">
                <label for="valor_receita">Receita Total Prevista (R$)</label>
                <input type="text" id="valor_receita" name="valor_receita" class="valor form-control" style="display:inline-block" placeholder="Digite o valor"  value="{{$projeto->valor_receita}}" />
        </div>        
    </div>    
    <div class="row">
        <div class="form-group col-md-12">
            <label title="Resumo do projeo">Resumo do projeto</label>
            <textarea class="ckeditor form-control textarea-lg" id="resumo" name="resumo">{{$projeto->resumo}}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="form-group col-md-2">
            <label for="data">Data inicio</label>
            <div class="input-prepend input-group">
                <span class="add-on input-group-addon">
                <i class="glyph-icon icon-calendar"></i>
                </span>
                <input id="data_inicio" value="{{$projeto->data_inicio}}" name="data_inicio" type="text" class="bootstrap-datepicker form-control"
                    placeholder="dd/mm/aaaa" data-parsley-required data-date-format="dd/mm/yyyy" data-parsley-pattern="[0-9]{2}[/]?[0-9]{2}[/]?[0-9]{4}" >
            </div>
        </div>
        <div class="form-group col-md-2">
            <label for="data">Data final</label>
            <div class="input-prepend input-group">
                <span class="add-on input-group-addon">
                <i class="glyph-icon icon-calendar"></i>
                </span>
                <input id="data_fim" value="{{$projeto->data_fim}}" name="data_fim" type="text" class="bootstrap-datepicker form-control"
                    placeholder="dd/mm/aaaa" data-date-format="dd/mm/yyyy" data-parsley-pattern="[0-9]{2}[/]?[0-9]{2}[/]?[0-9]{4}">
            </div>
        </div>
    </div>     --}}

    <div class="row">

        <div class="text-center form-group col-lg-12">
            <button id="saveform-clienteedit" type="button" class="form-group btn btn-primary"
                onclick="$('#form-clienteedit').parsley().validate();">SALVAR - informações gerais</button>
        </div>
    </div>
</form>

<script type="text/javascript" src="{{asset('theme-assets/widgets/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datepicker/datepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/parsley.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/pt-br.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/nitsys.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/touchspin/touchspin.js')}}"></script>
<script type="text/javascript">    
    // CKEDITOR.timestamp = Math.random().toString(36).substring(7);
    // CKEDITOR.replace( 'historico', { customConfig : "{{asset('theme-assets/widgets/ckeditor/nitconfig.js')}}"});
    $('#form-clienteedit').parsley().on('form:success', function () {
        // $('textarea.ckeditor').each(function () {
        //     var $textarea = $(this);
        //     $textarea.val(CKEDITOR.instances[$textarea.attr('name')].getData());
        // });
        Nitsys.saveForm('form-clienteedit');
    });






    // $('#data_pcf').bsdatepicker({
    //     format: 'dd/mm/yyyy'
    // });
    // $('#data_paf').bsdatepicker({
    //     format: 'dd/mm/yyyy'
    // });
    $('#data_nascimento').bsdatepicker({
        format: 'dd/mm/yyyy'
    });



    $('#data_inicio').bsdatepicker({
        format: 'dd/mm/yyyy'
    });
    // $('#data_encerramento').bsdatepicker({
    //     format: 'dd/mm/yyyy'
    // });
    $('#ano').mask('0000', {
        reverse: true
    });
    $('#valor_despesa').mask('#.##0,00', {reverse: true});
    $('#valor_receita').mask('#.##0,00', {reverse: true});
    
    // $("input[name='porcentagem_bolsa']").TouchSpin({
    //         min: 0,
    //         max: 100,
    //         step: 0.01,
    //         decimals: 2,
    //         boostat: 5,
    //         maxboostedstep: 10,
    //         postfix: '%'
    // });
    // $('#porcentagem_bolsa').mask('000.00', {reverse: true});
    body_sizer();
</script>