{{-- @section('css')
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
    div.divFooter{
        position: fixed;
        bottom:0;
    }
</style>
<header class="header print">
    <h1>Artigo "Dicas de CSS para a impressão" escrito pela autora Dani authors: Dani Guerrato
    paid: true retirado do site www.tableless.com.br.</h1>
</header>
@endsection --}}
{{-- <div class="divFooter">UNCLASSIFIED</div> --}}

    <input type="hidden" id="id" name="id" value="{{$clientepf->id}}" />
    <br>
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
            <div class="col-md-1 "></div>
            <div class="col-md-9 ">
                @php($nomecampo = 'nome'.$registro->id)
                <input type="text" id={{$nomecampo}} name={{$nomecampo}} class="form-control" style="color: red; background: orange; font-weight: bold; text-align: center;" disabled value="{{(!empty($registro->nome) ? $registro->nome : '')}}">
                {{-- <div class="tl-label bs-label label-warning ">{{$registro->nome}}</div> --}}
            </div>
            <div class="col-md-1"></div>
            <button type="button" class="btn btn-primary " onclick="edita('{{$registro->id}}');">Edita</button>

            @php($linha=substr_count($registro->descricao,"\n"))
            @php($nomecampo = 'descricao'.$registro->id)
            {{-- <textarea class="form-control " rows={{$linha+1}} disabled id={{$nomecampo}} name={{$nomecampo}}>{!!$registro->descricao!!}</textarea> --}}
            <textarea class="form-control textarea-lg " rows={{$linha+1}} disabled id={{$nomecampo}} name={{$nomecampo}}>{!!$registro->descricao!!}</textarea>

            {{-- opcao 3 --}}
            {{-- <textarea  cols="160" rows={{$linha+1}} readonly id="historico" name="historico">{!!$registro->descricao!!}</textarea> --}}
            <br>
        @endforeach 

        @php($aa = DB::table('a3clientepf_historico')->select('*')->where('a3clientepf_id', '=',$clientepf->id)->orderBy('data','asc')->get())   
        <div class="content-box-header btn-success">
            <h5>Evolução - consulta</h5>
        </div>

        @foreach($aa as $registro)
            @php($xdata = date_format(date_create($registro->data),'d/m/Y'))
            <div class="row">
                <div class="col-md-5"></div>
                <div class="col-md-2">
                    @php($enomecampo = 'data'.$registro->id)
                    <input type="text" id={{$enomecampo}} name={{$enomecampo}} class="form-control" style="color: red; background: orange; font-weight: bold; text-align: center;" disabled value={{$xdata}}>
                    {{-- <div class="tl-label bs-label label-warning ">Data: {{$xdata}}</div> --}}
                </div>
                <div class="col-md-5"></div>
            </div>
            <div class="row">
                <div class="col-md-1">    
                    @php($enomecampo = 'peso'.$registro->id)
                    <label for="peso">Peso (kg)</label>
                    <input type="text" id={{$enomecampo}} name={{$enomecampo}}  value="{{(!empty($registro->peso) ? $registro->peso : '')}}" disabled class="valor form-control" style="display:inline-block"/>
                </div>    
                <div class="col-md-1">    
                    @php($enomecampo = 'altura'.$registro->id)              
                    <label for="altura">Altura (cm)</label>
                    <input type="text" id={{$enomecampo}} name={{$enomecampo}}  value="{{(!empty($registro->altura) ? $registro->altura : '')}}" disabled class="valor form-control" style="display:inline-block"/>
                </div>    
                <div class="col-md-1">    
                    @php($enomecampo = 'pa'.$registro->id)
                    <label for="pa">PA</label>
                    <input type="text" id={{$enomecampo}} name={{$enomecampo}}  value="{{(!empty($registro->pa) ? $registro->pa : '')}}" disabled class="valor form-control" style="display:inline-block"/>
                </div>    
                <div class="col-md-1">    
                    @php($enomecampo = 'fc'.$registro->id)
                    <label for="fc">FC</label>
                    <input type="text" id={{$enomecampo}} name={{$enomecampo}}  value="{{(!empty($registro->fc) ? $registro->fc : '')}}" disabled class="valor form-control" style="display:inline-block"/>
                </div>    
                <div class="col-md-1">
                    @php($enomecampo = 'temperatura'.$registro->id)
                    <label for="temperatura">Temperatura</label>
                    <input type="text" id={{$enomecampo}} name={{$enomecampo}}  value="{{(!empty($registro->temperatura) ? $registro->temperatura : '')}}" disabled class="valor form-control" style="display:inline-block"/>
                </div>    
                <div class="col-md-6"></div>
                <div class="col-md-1 my-4">  
                    <button type="button" class="btn btn-primary " onclick="editaevolucao('{{$registro->id}}');">Edita</button>
                </div>
            </div>
            <div id = "zzzz" class="row">
                @php($linha=substr_count($registro->historico,"\n"))
                @php($enomecampo = 'historico'.$registro->id)
                <label for="cp">Historico</label>
                <textarea class="form-control textarea-lg"  disabled id={{$enomecampo}} name={{$enomecampo}}>{!!$registro->historico!!}</textarea>
                {{-- <textarea class="form-control " rows={{$linha+1}} disabled id="historico" name="historico">{!!$registro->historico!!}</textarea> --}}
                {{-- <textarea  cols="160" rows={{$linha+1}} readonly id="historico" name="historico">{!!$registro->historico!!}</textarea> --}}
            </div>
            <div class="row my-2">
                @php($linha=substr_count($registro->receita,"\n"))
                @php($enomecampo = 'receita'.$registro->id)
                <label for="re">Receita</label>
                <textarea class="form-control textarea-md" style="font-family: Courier New;" disabled id={{$enomecampo}} name={{$enomecampo}}>{!!$registro->receita!!}</textarea>
            </div>
            <div class="row">  
            <button type="button"  onclick="imprime('{{$clientepf->nome}}','{{$clientepf->cpf}}','{{$registro->id}}' , '{{$parametro->cabecario1}}' , '{{$parametro->cabecario2}}' , '{{$parametro->rodape1}}' , '{{$parametro->rodape2}}');">Imprime Receita</button>
            {{-- <button type="button"  onclick="gerapdf();">Gera PDF</button> --}}
            </div>
            <br>
        @endforeach 
        
        <button type="button" class="btn btn-primary " onclick="editaevolucao();">Adicionar Consulta</button>
        
        {{-- @php(die($aa)) --}}

    </ul>    

    {{-- ******************** TELAS DE EDIÇÃO - MODAL ***************************** --}}


    {{-- TESTE IMPRESSAO MODAL RECEITA--}}
    {{-- <div id="modalreceita" class="form-modal modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" >
           <div class="modal-content">
               <div class="modal-header btn-purple">
                    <input type="hidden" id="idform" name="idform" />
                    <h4 class="modal-title" >Impressão Receita</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div id="kkkk" class="modal-body">
                        <div class="row">  
                            <label for="yy">Receita</label>
                        <h4>{!!$registro->receita!!}</h4>             
                        </div>    
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-info " onclick="imprime();">teste impressão</button>               
                </div>              
           </div>
        </div>
    </div> --}}
    {{-- FIM  --}}


    {{-- MODAL PRIMEIRA CONSULTA --}}
    <div id="modalteste" class="form-modal modal fade" role="dialog" tabindex="-1">
        <div class="modal-dialog modal-lg" >
           <div class="modal-content">
               <div class="modal-header btn-purple">
                    <input type="hidden" id="idform" name="idform" />
                    <h4 class="modal-title" >Primeira Consulta</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-modalteste" method="POST" action="{{config('app.url')}}/xaction/aplicativo3/paciente/historico/save2/" onsubmit="return false;"
                    data-parsley-validate="">
                        <div class="row">  
                            <label for="xx">Nome</label>
                            <input type="text" id="xxx" name="xxx" class="form-control" data-parsley-required >
                        </div>   
                        <br> 
                        <div class="row">  
                            <label for="yy">Descrição</label>
                            <textarea class="form-control textarea-lg" id="yyy" name="yyy"></textarea>             
                        </div>    
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary ml-2" onclick="salva();">Salva</button>                
                    {{-- TESTE VALIDATE PARSLEY --}}
                    {{-- <button id="saveform-modalteste" type="button" class="btn btn-primary ml-2" onclick="teste();">TESTE VALIDATE</button>     --}}
                </div>              
           </div>
        </div>
    </div>
    {{-- FIM - MODAL PRIMEIRA CONSULTA --}}

    {{-- inico MODAL EVOLUCAO --}}
    <div id="modalevolucao" class="modal fade" role="dialog">
        <div class="modal-dialog" >
           <div class="modal-content modal-lg">
                <input type="hidden" id="ideform" name="ideform" />
                <input type="hidden" id="idcliente" name="idcliente" value="{{$clientepf->id}}" />
                <div class="modal-header btn-success">
                    <h4 class="modal-title" >Evolução - Consulta</h4>
                    {{-- <input type="text" disabled id="edata" name="edata" class="form-control" /> --}}
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <form id="form-teste" name="form-teste" method="POST" action="{{config('app.url')}}/action/aplicativo3/paciente/historico/save2/" onsubmit="return false;"
                    data-parsley-validate="">
                        {{-- <div class="row">  
                            <input type="text" id="xxx" name="xxx" class="form-control" />
                        </div>   
                        <br>  --}}
                        <div class="row">
                            <div class="form-group col-md-2">
                                <label for="data">Data</label>
                                <div class="input-prepend input-group">
                                    {{-- <span class="add-on input-group-addon">
                                        <i class="glyph-icon icon-calendar"></i>
                                    </span> --}}
                                    <input id="edata" name="edata" type="text" class="bootstrap-datepicker form-control"
                                    placeholder="dd/mm/aaa" value="" data-date-format="dd/mm/yyyy" data-parsley-required>
                                </div>
                            </div> 
                            <div class="form-group col-md-2">
                                <label for="peso">Peso (kg)</label>
                                <input type="text" id="epeso" name="epeso" class="valor form-control" style="display:inline-block" placeholder="Peso" data-parsley-required/>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="peso">Altura (cm)</label>
                                <input type="text" id="ealtura" name="ealtura" class="valor form-control" style="display:inline-block" placeholder="Altura"/>
                            </div>
                            {{-- <div class="form-group col-md-1">
                                <label for="peso">IMC</label>
                                <input type="text" disabled id="imc" name="imc" class="valor form-control" style="display:inline-block" />
                            </div> --}}
                            <div class="form-group col-md-2">
                                <label for="peso">PA</label>
                                <input type="text" id="epa" name="epa" class="valor form-control" style="display:inline-block" placeholder="PA"/>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="peso">Fc</label>
                                <input type="text" id="efc" name="efc" class="valor form-control" style="display:inline-block" placeholder="Fc"/>
                            </div>
                            <div class="form-group col-md-2">
                                <label for="peso">Temp.</label>
                                <input type="text" id="etemperatura" name="etemperatura" class="valor form-control" style="display:inline-block" placeholder="Temperatura"/>
                            </div>
                        </div>
                        <div class="row">  
                            <textarea class="form-control textarea-md" id="ehistorico" name="ehistorico"></textarea>             
                        </div> 
                        
                        <div class="row">  
                            <label for="rec">Receita</label>
                            <textarea class="form-control textarea-sm" style="font-family: Courier New;" id="ereceita" name="ereceita"></textarea>             
                        </div> 
                        <div class="row">
                            <div class="form-group col-md-4 my-4">
                                {{-- <label for="a3remedio">Remedio</label> --}}
                                <select class="form-control" id="a3remedio" name="a3remedio">
                                    <option value="">Escolher..</option>
                                    @foreach($remedios as $remedio)
                                        @php($ii=80 - strlen($remedio->nome)- strlen($remedio->caixa))
                                        @if($ii < 0 ) $ii=0 @endif
                                        @php($carac=str_repeat('.',$ii))
                                        @php($nomefinal = $remedio->nome.$carac.$remedio->caixa)
                                        {{-- @if (!empty($remedio->caixa))
                                          $nomefinal = $remedio->nome.$carac.$remedio->caixa
                                        @endif --}}
                                        {{-- @php($nomefinal = $remedio->nome.$carac.$remedio->caixa) --}}
                                        <option value='{{$nomefinal}} {{"\n"}} {{$remedio->descricao}} {{"\n"}} {{"\n"}}'>{{$remedio->nome}}</option>
                                    @endforeach 
                                </select>
                            </div>
                            <button type="button" class="btn btn-warning my-4 mx-4" onclick="adicionaremedio();">Adiciona Remedio na receita</button>   
                            <button type="button" class="btn btn-danger my-4" onclick="limpareceita();">Limpa receita</button>    
                        </div>                         
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary ml-2" onclick="salvaevolucao();">Salva</button>                
                    {{-- <button id="saveform-pais" type="button" class="btn btn-primary" onclick="ttt();">ttteste Salvar</button> --}}
                    {{-- <button id="saveform-centro" type="button" class="btn btn-primary">Salvar</button> --}}
                </div>              
           </div>
        </div>
    </div>
    {{-- FIM - MODAL EVOLUCAO --}}

    {{-- <head>
        <title>Converter uma Tabela para PDF usando JavaScript</title>
        <style>
            table
            {
                width: 300px;
                font: 17px Calibri;
            }
            table, th, td 
            {
                border: solid 1px #DDD;
                border-collapse: collapse;
                padding: 2px 3px;
                text-align: center;
            }
        </style>
    </head>
    <div id="tabela">
        <table> 
            <tr>
                <th>Nome</th>
                <th>Idade</th>
                <th>Cargo</th>
            </tr>
            <tr>
                <td>Macoratti</td>
                <td>55</td>
                <td>Programador</td>
            </tr>
            <tr>
                <td>Jefferson</td>
                <td>26</td>
                <td>Engenheiro</td>
            </tr>
            <tr>
                <td>Janice</td>
                <td>24</td>
                <td>Web Designer</td>
            </tr>
        </table>
    </div> --}}


{{-- </form> --}}

<script type="text/javascript" src="{{asset('theme-assets/widgets/ckeditor/ckeditor.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/datepicker/datepicker.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/parsley.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/pt-br.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/nitsys.js')}}"></script>
{{-- touchspin --}}
<script type="text/javascript" src="{{asset('theme-assets/widgets/touchspin/touchspin.js')}}"></script>
<script type="text/javascript">    

    // atualiza texto do editor para textarea
    // $('#form-clientepfvisao').parsley().on('form:success', function () {
    //     $('textarea.ckeditor').each(function () {
    //         var $textarea = $(this);
    //         $textarea.val(CKEDITOR.instances[$textarea.attr('name')].getData());
    //     });
    //     Nitsys.saveForm('form-clientepfvisao');
    // });
    body_sizer();


    function edita(id) {
        $.ajax({
            url: "{{config('app.url')}}/action/aplicativo3/paciente/formulario/getbyid/"+id ,
            method: 'GET',
            success: function (data) {
                    // console.log(data);
                    $('#idform').val(data['id']);
                    $('#xxx').val(data['nome']);
                    $('#yyy').val(data['descricao']);
                },
                error: function (data) {
                    console.log('error', data);
                }
        });
        $('#modalteste').modal('show');

    }  
    // observacao : o id vem da funcao edita(id), passa no modal e volta no save
    function salva() {
        var queryString = {
                _token: $('meta[name=csrf-token]').attr("content"),
                xdescricao: $('#yyy').val(),
                xid: $('#idform').val(), 
                xnome: $('#xxx').val(),
        };
        $.ajax({
            url: "{{config('app.url')}}/action/aplicativo3/paciente/formulario/save2/"+id,
            method: "POST",
            data: queryString,
            success: function (data) {
                var response = JSON.parse(data);
                if(response.success != 'false') {
                    // console.log(data);
                    // fechando janela modal
                    $('#modalteste').modal('hide');
                    // atualizando valor em textarea
                    $('#descricao'+ response.aa).val(response.bb);
                    $('#nome'+ response.aa).val(response.cc);
                }
            },
            error: function (data) {
                console.log('error', data);
            }
        });
    }

    // edicao e sava  modal edita evolucao

    function editaevolucao(id) {
        $.ajax({
            url: "{{config('app.url')}}/action/aplicativo3/paciente/historico/getbyid/"+id ,
            method: 'GET',
            success: function (data) {
                    console.log(data['data']);
                    $('#ideform').val(data['id']);
                    if (data['data'] != null) {
                        $('#edata').val(data['data']);
                    }    
                    else {
                        // var dNow = new Date();
                        // var localdate = dNow.getDate() + '/' + (dNow.getMonth()+1) + '/' + dNow.getFullYear();
                        d = new Date();
                        dataHora = (d.toLocaleString());
                        sodata = dataHora.substring(0,10);
                        $('#edata').val(sodata);
                    }    
                    $('#ehistorico').val(data['historico']);
                    $('#ealtura').val(data['altura']);
                    $('#epeso').val(data['peso']);
                    $('#epa').val(data['pa']);
                    $('#efc').val(data['fc']);
                    $('#etemperatura').val(data['temperatura']);
                    $('#ereceita').val(data['receita']);
                },
                error: function (data) {
                    console.log('error', data);
                }
        });
        $('#modalevolucao').modal('show');

    }  
    // observacao : o id vem da funcao editaevolucao(id), passa no modal e volta no save
    function salvaevolucao() {
        var queryString = {
                _token: $('meta[name=csrf-token]').attr("content"),
                ehistorico: $('#ehistorico').val(),
                ideform: $('#ideform').val(), 
                ealtura: $('#ealtura').val(), 
                epeso: $('#epeso').val(), 
                epa: $('#epa').val(), 
                efc: $('#efc').val(), 
                etemperatura: $('#etemperatura').val(), 
                edata: $('#edata').val(), 
                idcliente: $('#idcliente').val(), 
                ereceita: $('#ereceita').val(), 
                
        };
        $.ajax({
            url: "{{config('app.url')}}/action/aplicativo3/paciente/historico/save2/"+id,
            method: "POST",
            data: queryString,
            success: function (data) {
                var response = JSON.parse(data);
                if(response.success != 'false') {
                    // console.log(data);
                    // fechando janela modal
                    $('#modalevolucao').modal('hide');
                    // atualizando valores em visao cleintepf
                    if(response.tipo === 'edita') {
                        $('#historico'+ response.aa).val(response.bb);
                        $('#peso'+ response.aa).val(response.cc);
                        $('#altura'+ response.aa).val(response.dd);
                        $('#pa'+ response.aa).val(response.ee);
                        $('#fc'+ response.aa).val(response.ff);
                        $('#temperatura'+ response.aa).val(response.gg);
                        $('#data'+ response.aa).val(response.ii);
                        $('#receita'+ response.aa).val(response.jj);
                    }
                    if(response.tipo === 'novo') {
                        // $('#ooo').html(data);
                        window.location.reload();
                    }    
                }
            },
            error: function (data) {
                console.log('error', data);
            }
        });
    }


    $('#edata').bsdatepicker({
        format: 'dd/mm/yyyy'
    });
    $('#edata').mask('00/00/0000', {
        reverse: true
    });  
    $('#epeso').mask('000.0', {reverse: true});
    $('#ealtura').mask('000.0', {reverse: true});
    $('#etemperatura').mask('000.0', {reverse: true});
    $('#efc').mask('000', {reverse: true});


    function adicionaremedio() {
        // pontos = '.'.repeat(30);
        var xreceita = $('#ereceita').val();
        var xa3remedio = $('#a3remedio').val();
        var soma = xreceita + ' - '+ xa3remedio;
         $('#ereceita').val(soma);
    }

    function limpareceita() {
        resposta = confirm('Deseja limpar o conteudo da receita ?');
        console.log(resposta)
         if (resposta == true) {
             $('#ereceita').val('');
         }
    }


    // TESTES 
    // IMPRESSAO
    function imprimereceita(id) {
        $.ajax({
            url: "{{config('app.url')}}/action/aplicativo3/paciente/historico/getbyid/"+id ,
            method: 'GET',
            success: function (data) {
                    console.log(data['data']);
                    $('#ideform').val(data['id']);
                    $('#xreceita').val(data['receita']);
                },
                error: function (data) {
                    console.log('error', data);
                }
        });
        $('#modalreceita').modal('show');

    }  


    // function printDiv(divID)  
    function imprime(nome,cpf,id,cabecario1,cabecario2,rodape1,rodape2)
    {
        // pegando conteudo da receita
        $.ajax({
            url: "{{config('app.url')}}/action/aplicativo3/paciente/historico/getbyid/"+id ,
            method: 'GET',
            success: function (data) {
                    // console.log(data['receita']);
                    // window.print();
                    var style = "<style>";
                    style = style + "@page {size: portrait; width: 100%; margin-left: 1cm;}";
                    style = style + "footer {position: fixed; bottom: 0; margin-left: 8cm;}";
                    style = style + "h5 {font-family: Courier New;}";
                    // style = style + "body {margin-bottom: 5cm;}";
                    // style = style + "#rodape::after { content: '| Página ' counter(page); }";    
                    // style = style + "#rodape {running: footer; position: fixed; bottom: -5px; left: 0; right: 0px; height: 12px;}";    
                    style = style + "</style>";
                    d = new Date();
                    dataHora = (d.toLocaleString());
                    receita = data['receita'];
                    receita = receita.replace(/\r?\n/g, '<br />');
                    var win = window.open(); 
                    // win.document.write(dataHora + '<br><br>');
                    win.document.write(style);  
                    win.document.write('<body>');
                    win.document.write('<h3 align="center"><b>' + cabecario1 + '</b></h3>');
                    win.document.write('<h4 align="center">' + cabecario2 + '</h4>');
                    
                    win.document.writeln('<b>' + nome + '</b><br>');
                    win.document.write('CPF: <b>' + cpf + '</b><br><br>');
                    win.document.writeln('<h5>'+receita+'</h5>'); 
                    win.document.title = 'Receita';
                    win.document.write('</body>');
                    win.document.write('<footer><b>' + rodape1 + '</b></footer>');      
                    // win.document.write('<div id="rodape"></div>');             
                    // win.document.head = 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzz';
                    // win.document.header = 'xxxxxx';
                    win.print();  
                    win.close();
                },
                error: function (data) {
                    console.log('error', data);
                }
        });

        // observacao - funciona conteudo, mas cancelado porque nao atualiza quando edita - usar somente para pegar valor no html, nao usaa entao nomecampo vinod de parametro
        // ****>>> function imprime(nomecampo,nome,cpf,id)
        // var conteudo = document.getElementById(nomecampo).innerHTML;  
        //
        // conteudo = conteudo.replace(/\r?\n/g, '<br />');
        // d = new Date();
        // dataHora = (d.toLocaleString());
        // var win = window.open();  
        // win.document.write(dataHora + '<br><br>');
        // win.document.write('Nome :<b>' + nome + '</b><br>' );
        // win.document.write('CPF: <b>' + cpf + '<br><br>');
        // win.document.writeln(conteudo);  
        // win.document.write('<p>---------</p>');
        // win.document.title = 'Receita';  
        // win.print();  
        // win.close(); 
    } 

    // TESTE - IMPRESAO - alguns dados
    function gerapdf(){
        var minhaTabela = document.getElementById('tabela').innerHTML;
        var style = "<style>";
        style = style + "@page {size: portrait; width: 100%; margin-left: 0px;}";
        style = style + "h4 {font-family: Courier New; color:red; margin-left: 120px;}";
        style = style + "footer {text-align: center; padding: 3px;}";

        style = style + "table {width: 50%; margin-left: 200px; font: 20px Calibri;}";
        style = style + "table, th, td {border: solid 1px #DDD; border-collapse: collapse;";
        style = style + "padding: 2px 3px;text-align: center;}";
        style = style + "</style>";
        // CRIA UM OBJETO WINDOW
        var win = window.open('', '', 'height=700,width=700');
        win.document.write('<html><head>');
        win.document.write('<title>Empregados - teste</title>');   // <title> CABEÇALHO DO PDF.
        win.document.write(style);                                     // INCLUI UM ESTILO NA TAB HEAD
        win.document.write('</head>');
        win.document.write('<body>');
        // win.document.write(minhaTabela);                     // O CONTEUDO DA TABELA DENTRO DA TAG BODY
        win.document.write('<h4>zzzz</h4>')
        win.document.close(); 	                                         // FECHA A JANELA
        win.print();                                     
    }


    // TESTE - VALIDADETE PARSLEY 
    function teste() {
        console.log('111');
        $('#form-modalteste').parsley().on('form:success', function () {
            console.log('222');
        });
    }


</script>