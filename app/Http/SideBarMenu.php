<?php

namespace App\Http;
use Illuminate\Support\Facades\Auth;
use App\A3profissional;

class SideBarMenu
{
  public static function getPrimaryMenu()  {
    $user = Auth::user();
    $sidebarMenu = [];
    $subdomain = explode('.', $_SERVER['HTTP_HOST'])[0];

   
// ===================SISTEMA - 4 - GESTÃO DE CLINICAS VETERINARIAS ===========================================================================================
//

    // inicio    
    $sidebarMenu["itens"][] = ["icon" => "icon-home", "title" => "Inicio", "href" => "/", "helper" => "Inicio"];
    
    // pre-cadastro
    $subItensPreCadastro = [];
    if ($user->can('PRECADASTRO4-A') || $user->can('PRECADASTRO4-E') || $user->can('PRECADASTRO4-R') || $user->can('PRECADASTRO4-V')) {
        $subItensPreCadastro[] = ["title" => "Especie", "href" =>  "aplicativo4/precadastro/especie", "helper" => "Tabela de Espécie"];
        $subItensPreCadastro[] = ["title" => "Raças", "href" =>  "aplicativo4/precadastro/raca", "helper" => "Tabela de Raças"];
        $subItensPreCadastro[] = ["title" => "Pelagem", "href" =>  "aplicativo4/precadastro/pelagem", "helper" => "Tabela de Pelagem"];
        $subItensPreCadastro[] = ["title" => "Vacina", "href" =>  "aplicativo4/precadastro/vacina", "helper" => "Tabela de Vacina"];
        $subItensPreCadastro[] = ["title" => "Patologia", "href" =>  "aplicativo4/precadastro/patologia", "helper" => "Tabela de Patologia"];
    }   
    // monta precadastro
    if (sizeof($subItensPreCadastro) > 0) {
        $sidebarMenu["itens"][] = ["icon" => "icon-pencil-square-o", "title" => "Pre-Cadastro", "href" => "#", "subItens" => $subItensPreCadastro, "helper" => "Informações padrões"];
    }

    // AGENDA 
    $subItensAgenda = [];
    $profissionais = a3profissional::orderBy('nome', 'asc')->get();
    foreach($profissionais as $profissional){
        if ($user->can('AGENDA3-A') || $user->can('AGENDA3-E') || $user->can('AGENDA3-R') || $user->can('AGENDA3-V')) {
            $subItensAgenda[] = ["title" => $profissional->nome, "href" =>  "aplicativo3/calendario/agendaprof/".$profissional->id, "helper" => "Agenda do Profissional"];
        }
    }
    if ($user->can('AGENDA3-A') || $user->can('AGENDA3-E') || $user->can('AGENDA3-R') || $user->can('AGENDA3-V')) {
        $subItensAgenda[] = ["title" => ">> Todos", "href" =>  "aplicativo3/calendario/agendaproftodos", "helper" => "Todos os Profissionais"];
    }
    $subItensAgenda[] = ["title" => ">> agendamento", "href" =>  "aplicativo3/calendario/agendacadastro", "helper" => "Cadastro de Agendamento"];
    if (sizeof($subItensAgenda) > 0) {
        $sidebarMenu["itens"][] = ["icon" => "icon-calendar", "title" => "Agenda", "href" => "#", "subItens" => $subItensAgenda, "helper" => "Agenda dos Profissionais"];
    }
    
    // PROPRIETARIO
    if ($user->can('PROPRIETARIO-A') || $user->can('PROPRIETARIO-E') || $user->can('PROPRIETARIO-R') || $user->can('PROPRIETARIO-V')) {
        $sidebarMenu["itens"][] = ["icon" => "icon-users", "title" => "Proprietários", "href" => "aplicativo4/proprietario/clienteselecao", "helper" => "Gestão de Proprietários"];
    }

    // ANIMAL
    if ($user->can('ANIMAL-A') || $user->can('ANIMAL-E') || $user->can('ANIMAL-R') || $user->can('ANIMAL-V')) {
        $sidebarMenu["itens"][] = ["icon" => "icon-paw", "title" => "Clientes - Pet", "href" => "aplicativo4/animal/clienteselecao", "helper" => "Gestão de CLientes"];
    }

    // $sidebarMenu["itens"][] = ["icon" => "icon-paw", "title" => "TESTE-NOVO", "href" => "aplicativo4/animal/novocliente", "helper" => "Gestão de CLientes"];


    // Configurações - sistema 4
    $subItensConfi3 = [];
    $subItensConfi3[] = ["title" => "Parametros", "href" =>  "/aplicativo3/configuracao/parametro/edit/1","helper" => "Parametros do Sistema"];
    // if ($user->can('USUARIO-A') || $user->can('USUARIO-E') || $user->can('USUARIO-R') || $user->can('USUARIO-V')) {
        $subItensConfi3[] = ["title" => "Usuarios", "href" =>  "aplicativo3/usuarios","helper" => "Cadastro de usuários"];
    // }
    if ($user->can('VISUACESSO-V') ) {
        $subItensConfi3[] = ["title" => "Ver acessos", "href" =>  "aplicativo3/veacesso","helper" => "Acesso de usuarios"];
    }
    // monta configuracoes
    if (sizeof($subItensConfi3) > 0) {
        $sidebarMenu["itens"][] = ["icon" => "icon-gears", "title" => "Configurações", "href" => "#", "subItens" => $subItensConfi3]; //"icon" => "icon-linecons-cog"
    }      
    return $sidebarMenu;

}
// =====================================================================





  public static function getSubMenu($controller) {
    switch($controller) {
        case 'pi':
            return [
                [
                "header" => "Pré Cadastro",
                "itens" => [
                     [
                         "icon" => false,
                         "title" => "Instituição",
                         "href" => "cadastro/pi/instituicao",
                     ],
                     [
                         "icon" => false,
                         "title" => "Centro Acadêmico / Depto",
                         "href" => "cadastro/centro-academico",
                     ],
                     [
                         "icon" => false,
                         "title" => "Pesquisador",
                         "href" => "cadastro/pesquisadores",
                     ],
                     [
                         "icon" => false,
                         "title" => "Redator",
                         "href" => "cadastro/redatores",
                     ],
                     [
                         "icon" => false,
                         "title" => "País",
                         "href" => "cadastro/pais",
                     ],
                     [
                         "icon" => false,
                         "title" => "INPI - Prazo Notificação",
                         "href" => "cadastro/prazo-notificacao",
                     ],
                     [
                         "icon" => false,
                         "title" => "INPI - Valor Serviço",
                         "href" => "cadastro/valor-servico",
                     ],
                 ]
                ],
                [
                "header" => "Análise / Pesquisa",
                "itens" => [
                     [
                         "icon" => false,
                         "title" => "Vencimentos Patentes e Marcas",
                         "href" => "analise/vencimentos-pi",
                     ],
                     [
                         "icon" => false,
                         "title" => "Vencimentos Reivindicações",
                         "href" => "analise/vencimentos-reivindicacoes",
                     ],
                     [
                         "icon" => false,
                         "title" => "Processos em PCT",
                         "href" => "analise/processos-pct",
                    ],
                    [
                        "icon" => false,
                        "title" => "Documentos",
                        "href" => "analise/documentos",
                    ],
                 ]
                ],
            ];
            break;
        case 'tt':
            return [
                [
                "header" => "Pré Cadastro",
                "itens" => [
                    [
                        "icon" => false,
                        "title" => "Empresas",
                        "href" => "cadastro/empresas",
                    ],
                    [
                        "icon" => false,
                        "title" => "Classificação",
                        "href" => "cadastro/classificacao",
                    ],
                ]
                ],
                [
                "header" => "Análise / Pesquisa",
                "itens" => [
                    [
                        "icon" => false,
                        "title" => "Empresas Contatadas",
                        "href" => "analise/empresas-contatadas",
                    ],
                    [
                        "icon" => false,
                        "title" => "Prioridade de Prospecção",
                        "href" => "analise/prioridade-prospeccao",
                    ],
                    [
                        "icon" => false,
                        "title" => "Documentos",
                        "href" => "analise/documentos",
                    ],

                ]
                ],
            ];
            break;
        case 'comunicacao':
            return [
                [
                "header" => "Análise / Pesquisa",
                "itens" => [
                    [
                        "icon" => false,
                        "title" => "Links de Acesso",
                        "href" => "comunicacao/links",
                    ],
                    [
                        "icon" => false,
                        "title" => "Folders",
                        "href" => "comunicacao/folders",
                    ],
                ]
                ],
            ];
            break;
        default:
            return false;
            break;
    }
  }
}
