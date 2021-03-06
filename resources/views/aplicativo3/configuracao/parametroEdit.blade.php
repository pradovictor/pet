@extends('base.master')

@section('content')
    {{-- <div class="panel"> --}}
        {{-- <div class="panel-body"> --}}
            <form id="form-parametro" name="parametro" method="POST"
                action="{{config('app.url')}}/action/aplicativo3/configuracao/parametro/save" data-parsley-validate="">
                {{-- <div class="content-box"> --}}
                    <input type="hidden" id="id" name="id" value="1" />
                    <div class="content-box-header bg-primary">
                     <h4>Impressão DA RECEITA</h4>
                    </div>
                    <div class="content-box-wrapper">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="email">Cabeçario - linha 1</label>
                                <input type="text" id="cabecario1" name="cabecario1" class="form-control"
                                    placeholder="Digite cabeçario - linha 1" data-parsley-maxlength="128" data-parsley-required
                                    value="{{(!empty($parametro->cabecario1) ? $parametro->cabecario1 : '')}}" />
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="email">Cabeçario - linha 2</label>
                                <input type="text" id="cabecario2" name="cabecario2" class="form-control"
                                    placeholder="Digite cabeçario - linha 2" data-parsley-maxlength="128" data-parsley-required
                                    value="{{(!empty($parametro->cabecario2) ? $parametro->cabecario2 : '')}}" />
                            </div>
                        </div>
                        <div class="row">
                        {{-- <div class="content-box-wrapper"> --}}
                                <div class="form-group col-lg-6">
                                    <label for="email">Rodape - linha 1</label>
                                    <input type="text" id="rodape1" name="rodape1" class="form-control"
                                        placeholder="Digite rodape - linha 1" data-parsley-maxlength="128" data-parsley-required
                                        value="{{(!empty($parametro->rodape1) ? $parametro->rodape1 : '')}}" />
                                </div>
                                {{-- <div class="form-group col-lg-6">
                                    <label for="email">Rodape - linha 2</label>
                                    <input type="text" id="rodape2" name="rodape2" class="form-control"
                                        placeholder="Digite rodape - linha 2" data-parsley-maxlength="128" data-parsley-required
                                        value="{{(!empty($parametro->rodape2) ? $parametro->rodape2 : '')}}" />
                                </div> --}}
                        </div>
                    </div>
                    <div class="content-box-header bg-primary">
                        <h4>Agenda</h4>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <label for="intervalo">Intervalo (horario)</label>
                            <select id="intervalo" class="form-control" name="intervalo"
                                data-parsley-required data-parsley-pattern="^(?:00:10:00|00:15:00|00:20:00|00:30:00|01:00:00)$">
                                <option value="">Escolher..</option>
                                <option value="00:10:00" @if(!empty($parametro->intervalo) && '00:10:00' === $parametro->intervalo) selected @endif>10 minutos</option>
                                <option value="00:15:00" @if(!empty($parametro->intervalo) && '00:15:00' === $parametro->intervalo) selected @endif>15 minutos</option>
                                <option value="00:20:00" @if(!empty($parametro->intervalo) && '00:20:00' === $parametro->intervalo) selected @endif>20 minutos</option>
                                <option value="00:30:00" @if(!empty($parametro->intervalo) && '00:30:00' === $parametro->intervalo) selected @endif>30 minutos</option>
                                <option value="01:00:00" @if(!empty($parametro->intervalo) && '01:00:00' === $parametro->intervalo) selected @endif>1 hora</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="horamin">Inicio horario</label>
                            <select id="horamin" class="form-control" name="horamin"
                                data-parsley-required data-parsley-pattern="^(?:00:00:00|01:00:00|02:00:00|03:00:00|04:00:00|05:00:00|06:00:00|07:00:00|08:00:00|09:00:00)$">
                                <option value="">Escolher..</option>
                                <option value="00:00:00" @if(!empty($parametro->horamin) && '00:00:00' === $parametro->horamin) selected @endif>00:00</option>
                                <option value="01:00:00" @if(!empty($parametro->horamin) && '01:00:00' === $parametro->horamin) selected @endif>01:00</option>
                                <option value="02:00:00" @if(!empty($parametro->horamin) && '02:00:00' === $parametro->horamin) selected @endif>02:00</option>
                                <option value="03:00:00" @if(!empty($parametro->horamin) && '03:00:00' === $parametro->horamin) selected @endif>03:00</option>
                                <option value="04:00:00" @if(!empty($parametro->horamin) && '04:00:00' === $parametro->horamin) selected @endif>04:00</option>
                                <option value="05:00:00" @if(!empty($parametro->horamin) && '05:00:00' === $parametro->horamin) selected @endif>05:00</option>
                                <option value="06:00:00" @if(!empty($parametro->horamin) && '06:00:00' === $parametro->horamin) selected @endif>06:00</option>
                                <option value="07:00:00" @if(!empty($parametro->horamin) && '07:00:00' === $parametro->horamin) selected @endif>07:00</option>
                                <option value="08:00:00" @if(!empty($parametro->horamin) && '08:00:00' === $parametro->horamin) selected @endif>08:00</option>
                                <option value="09:00:00" @if(!empty($parametro->horamin) && '09:00:00' === $parametro->horamin) selected @endif>09:00</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label for="horamax">Fim horario</label>
                            <select id="horamax" class="form-control" name="horamax"
                                data-parsley-required data-parsley-pattern="^(?:16:00:00|17:00:00|18:00:00|19:00:00|20:00:00|21:00:00|22:00:00|23:00:00|24:00:00)$">
                                <option value="">Escolher..</option>
                                <option value="16:00:00" @if(!empty($parametro->horamax) && '16:00:00' === $parametro->horamax) selected @endif>16:00</option>
                                <option value="17:00:00" @if(!empty($parametro->horamax) && '16:00:00' === $parametro->horamax) selected @endif>17:00</option>
                                <option value="18:00:00" @if(!empty($parametro->horamax) && '18:00:00' === $parametro->horamax) selected @endif>18:00</option>
                                <option value="19:00:00" @if(!empty($parametro->horamax) && '19:00:00' === $parametro->horamax) selected @endif>19:00</option>
                                <option value="20:00:00" @if(!empty($parametro->horamax) && '20:00:00' === $parametro->horamax) selected @endif>20:00</option>
                                <option value="21:00:00" @if(!empty($parametro->horamax) && '21:00:00' === $parametro->horamax) selected @endif>21:00</option>
                                <option value="22:00:00" @if(!empty($parametro->horamax) && '22:00:00' === $parametro->horamax) selected @endif>22:00</option>
                                <option value="23:00:00" @if(!empty($parametro->horamax) && '23:00:00' === $parametro->horamax) selected @endif>23:00</option>
                                <option value="24:00:00" @if(!empty($parametro->horamax) && '24:00:00' === $parametro->horamax) selected @endif>24:00</option>
                            </select>
                        </div>                        
                    </div>

                {{-- </div>     --}}
            </form>
            <div class="text-right">
                <button type="button" class="btn btn-default mr-2" data-dismiss="modal"
                    onclick="history.back(-1);">Voltar</button>
                <button id="saveform-table-content" type="button" class="btn btn-primary ml-2"
                    onclick="$('#form-parametro').parsley().validate();">Salvar</button>
            </div>
        {{-- </div> --}}
    {{-- </div> --}}
@endsection

@section('javascript')
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/parsley.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/parsley/pt-br.js')}}"></script>
<script type="text/javascript" src="{{asset('theme-assets/widgets/jquery-mask-plugin/jquery.mask.min.js')}}"></script>
<script type="text/javascript" src="{{asset('js/nitsys.js')}}"></script>
<script type="text/javascript">
    $('#form-parametro').parsley().on('form:success', function () {
        Nitsys.saveForm('form-parametro');
    });
</script>
@endsection