<form id="form-clientepfhistorico" method="POST" action="{{config('app.url')}}/action/aplicativo3/paciente/historico/save" onsubmit="return false;"
    data-parsley-validate="">
    <input type="hidden" id="id" name="id" value="{{$cliente->id}}" />
    <br>
    {{-- <div class="content-box-header bg-primary">
        <h5>Sobre o Projeto</h5>
    </div> --}}
    <ul class="reset-ul">
    <div class="row">
            <div class="form-group col-md-2">
                <label for="data">Data</label>
                <div class="input-prepend input-group">
                    <span class="add-on input-group-addon">
                    <i class="glyph-icon icon-calendar"></i>
                    </span>
                    <input id="data" value="{{$cliente->data}}" name="data" type="text" class="bootstrap-datepicker form-control"
                        placeholder="dd/mm/aaaa" data-parsley-required data-date-format="dd/mm/yyyy" data-parsley-pattern="[0-9]{2}[/]?[0-9]{2}[/]?[0-9]{4}" >
                </div>
            </div>
    </div>    
    <div class="row">
        <div class="form-group col-md-12">
            <label title="Historico">Historico</label>
            <textarea class="ckeditor form-control textarea-lg" id="historico" name="historico">{{$cliente->historico}}</textarea>
        </div>
    </div>
    <div class="row">
        <div class="text-center form-group col-lg-12">
            <button id="saveform-clientepfhistorico" type="button" class="form-group btn btn-primary"
                onclick="$('#form-clientepfhistorico').parsley().validate();">SALVAR - historico</button>
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
    CKEDITOR.timestamp = Math.random().toString(36).substring(7);
    // atualizacao  do editor quando muda de views [pesquisadores / anexos] 
    CKEDITOR.replace( 'historico', { customConfig : "{{asset('theme-assets/widgets/ckeditor/nitconfig.js')}}"});
    // atualiza texto do editor para textarea
    $('#form-clientepfhistorico').parsley().on('form:success', function () {
        $('textarea.ckeditor').each(function () {
            var $textarea = $(this);
            $textarea.val(CKEDITOR.instances[$textarea.attr('name')].getData());
        });
        Nitsys.saveForm('form-clientepfhistorico');
    });
    $('#data').bsdatepicker({
        format: 'dd/mm/yyyy'
    });
    
    body_sizer();
</script>