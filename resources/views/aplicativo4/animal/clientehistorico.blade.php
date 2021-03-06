<form id="form-clientehistorico" method="POST" action="{{config('app.url')}}/action/aplicativo4/animal/cliente/save" onsubmit="return false;"
    data-parsley-validate="">
    <input type="hidden" id="id" name="id" value="{{$cliente->id}}" />
    <br>
   <div class="content-box-header bg-primary">
        <h5>Historico</h5>
    </div>  
    <div class="row">
        <div class="form-group col-md-12">
            {{-- <label title="historico">Histórico</label> --}}
            <textarea class="form-control textarea-lg" id="historico" name="historico">{{$cliente->historico}}</textarea>
        </div>
    </div>
    <ul class="reset-ul">

    <div class="row">

        <div class="text-center form-group col-lg-12">
            <button id="saveform-clientehistorico" type="button" class="form-group btn btn-primary"
                onclick="$('#form-clientehistorico').parsley().validate();">SALVAR - Histórico</button>
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
    $('#form-clientehistorico').parsley().on('form:success', function () {
        // $('textarea.ckeditor').each(function () {
        //     var $textarea = $(this);
        //     $textarea.val(CKEDITOR.instances[$textarea.attr('name')].getData());
        // });
        Nitsys.saveForm('form-clientehistorico');
    });

    body_sizer();
</script>