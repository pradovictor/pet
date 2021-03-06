@extends('base.master')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-12 align-middle text-center">
                <h1 class="clients-title font-primary"><b>NITSYS</b></h1>
                @php($subdomain = explode('.', $_SERVER['HTTP_HOST'])[0])
                @if (($subdomain === '2dev' ) || ($subdomain === 'sciel') || ($subdomain === 'hcm') || ($subdomain === 'domarquitetura') || ($subdomain === 'projeto') || ($subdomain === 'parqtec') || ($subdomain === 'oraljet'))
                    {{-- SISTEMA 2 - SCIEL SAO CARLOS INSTALACOES ELETRICAS --}}
                    <h3 class="font-primary">Sistema de Gestão de Projetos</h3>
                    <br><br><br>
                    {{-- <h4>Gerenciamento de informações de Projetos, Clientes e Fornecedores.</h4> --}}
                    <br>
                    <div class="col align-middle text-center">
                        {{-- <img style="width:450px" src="{{ asset('images/cliente/lateral1.png')}}" onerror="this.style.display='none'"/> --}}
                        <img style="width:350px" src="{{ asset('images/cliente/'.$subdomain.'2.png')}}" onerror="this.style.display='none'"/>
                        
                        <img style="width:250px" src="{{ asset('images/cliente/'.$subdomain.'.png')}}" onerror="this.style.display='none'"/>
                        <img style="width:280px" src="{{ asset('images/cliente/'.$subdomain.'3.png')}}" onerror="this.style.display='none'"/>
                        {{-- <img style="width:450px" src="{{ asset('images/cliente/lateral2.png')}}" onerror="this.style.display='none'"/>  --}}
                        {{-- <img style="width:200px" src="{{ asset('images/cliente/'.$subdomain.'2.png')}}" onerror="this.style.display='none'"/> --}}
                    <div>
                    <br><br><br>
                    <div class="row justify-content-center mt-5">
                        <div class="post-image">
                            <a href="http://nitsys.com.br" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="NitSys - Sistema de gestão">
                                <img class="img-responsive" style="width:90px"
                                    src="{{ asset('images/logos/vpes.png')}}" alt="">
                            </a>
                        </div>
                        </div>
                        <div class="row justify-content-center">    
                        <div class="logo">&copy; 2019 VP Engenharia e Sistemas. Todos os direitos reservados.</div>
                    </div>
                @endif
                @if (($subdomain === '3dev' ) || ($subdomain === 'vap') || ($subdomain === 'espacopillares')|| ($subdomain === 'clinica') )
                    {{-- SISTEMA 3 - CLINICA MEDICA --}}
                    <h2 class="font-primary">Sistema de Gestão para Clinicas</h2>
                    
                    {{-- <h4>Gerenciamento de informações de Projetos, Clientes e Fornecedores.</h4> --}}
                    <br>
                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-4 align-middle text-center">
                            <img style="width:290px" src="{{ asset('images/cliente/'.$subdomain.'2.jpg')}}" onerror="this.style.display='none'"/>
                        </div>
                        <div class="col-md-4 align-middle text-center">
                            <img style="width:250px" src="{{ asset('images/cliente/'.$subdomain.'.png')}}" onerror="this.style.display='none'"/>
                        </div>
                        <div class="col-md-4 align-middle text-center">   
                            <img style="width:350px" src="{{ asset('images/cliente/'.$subdomain.'3.png')}}" onerror="this.style.display='none'"/>
                        </div>    
                    </div>    
                    <br>
                    <br>
                    <br>
                    <div class="row justify-content-center mt-5">
                        <div class="post-image">
                            <a href="http://nitsys.com.br" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="NitSys - Sistema de gestão">
                                <img class="img-responsive" style="width:90px"
                                    src="{{ asset('images/logos/vpes.png')}}" alt="">
                            </a>
                        </div>
                        </div>
                        <div class="row justify-content-center">    
                        <div class="logo">&copy; 2019 VP Engenharia e Sistemas. Todos os direitos reservados .</div>
                    </div>
                @endif
                @if (($subdomain === '4dev' ) || ($subdomain === 'pet'))
                    {{-- SISTEMA 4 - CLINICA VETERINARIA --}}
                    <h2 class="font-primary">Sistema de gestão para Clinica Veterinária</h2>
                    <br><br><br>
                    {{-- <h4>Gerenciamento de informações de Projetos, Clientes e Fornecedores.</h4> --}}
                    <br>
                    <div class="col align-middle text-center">
                        <img style="width:450px" src="{{ asset('images/cliente/'.$subdomain.'2.png')}}" onerror="this.style.display='none'"/>
                        <img style="width:250px" src="{{ asset('images/cliente/'.$subdomain.'.png')}}" onerror="this.style.display='none'"/>
                        <img style="width:370px" src="{{ asset('images/cliente/'.$subdomain.'3.png')}}" onerror="this.style.display='none'"/>
                    <div>
                    <br><br>
                    <div class="row justify-content-center mt-5">
                        <div class="post-image">
                            <a href="http://nitsys.com.br" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="NitSys - Sistema de gestão">
                                <img class="img-responsive" style="width:90px"
                                    src="{{ asset('images/logos/vpes.png')}}" alt="">
                            </a>
                        </div>
                        </div>
                        <div class="row justify-content-center">    
                        <div class="logo">&copy; 2019 VP Engenharia e Sistemas. Todos os direitos reservados.</div>
                    </div>
                @endif

                @if (($subdomain === '5dev' ) || ($subdomain === 'smt'))
                    {{-- SISTEMA 5 - MANUTENCAO DE TREM --}}
                    <h2 class="font-primary">Sistema de Gestão para Ordens de Serviço de Manutenção</h2>
                    <br><br><br>
                    {{-- <h4>Gerenciamento de informações de Projetos, Clientes e Fornecedores.</h4> --}}
                    <br>
                    <div class="col align-middle text-center">
                        <img style="width:450px" src="{{ asset('images/cliente/'.$subdomain.'2.png')}}" onerror="this.style.display='none'"/>
                        <img style="width:250px" src="{{ asset('images/cliente/'.$subdomain.'.png')}}" onerror="this.style.display='none'"/>
                        <img style="width:370px" src="{{ asset('images/cliente/'.$subdomain.'3.png')}}" onerror="this.style.display='none'"/>
                    <div>
                    <br><br>
                    <div class="row justify-content-center mt-5">
                        <div class="post-image">
                            <a href="http://nitsys.com.br" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="NitSys - Sistema de gestão">
                                <img class="img-responsive" style="width:90px"
                                    src="{{ asset('images/logos/vpes.png')}}" alt="">
                            </a>
                        </div>
                        </div>
                        <div class="row justify-content-center">    
                        <div class="logo">&copy; 2019 VP Engenharia e Sistemas. Todos os direitos reservados.</div>
                    </div>
                @endif

                @if (($subdomain === '6dev' ) || ($subdomain === 'sgi'))
                    {{-- SISTEMA 6 - SISTEMA GRAFICO DE INFORMAÇÕES --}}
                    <h2 class="font-primary">Sistema Gráfico de Informações</h2>
                    <br><br><br>
                    {{-- <h4>Gerenciamento de informações de Projetos, Clientes e Fornecedores.</h4> --}}
                    <br>
                    <div class="col align-middle text-center">
                        <img style="width:450px" src="{{ asset('images/cliente/'.$subdomain.'2.png')}}" onerror="this.style.display='none'"/>
                        <img style="width:250px" src="{{ asset('images/cliente/'.$subdomain.'.png')}}" onerror="this.style.display='none'"/>
                        <img style="width:370px" src="{{ asset('images/cliente/'.$subdomain.'3.png')}}" onerror="this.style.display='none'"/>
                    <div>
                    <br><br>
                    <div class="row justify-content-center mt-5">
                        <div class="post-image">
                            <a href="http://nitsys.com.br" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="NitSys - Sistema de gestão">
                                <img class="img-responsive" style="width:90px"
                                    src="{{ asset('images/logos/vpes.png')}}" alt="">
                            </a>
                        </div>
                        </div>
                        <div class="row justify-content-center">    
                        <div class="logo">&copy; 2019 VP Engenharia e Sistemas. Todos os direitos reservados.</div>
                    </div>
                @endif


                @if (($subdomain === 'dev' ) || ($subdomain === 'fundepag') || ($subdomain === 'nitipt') || ($subdomain === 'ii') || ($subdomain === 'ipen'))                
                    {{-- SISTEMA 1 - NITSYS --}}
                    <h3 class="font-primary">Sistema de gestão para Nucleo de Inovação Tecnologica</h3>
                    <br>
                    <h4>Gerenciamento de tecnologias com informações especificas da propriedade intelectual de patente, marca, programa de computador, desenho industrial, segredo Industrial e cultivar.</h4>
                    <br>
                    <div class="col-12 align-middle text-center">
                        <img style="width:400px" src="{{ asset('images/cliente/'.$subdomain.'.png')}}" onerror="this.style.display='none'"/>
                        <img style="width:200px" src="{{ asset('images/cliente/'.$subdomain.'2.png')}}" onerror="this.style.display='none'"/>
                    <div>
                        <br><br><br>
                    <div class="row justify-content-center mt-5">
                        <div class="post-image">
                            <a href="http://nitsys.com.br" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="NitSys - Sistema de gestão">
                                <img class="img-responsive" style="width:70px"
                                    src="{{ asset('images/logos/vpes.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="row justify-content-center">    
                        <div class="logo">&copy; 2019 VP Engenharia e Sistemas. Todos os direitos reservados.</div>
                    </div>
                    <br><br>    
                    <div class="row justify-content-center">
                        <div class="post-image">
                            <a href="http://decws.com" class="prettyphoto" rel="prettyPhoto[pp_gal]" title="Dec web solutions">
                                <img class="img-responsive" style="width:100px"
                                    src="{{ asset('images/logos/decws.png')}}" alt="">
                            </a>
                        </div>
                    </div>
                    <div class="row justify-content-center">
                        <div class="header">Assessoria de desenvolvimento</div>
                    </div>
                @endif
                <br>
        </div>   
    <div>    
@endsection

