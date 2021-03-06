<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // LGPD - PROTECAO DE DADOS PF E PJ
        Gate::define('VISUDADOSPF-V', function ($usuario) {
            return $usuario->hasPermissao('VISUDADOSPF-V');
        });
        Gate::define('VISUDADOSPJ-V', function ($usuario) {
            return $usuario->hasPermissao('VISUDADOSPJ-V');
        });

        // DASHBOARD
        Gate::define('VISUDASHBOARD-V', function ($usuario) {
            return $usuario->hasPermissao('VISUDASHBOARD-V');
        });

        // PRECADASTRO
        Gate::define('PRECADASTRO-VINCULO-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-VINCULO-A');
        });
        Gate::define('PRECADASTRO-VINCULO-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-VINCULO-E');
        });
        Gate::define('PRECADASTRO-VINCULO-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-VINCULO-R');
        });
        Gate::define('PRECADASTRO-VINCULO-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-VINCULO-V');
        });
        //
        Gate::define('PRECADASTRO-PAIS-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-PAIS-A');
        });
        Gate::define('PRECADASTRO-PAIS-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-PAIS-E');
        });
        Gate::define('PRECADASTRO-PAIS-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-PAIS-R');
        });
        Gate::define('PRECADASTRO-PAIS-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-PAIS-V');
        });
        //
        Gate::define('PRECADASTRO-ETAPA-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-ETAPA-A');
        });
        Gate::define('PRECADASTRO-ETAPA-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-ETAPA-E');
        });
        Gate::define('PRECADASTRO-ETAPA-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-ETAPA-R');
        });
        Gate::define('PRECADASTRO-ETAPA-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-ETAPA-V');
        });
        //
        //
        Gate::define('PRECADASTRO-INSTITUICAO-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-INSTITUICAO-A');
        });
        Gate::define('PRECADASTRO-INSTITUICAO-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-INSTITUICAO-E');
        });
        Gate::define('PRECADASTRO-INSTITUICAO-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-INSTITUICAO-R');
        });
        Gate::define('PRECADASTRO-INSTITUICAO-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-INSTITUICAO-V');
        });
        //
        Gate::define('PRECADASTRO-CENTRO-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-CENTRO-A');
        });
        Gate::define('PRECADASTRO-CENTRO-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-CENTRO-E');
        });
        Gate::define('PRECADASTRO-CENTRO-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-CENTRO-R');
        });
        Gate::define('PRECADASTRO-CENTRO-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-CENTRO-V');
        });
        //
        Gate::define('PRECADASTRO-PESQUISADOR-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-PESQUISADOR-A');
        });
        Gate::define('PRECADASTRO-PESQUISADOR-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-PESQUISADOR-E');
        });
        Gate::define('PRECADASTRO-PESQUISADOR-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-PESQUISADOR-R');
        });
        Gate::define('PRECADASTRO-PESQUISADOR-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-PESQUISADOR-V');
        });
        //
        Gate::define('PRECADASTRO-REDATOR-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-REDATOR-A');
        });
        Gate::define('PRECADASTRO-REDATOR-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-REDATOR-E');
        });
        Gate::define('PRECADASTRO-REDATOR-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-REDATOR-R');
        });
        Gate::define('PRECADASTRO-REDATOR-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-REDATOR-V');
        });
        //
        Gate::define('PRECADASTRO-EMPRESA-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-EMPRESA-A');
        });
        Gate::define('PRECADASTRO-EMPRESA-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-EMPRESA-E');
        });
        Gate::define('PRECADASTRO-EMPRESA-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-EMPRESA-R');
        });
        Gate::define('PRECADASTRO-EMPRESA-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-EMPRESA-V');
        });
        //
        Gate::define('PRECADASTRO-AREA-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-AREA-A');
        });
        Gate::define('PRECADASTRO-AREA-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-AREA-E');
        });
        Gate::define('PRECADASTRO-AREA-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-AREA-R');
        });
        Gate::define('PRECADASTRO-AREA-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-AREA-V');
        });
        //
        Gate::define('PRECADASTRO-NOTIFICACAO-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-NOTIFICACAO-A');
        });
        Gate::define('PRECADASTRO-NOTIFICACAO-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-NOTIFICACAO-E');
        });
        Gate::define('PRECADASTRO-NOTIFICACAO-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-NOTIFICACAO-R');
        });
        Gate::define('PRECADASTRO-NOTIFICACAO-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO-NOTIFICACAO-V');
        });

        // **ESPECIAL COMUNICADO DE INVENCAO - SOMENTE CPF
        // Gate::define('AVANCADO-CI-CPF', function ($usuario) {
        //     return $usuario->hasPermissao('AVANCADO-CI-CPF');
        // });
    
        // PROJETOS DE COOPERACAO
        Gate::define('PROJETO-A', function ($usuario) {
            return $usuario->hasPermissao('PROJETO-A');
        });
        Gate::define('PROJETO-E', function ($usuario) {
            return $usuario->hasPermissao('PROJETO-E');
        });
        Gate::define('PROJETO-R', function ($usuario) {
            return $usuario->hasPermissao('PROJETO-R');
        });
        Gate::define('PROJETO-V', function ($usuario) {
            return $usuario->hasPermissao('PROJETO-V');
        });


        // COMUNICADO DE INVENCAO- MODELO 1 - ITAL
        Gate::define('CI1-A', function ($usuario) {
            return $usuario->hasPermissao('CI1-A');
        });
        Gate::define('CI1-E', function ($usuario) {
            return $usuario->hasPermissao('CI1-E');
        });
        Gate::define('CI1-R', function ($usuario) {
            return $usuario->hasPermissao('CI1-R');
        });
        Gate::define('CI1-V', function ($usuario) {
            return $usuario->hasPermissao('CI1-V');
        });
        // Ci1 - pesquisador
        Gate::define('CI1-PESQUISADOR-A', function ($usuario) {
            return $usuario->hasPermissao('CI1-PESQUISADOR-A');
        });
        Gate::define('CI1-PESQUISADOR-E', function ($usuario) {
            return $usuario->hasPermissao('CI1-PESQUISADOR-E');
        });
        Gate::define('CI1-PESQUISADOR-R', function ($usuario) {
            return $usuario->hasPermissao('CI1-PESQUISADOR-R');
        });
        Gate::define('CI1-PESQUISADOR-V', function ($usuario) {
            return $usuario->hasPermissao('CI1-PESQUISADOR-V');
        });
        // Ci1 - formulario
        Gate::define('CI1-FORMULARIO-A', function ($usuario) {
            return $usuario->hasPermissao('CI1-FORMULARIO-A');
        });
        Gate::define('CI1-FORMULARIO-E', function ($usuario) {
            return $usuario->hasPermissao('CI1-FORMULARIO-E');
        });
        Gate::define('CI1-FORMULARIO-R', function ($usuario) {
            return $usuario->hasPermissao('CI1-FORMULARIO-R');
        });
        Gate::define('CI1-FORMULARIO-V', function ($usuario) {
            return $usuario->hasPermissao('CI1-FORMULARIO-V');
        });        
        // Ci1 - ANEXO
        Gate::define('CI1-ANEXO-A', function ($usuario) {
            return $usuario->hasPermissao('CI1-ANEXO-A');
        });
        Gate::define('CI1-ANEXO-E', function ($usuario) {
            return $usuario->hasPermissao('CI1-ANEXO-E');
        });
        Gate::define('CI1-ANEXO-R', function ($usuario) {
            return $usuario->hasPermissao('CI1-ANEXO-R');
        });
        Gate::define('CI1-ANEXO-V', function ($usuario) {
            return $usuario->hasPermissao('CI1-ANEXO-V');
        });  
        
        // TECNOLOGIA
        Gate::define('TECNOLOGIA-A', function ($usuario, $nitId) {
            return ($usuario->hasPermissao('TECNOLOGIA-A') && (!empty($nitId) ? $usuario->hasNit($nitId) : $usuario->hasAtLeastOneNit()));
        });
        Gate::define('TECNOLOGIA-E', function ($usuario, $nitId) {
            return $usuario->hasPermissao('TECNOLOGIA-E') && (!empty($nitId) ? $usuario->hasNit($nitId) : true);
        });
        Gate::define('TECNOLOGIA-R', function ($usuario, $nitId) {
            return $usuario->hasPermissao('TECNOLOGIA-R') && (!empty($nitId) ? $usuario->hasNit($nitId) : true);
        });
        Gate::define('TECNOLOGIA-V', function ($usuario, $nitId) {
            return $usuario->hasPermissao('TECNOLOGIA-V') && (!empty($nitId) ? $usuario->hasNit($nitId) : true);
        });
        
        
        // TECNOLOGIA
        
        // Gate::define('TECNOLOGIA-A', function ($usuario) {
        //     return $usuario->hasPermissao('TECNOLOGIA-A');
        // });
        // Gate::define('TECNOLOGIA-E', function ($usuario) {
        //     return $usuario->hasPermissao('TECNOLOGIA-E');
        // });
        // Gate::define('TECNOLOGIA-R', function ($usuario) {
        //     return $usuario->hasPermissao('TECNOLOGIA-R');
        // });
        // Gate::define('TECNOLOGIA-V', function ($usuario) {
        //     return $usuario->hasPermissao('TECNOLOGIA-V');
        // });
        

        // TECNOLOGIA - PROPRIEDADE INTELECTUAL
        Gate::define('TECNOLOGIA-PI-A', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-PI-A');
        });
        Gate::define('TECNOLOGIA-PI-E', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-PI-E');
        });
        Gate::define('TECNOLOGIA-PI-R', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-PI-R');
        });
        Gate::define('TECNOLOGIA-PI-V', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-PI-V');
        });
        // TECNOLOGIA - TRANSFERENCIA TECNOLOGIA
        Gate::define('TECNOLOGIA-TT-A', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-TT-A');
        });
        Gate::define('TECNOLOGIA-TT-E', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-TT-E');
        });
        Gate::define('TECNOLOGIA-TT-R', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-TT-R');
        });
        Gate::define('TECNOLOGIA-TT-V', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-TT-V');
        });
        // TECNOLOGIA - COMUNICACAO
        Gate::define('TECNOLOGIA-CO-A', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-CO-A');
        });
        Gate::define('TECNOLOGIA-CO-E', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-CO-E');
        });
        Gate::define('TECNOLOGIA-CO-R', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-CO-R');
        });
        Gate::define('TECNOLOGIA-CO-V', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-CO-V');
        });
        // TECNOLOGIA - DOCUMENTO
        Gate::define('TECNOLOGIA-DO-A', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-DO-A');
        });
        Gate::define('TECNOLOGIA-DO-E', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-DO-E');
        });
        Gate::define('TECNOLOGIA-DO-R', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-DO-R');
        });
        Gate::define('TECNOLOGIA-DO-V', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-DO-V');
        });
        // TECNOLOGIA - DESPESA
        Gate::define('TECNOLOGIA-DE-A', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-DE-A');
        });
        Gate::define('TECNOLOGIA-DE-E', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-DE-E');
        });
        Gate::define('TECNOLOGIA-DE-R', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-DE-R');
        });
        Gate::define('TECNOLOGIA-DE-V', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-DE-V');
        });
        // TECNOLOGIA - ETAPA
        Gate::define('TECNOLOGIA-ET-A', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-ET-A');
        });
        Gate::define('TECNOLOGIA-ET-E', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-ET-E');
        });
        Gate::define('TECNOLOGIA-ET-R', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-ET-R');
        });
        Gate::define('TECNOLOGIA-ET-V', function ($usuario) {
            return $usuario->hasPermissao('TECNOLOGIA-ET-V');
        });
        // INPI
        Gate::define('INPI-RPI-A', function ($usuario) {
            return $usuario->hasPermissao('INPI-RPI-A');
        });
        Gate::define('INPI-RPI-R', function ($usuario) {
            return $usuario->hasPermissao('INPI-RPI-R');
        });
        Gate::define('INPI-RPI-V', function ($usuario) {
            return $usuario->hasPermissao('INPI-RPI-V');
        });
        Gate::define('VISUINPI-VAP-V', function ($usuario) {
            return $usuario->hasPermissao('VISUINPI-VAP-V');
        });
        Gate::define('VISUINPI-VEP-V', function ($usuario) {
            return $usuario->hasPermissao('VISUINPI-VEP-V');
        });

        // ROYALTIES
        Gate::define('ROYALTIES-A', function ($usuario) {
            return $usuario->hasPermissao('ROYALTIES-A');
        });
        Gate::define('ROYALTIES-E', function ($usuario) {
            return $usuario->hasPermissao('ROYALTIES-E');
        });
        Gate::define('ROYALTIES-R', function ($usuario) {
            return $usuario->hasPermissao('ROYALTIES-R');
        });
        Gate::define('ROYALTIES-V', function ($usuario) {
            return $usuario->hasPermissao('ROYALTIES-V');
        });

        // INFORMACOES
        Gate::define('VISUINFO-TEC-V', function ($usuario) {
            return $usuario->hasPermissao('VISUINFO-TEC-V');
        });
        Gate::define('VISUINFO-REG-V', function ($usuario) {
            return $usuario->hasPermissao('VISUINFO-REG-V');
        });
        Gate::define('VISUINFO-LIC-V', function ($usuario) {
            return $usuario->hasPermissao('VISUINFO-LIC-V');
        });
        Gate::define('VISUINFO-PES-V', function ($usuario) {
            return $usuario->hasPermissao('VISUINFO-PES-V');
        });
        Gate::define('VISUINFO-PC-V', function ($usuario) {
            return $usuario->hasPermissao('VISUINFO-PC-V');
        });

        // AREA DO PESQUISADOR
        Gate::define('VISUAREAPESQUISADOR-INFO-V', function ($usuario) {
            return $usuario->hasPermissao('VISUAREAPESQUISADOR-INFO-V');
        });        
        Gate::define('VISUAREAPESQUISADOR-DOC-V', function ($usuario) {
            return $usuario->hasPermissao('VISUAREAPESQUISADOR-DOC-V');
        });    
        
        // CONFIGURAÇÕES
        // nit
        Gate::define('NIT-A', function ($usuario) {
            return $usuario->hasPermissao('NIT-A');
        });
        Gate::define('NIT-E', function ($usuario) {
            return $usuario->hasPermissao('NIT-E');
        });
        Gate::define('NIT-R', function ($usuario) {
            return $usuario->hasPermissao('NIT-R');
        });
        Gate::define('NIT-V', function ($usuario) {
            return $usuario->hasPermissao('NIT-V');
        });
        // usuario
        Gate::define('USUARIO-A', function ($usuario) {
            return $usuario->hasPermissao('USUARIO-A');
        });
        Gate::define('USUARIO-E', function ($usuario) {
            return $usuario->hasPermissao('USUARIO-E');
        });
        Gate::define('USUARIO-R', function ($usuario) {
            return $usuario->hasPermissao('USUARIO-R');
        });
        Gate::define('USUARIO-V', function ($usuario) {
            return $usuario->hasPermissao('USUARIO-V');
        });
        // ACESSO
        Gate::define('VISUACESSO-V', function ($usuario) {
            return $usuario->hasPermissao('VISUACESSO-V');
        });

        // 
        // SISTEMA 2 - SCIEL - GESTAO DE PROJETOS
        //

        // DASHBOARD
        Gate::define('VISUDASHBOARD2-V', function ($usuario) {
            return $usuario->hasPermissao('VISUDASHBOARD2-V');
        });

        // PRECADASTRO2 - CONDICAO
        Gate::define('PRECADASTRO2-CONDICAO-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-CONDICAO-A');
        });
        Gate::define('PRECADASTRO2-CONDICAO-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-CONDICAO-E');
        });
        Gate::define('PRECADASTRO2-CONDICAO-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-CONDICAO-R');
        });
        Gate::define('PRECADASTRO2-CONDICAO-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-CONDICAO-V');
        });   

        // PRECADASTRO2 - RATEIO
        Gate::define('PRECADASTRO2-RATEIO-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-RATEIO-A');
        });
        Gate::define('PRECADASTRO2-RATEIO-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-RATEIO-E');
        });
        Gate::define('PRECADASTRO2-RATEIO-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-RATEIO-R');
        });
        Gate::define('PRECADASTRO2-RATEIO-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-RATEIO-V');
        });   

        // PRECADASTRO2 - CENTRO DE CUSTO
        Gate::define('PRECADASTRO2-CENTRODECUSTO-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-CENTRODECUSTO-A');
        });
        Gate::define('PRECADASTRO2-CENTRODECUSTO-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-CENTRODECUSTO-E');
        });
        Gate::define('PRECADASTRO2-CENTRODECUSTO-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-CENTRODECUSTO-R');
        });
        Gate::define('PRECADASTRO2-CENTRODECUSTO-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-CENTRODECUSTO-V');
        });  

        // PRECADASTRO2 - CATEGORIA
        Gate::define('PRECADASTRO2-CATEGORIA-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-CATEGORIA-A');
        });
        Gate::define('PRECADASTRO2-CATEGORIA-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-CATEGORIA-E');
        });
        Gate::define('PRECADASTRO2-CATEGORIA-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-CATEGORIA-R');
        });
        Gate::define('PRECADASTRO2-CATEGORIA-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-CATEGORIA-V');
        });
         
        // PRECADASTRO2 - FONTEPAGADORA
        Gate::define('PRECADASTRO2-FONTEPAGADORA-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-FONTEPAGADORA-A');
        });
        Gate::define('PRECADASTRO2-FONTEPAGADORA-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-FONTEPAGADORA-E');
        });
        Gate::define('PRECADASTRO2-FONTEPAGADORA-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-FONTEPAGADORA-R');
        });
        Gate::define('PRECADASTRO2-FONTEPAGADORA-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO2-FONTEPAGADORA-V');
        });

        // CLIENTE-PF
        Gate::define('CLIENTE-PF-A', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE-PF-A');
        });
        Gate::define('CLIENTE-PF-E', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE-PF-E');
        });
        Gate::define('CLIENTE-PF-R', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE-PF-R');
        });
        Gate::define('CLIENTE-PF-V', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE-PF-V');
        });

        // CLIENTE-PJ
        Gate::define('CLIENTE-PJ-A', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE-PJ-A');
        });
        Gate::define('CLIENTE-PJ-E', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE-PJ-E');
        });
        Gate::define('CLIENTE-PJ-R', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE-PJ-R');
        });
        Gate::define('CLIENTE-PJ-V', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE-PJ-V');
        });       

        // CLIENTE-RELATORIO1 SOMENTE VISUALIZACAO
        Gate::define('VISUCLIENTE-RELATORIO1-V', function ($usuario) {
            return $usuario->hasPermissao('VISUCLIENTE-RELATORIO1-V');
        });         

        // GESTAO DE PROPOSTA 2
        Gate::define('PROPOSTA2-A', function ($usuario) {
            return $usuario->hasPermissao('PROPOSTA2-A');
        });
        Gate::define('PROPOSTA2-E', function ($usuario) {
            return $usuario->hasPermissao('PROPOSTA2-E');
        });
        Gate::define('PROPOSTA2-R', function ($usuario) {
            return $usuario->hasPermissao('PROPOSTA2-R');
        });
        Gate::define('PROPOSTA2-V', function ($usuario) {
            return $usuario->hasPermissao('PROPOSTA2-V');
        });

        // GESTAO DE PROJETOS 2
        Gate::define('PROJETO2-A', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-A');
        });
        Gate::define('PROJETO2-E', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-E');
        });
        Gate::define('PROJETO2-R', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-R');
        });
        Gate::define('PROJETO2-V', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-V');
        });

        // GESTAO DE PROJETOS 2 - DADOS, ifnormações do projeto
        Gate::define('PROJETO2-DADOS-A', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-DADOS-A');
        });
        Gate::define('PROJETO2-DADOS-E', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-DADOS-E');
        });
        Gate::define('PROJETO2-DADOS-R', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-DADOS-R');
        });
        Gate::define('PROJETO2-DADOS-V', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-DADOS-V');
        });

        // GESTAO DE PROJETOS 2 - CLIENTEPF clientes pessoa fisica
        Gate::define('PROJETO2-CLIENTEPF-A', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-CLIENTEPF-A');
        });
        Gate::define('PROJETO2-CLIENTEPF-E', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-CLIENTEPF-E');
        });
        Gate::define('PROJETO2-CLIENTEPF-R', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-CLIENTEPF-R');
        });
        Gate::define('PROJETO2-CLIENTEPF-V', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-CLIENTEPF-V');
        });

        // GESTAO DE PROJETOS 2 - CLIENTEPJ clientes pessoa juridica
        Gate::define('PROJETO2-CLIENTEPJ-A', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-CLIENTEPJ-A');
        });
        Gate::define('PROJETO2-CLIENTEPJ-E', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-CLIENTEPJ-E');
        });
        Gate::define('PROJETO2-CLIENTEPJ-R', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-CLIENTEPJ-R');
        });
        Gate::define('PROJETO2-CLIENTEPJ-V', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-CLIENTEPJ-V');
        });

        // GESTAO DE PROJETOS 2 - ETAPA
        Gate::define('PROJETO2-ETAPA-A', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-ETAPA-A');
        });
        Gate::define('PROJETO2-ETAPA-E', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-ETAPA-E');
        });
        Gate::define('PROJETO2-ETAPA-R', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-ETAPA-R');
        });
        Gate::define('PROJETO2-ETAPA-V', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-ETAPA-V');
        });      
        
        // GESTAO DE PROJETOS 2 - DOCUMENTO
        Gate::define('PROJETO2-DOCUMENTO-A', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-DOCUMENTO-A');
        });
        Gate::define('PROJETO2-DOCUMENTO-E', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-DOCUMENTO-E');
        });
        Gate::define('PROJETO2-DOCUMENTO-R', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-DOCUMENTO-R');
        });
        Gate::define('PROJETO2-DOCUMENTO-V', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-DOCUMENTO-V');
        });           

        // GESTAO DE PROJETOS 2 - DESPESA
        Gate::define('PROJETO2-DESPESA-A', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-DESPESA-A');
        });
        Gate::define('PROJETO2-DESPESA-E', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-DESPESA-E');
        });
        Gate::define('PROJETO2-DESPESA-R', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-DESPESA-R');
        });
        Gate::define('PROJETO2-DESPESA-V', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-DESPESA-V');
        });   

        // GESTAO DE PROJETOS2 - RECEITA
        Gate::define('PROJETO2-RECEITA-A', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-RECEITA-A');
        });
        Gate::define('PROJETO2-RECEITA-E', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-RECEITA-E');
        });
        Gate::define('PROJETO2-RECEITA-R', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-RECEITA-R');
        });
        Gate::define('PROJETO2-RECEITA-V', function ($usuario) {
            return $usuario->hasPermissao('PROJETO2-RECEITA-V');
        });  

        // GESTAO DE PROJETOS2 -VISAO 
        Gate::define('VISUPROJETO2-VISAO-V', function ($usuario) {
            return $usuario->hasPermissao('VISUPROJETO2-VISAO-V');
        });   

        // GESTAO DE PROJETOS2 - RELATORIO CLIENTES
        Gate::define('VISUPROJETO2-RELCLIENTE-V', function ($usuario) {
            return $usuario->hasPermissao('VISUPROJETO2-RELCLIENTE-V');
        });   

        // GESTAO DE PROJETOS2 - RELATORIO DESPESAS - DESATIVADO
        // Gate::define('VISUPROJETO2-RELDESPESA-V', function ($usuario) {
        //     return $usuario->hasPermissao('VISUPROJETO2-RELDESPESA-V');
        // });

        // GESTAO DE PROJETOS2 - RELATORIO RECEITAS
        Gate::define('VISUPROJETO2-RELRECEITA-V', function ($usuario) {
            return $usuario->hasPermissao('VISUPROJETO2-RELRECEITA-V');
        });           
        
        // GESTAO DE PROJETOS2 - RELATORIO RESULTADOS
        Gate::define('VISUPROJETO2-RELRESULTADO-V', function ($usuario) {
            return $usuario->hasPermissao('VISUPROJETO2-RELRESULTADO-V');
        });   
        
        // GESTAO DE DESPESAS 2
        Gate::define('DESPESA2-A', function ($usuario) {
            return $usuario->hasPermissao('DESPESA2-A');
        });
        Gate::define('DESPESA2-E', function ($usuario) {
            return $usuario->hasPermissao('DESPESA2-E');
        });
        Gate::define('DESPESA2-R', function ($usuario) {
            return $usuario->hasPermissao('DESPESA2-R');
        });
        Gate::define('DESPESA2-V', function ($usuario) {
            return $usuario->hasPermissao('DESPESA2-V');
        });

        // // GESTAO DE DESPESA - DADOS, ifnormações
        // Gate::define('DESPESA2-DADOS-A', function ($usuario) {
        //     return $usuario->hasPermissao('DESPESA2-DADOS-A');
        // });
        // Gate::define('DESPESA2-DADOS-E', function ($usuario) {
        //     return $usuario->hasPermissao('DESPESA2-DADOS-E');
        // });
        // Gate::define('DESPESA2-DADOS-R', function ($usuario) {
        //     return $usuario->hasPermissao('DESPESA2-DADOS-R');
        // });
        // Gate::define('DESPESA2-DADOS-V', function ($usuario) {
        //     return $usuario->hasPermissao('DESPESA2-DADOS-V');
        // });

        // GESTAO DE DESPESA - PROJETOS
        Gate::define('DESPESA2-PROJETO-A', function ($usuario) {
            return $usuario->hasPermissao('DESPESA2-PROJETO-A');
        });
        Gate::define('DESPESA2-PROJETO-E', function ($usuario) {
            return $usuario->hasPermissao('DESPESA2-PROJETO-E');
        });
        Gate::define('DESPESA2-PROJETO-R', function ($usuario) {
            return $usuario->hasPermissao('DESPESA2-PROJETO-R');
        });
        Gate::define('DESPESA2-PROJETO-V', function ($usuario) {
            return $usuario->hasPermissao('DESPESA2-PROJETO-V');
        });
        // GESTAO DE DESPESA - RELATORIO DESPESAS
        Gate::define('VISUDESPESA2-REL1-V', function ($usuario) {
            return $usuario->hasPermissao('VISUDESPESA2-REL1-V');
        });   


        // 
        // SISTEMA 3 - SISTEMA MEDICO
        //

        // SISTEMA 3 - DASHBOARD
        Gate::define('VISUDASHBOARD3-V', function ($usuario) {
            return $usuario->hasPermissao('VISUDASHBOARD3-V');
        });

        // SISTEMA 3 - AGENDA
        Gate::define('AGENDA3-A', function ($usuario) {
            return $usuario->hasPermissao('AGENDA3-A');
        });
        Gate::define('AGENDA3-E', function ($usuario) {
            return $usuario->hasPermissao('AGENDA3-E');
        });
        Gate::define('AGENDA3-R', function ($usuario) {
            return $usuario->hasPermissao('AGENDA3-R');
        });
        Gate::define('AGENDA3-V', function ($usuario) {
            return $usuario->hasPermissao('AGENDA3-V');
        });   
        
        // SISTEMA 3 - PRE-CADASTRO3 - FORMULARIO
        Gate::define('PRECADASTRO3-FORMULARIO-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO3-FORMULARIO-A');
        });
        Gate::define('PRECADASTRO3-FORMULARIO-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO3-FORMULARIO-E');
        });
        Gate::define('PRECADASTRO3-FORMULARIO-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO3-FORMULARIO-R');
        });
        Gate::define('PRECADASTRO3-FORMULARIO-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO3-FORMULARIO-V');
        });           

        // SISTEMA 3 - PRE-CADASTRO3 - REMEDIO
        Gate::define('PRECADASTRO3-REMEDIO-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO3-REMEDIO-A');
        });
        Gate::define('PRECADASTRO3-REMEDIO-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO3-REMEDIO-E');
        });
        Gate::define('PRECADASTRO3-REMEDIO-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO3-REMEDIO-R');
        });
        Gate::define('PRECADASTRO3-REMEDIO-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO3-REMEDIO-V');
        });           

        // SISTEMA 3 - PRE-CADASTRO3 - PROFISSIONAL
        Gate::define('PRECADASTRO3-PROFISSIONAL-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO3-PROFISSIONAL-A');
        });
        Gate::define('PRECADASTRO3-PROFISSIONAL-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO3-PROFISSIONAL-E');
        });
        Gate::define('PRECADASTRO3-PROFISSIONAL-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO3-PROFISSIONAL-R');
        });
        Gate::define('PRECADASTRO3-PROFISSIONAL-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO3-PROFISSIONAL-V');
        }); 

        // SISTEMA 3 - CLIENTES
        Gate::define('CLIENTE3-A', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-A');
        });
        Gate::define('CLIENTE3-E', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-E');
        });
        Gate::define('CLIENTE3-R', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-R');
        });
        Gate::define('CLIENTE3-V', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-V');
        });

        // SISTEMA 3 - CLIENTES / DADOS PESSOAIS
        Gate::define('CLIENTE3-DADOS-A', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-DADOS-A');
        });
        Gate::define('CLIENTE3-DADOS-E', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-DADOS-E');
        });
        Gate::define('CLIENTE3-DADOS-R', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-DADOS-R');
        });
        Gate::define('CLIENTE3-DADOS-V', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-DADOS-V');
        });
        // SISTEMA 3 - CLIENTES / FORMULARIO
        Gate::define('CLIENTE3-FORMULARIO-A', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-FORMULARIO-A');
        });
        Gate::define('CLIENTE3-FORMULARIO-E', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-FORMULARIO-E');
        });
        Gate::define('CLIENTE3-FORMULARIO-R', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-FORMULARIO-R');
        });
        Gate::define('CLIENTE3-FORMULARIO-V', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-FORMULARIO-V');
        });
        // SISTEMA 3 - CLIENTES / HISTORICO
        Gate::define('CLIENTE3-HISTORICO-A', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-HISTORICO-A');
        });
        Gate::define('CLIENTE3-HISTORICO-E', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-HISTORICO-E');
        });
        Gate::define('CLIENTE3-HISTORICO-R', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-HISTORICO-R');
        });
        Gate::define('CLIENTE3-HISTORICO-V', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-HISTORICO-V');
        });
        // SISTEMA 3 - CLIENTES / DOCUMENTO
        Gate::define('CLIENTE3-DOCUMENTO-A', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-DOCUMENTO-A');
        });
        Gate::define('CLIENTE3-DOCUMENTO-E', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-DOCUMENTO-E');
        });
        Gate::define('CLIENTE3-DOCUMENTO-R', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-DOCUMENTO-R');
        });
        Gate::define('CLIENTE3-DOCUMENTO-V', function ($usuario) {
            return $usuario->hasPermissao('CLIENTE3-DOCUMENTO-V');
        });
        // SISTEMA 3 - CLIENTES / VISAO GERAL
        Gate::define('VISUCLIENTE3-V', function ($usuario) {
            return $usuario->hasPermissao('VISUCLIENTE3-V');
        });

        // 
        // SISTEMA 4 - SISTEMA VETERINARIO
        //

        // SISTEMA 4 - DASHBOARD
        // Gate::define('VISUDASHBOARD3-V', function ($usuario) {
        //     return $usuario->hasPermissao('VISUDASHBOARD3-V');
        // });

        // SISTEMA 4 - AGENDA
        Gate::define('AGENDA4-A', function ($usuario) {
            return $usuario->hasPermissao('AGENDA4-A');
        });
        Gate::define('AGENDA4-E', function ($usuario) {
            return $usuario->hasPermissao('AGENDA4-E');
        });
        Gate::define('AGENDA4-R', function ($usuario) {
            return $usuario->hasPermissao('AGENDA4-R');
        });
        Gate::define('AGENDA4-V', function ($usuario) {
            return $usuario->hasPermissao('AGENDA4-V');
        });   
        
        // SISTEMA 4 - PRE-CADASTRO (todos)
        Gate::define('PRECADASTRO4-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO4-A');
        });
        Gate::define('PRECADASTRO4-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO4-E');
        });
        Gate::define('PRECADASTRO4-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO4-R');
        });
        Gate::define('PRECADASTRO4-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO4-V');
        });           

        // SISTEMA 4 - PROPRIETARIO
        Gate::define('PROPRIETARIO-A', function ($usuario) {
            return $usuario->hasPermissao('PROPRIETARIO-A');
        });
        Gate::define('PROPRIETARIO-E', function ($usuario) {
            return $usuario->hasPermissao('PROPRIETARIO-E');
        });
        Gate::define('PROPRIETARIO-R', function ($usuario) {
            return $usuario->hasPermissao('PROPRIETARIO-R');
        });
        Gate::define('PROPRIETARIO-V', function ($usuario) {
            return $usuario->hasPermissao('PROPRIETARIO-V');
        });  

        // SISTEMA 4 - ANIMAL
        Gate::define('ANIMAL-A', function ($usuario) {
            return $usuario->hasPermissao('ANIMAL-A');
        });
        Gate::define('ANIMAL-E', function ($usuario) {
            return $usuario->hasPermissao('ANIMAL-E');
        });
        Gate::define('ANIMAL-R', function ($usuario) {
            return $usuario->hasPermissao('ANIMAL-R');
        });
        Gate::define('ANIMAL-V', function ($usuario) {
            return $usuario->hasPermissao('ANIMAL-V');
        });  

        //
        // SISTEMA 5 - GESTAO DE MANUTENCAO DE TREM
        //
        // SISTEMA 5 - PRE-CADASTRO (todos)
        Gate::define('PRECADASTRO5-A', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO5-A');
        });
        Gate::define('PRECADASTRO5-E', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO5-E');
        });
        Gate::define('PRECADASTRO5-R', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO5-R');
        });
        Gate::define('PRECADASTRO5-V', function ($usuario) {
            return $usuario->hasPermissao('PRECADASTRO5-V');
        });     
        // SISTEMA 5 - ARCONDICIONADO
        Gate::define('ARCONDICIONADO-A', function ($usuario) {
            return $usuario->hasPermissao('ARCONDICIONADO-A');
        });
        Gate::define('ARCONDICIONADO-E', function ($usuario) {
            return $usuario->hasPermissao('ARCONDICIONADO-E');
        });
        Gate::define('ARCONDICIONADO-R', function ($usuario) {
            return $usuario->hasPermissao('ARCONDICIONADO-R');
        });
        Gate::define('ARCONDICIONADO-V', function ($usuario) {
            return $usuario->hasPermissao('ARCONDICIONADO-V');
        });     
        
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
