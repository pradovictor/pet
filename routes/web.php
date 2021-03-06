<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('send_test_email', function(){
	Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
	{
		$message->to('guto.sbim@gmail.com');
	});
});

Route::middleware('auth','primeiroacesso')->group(function(){
    Route::post('/action/uploadfile', 'Action\FileController@upload');
    Route::get('/action/downloadfile/{id}', 'Action\FileController@download');
    Route::get('/action/anexo1downloadfile/{id}', 'Action\FileController@anexo1download');   
    Route::get('/action/projetodocumentodownloadfile/{id}', 'Action\FileController@projetodocumentodownload');   
    Route::get('/action/site/{id}', 'Action\FileController@localsite');
    
    Route::get('/dashboard', 'DashboardController@show');
    Route::get('/demo_dashboard', 'DashboardController@demo_show');
    
    Route::get('sistema/usuarios', 'Sistema\SistemaUsuarioController@list')->name('user.list');
    Route::get('action/sistema/usuario', 'Action\Sistema\ActionSistemaUsuarioController@list');
    Route::post('action/sistema/usuario', 'Action\Sistema\ActionSistemaUsuarioController@save');
    Route::delete('action/sistema/usuario/{id}', 'Action\Sistema\ActionSistemaUsuarioController@delete');

    // --------------------
    // PRE-CADASTRO - rotas
    // --------------------
    //PI-VInculo
    Route::get('/cadastro/pi/vinculo', "Cadastro\PI\CadastroPIVinculoController@list")->name('cadastro-pi-vinculo');
    Route::get('/action/cadastro/pi/vinculo/list', "Action\Cadastro\PI\CadastroPIVinculoController@list");
    Route::get('/action/cadastro/pi/vinculo/{id}', "Action\Cadastro\PI\CadastroPIVinculoController@getById");
    Route::delete('/action/cadastro/pi/vinculo/{id}', "Action\Cadastro\PI\CadastroPIVinculoController@delete");
    Route::post('/action/cadastro/pi/vinculo', "Action\Cadastro\PI\CadastroPIVinculoController@save");

    //PI-Instituicao
    Route::get('/cadastro/pi/instituicao', "Cadastro\PI\CadastroPIInstituicaoController@list")->name('cadastro-pi-instituicao');
    Route::get('/action/cadastro/pi/instituicao/list', "Action\Cadastro\PI\CadastroPIInstituicaoController@list");
    Route::delete('/action/cadastro/pi/instituicao/{id}', "Action\Cadastro\PI\CadastroPIInstituicaoController@delete");
    Route::get('/action/cadastro/pi/instituicao/{id}', "Action\Cadastro\PI\CadastroPIInstituicaoController@getById");
    Route::post('/action/cadastro/pi/instituicao', "Action\Cadastro\PI\CadastroPIInstituicaoController@save");

    //PI-Centro de trabalho
    Route::get('/cadastro/pi/centro', "Cadastro\PI\CadastroPICentroController@list")->name('cadastro-pi-centro');
    Route::get('/action/cadastro/pi/centro/list', "Action\Cadastro\PI\CadastroPICentroController@list");
    Route::delete('/action/cadastro/pi/centro/{id}', "Action\Cadastro\PI\CadastroPICentroController@delete");
    Route::get('/action/cadastro/pi/centro/{id}', "Action\Cadastro\PI\CadastroPICentroController@getById");
    Route::post('/action/cadastro/pi/centro', "Action\Cadastro\PI\CadastroPICentroController@save");

    //PI-Pesquisador URL
    Route::get('/cadastro/pi/pesquisador', "Cadastro\PI\CadastroPIPesquisadorController@list")->name('cadastro-pi-pesquisador');
    Route::get('/cadastro/pi/pesquisador/editar/{id}', "Cadastro\PI\CadastroPIPesquisadorController@edit");
    Route::get('/cadastro/pi/pesquisador/novo', "Cadastro\PI\CadastroPIPesquisadorController@new");
    //PI-Pesquisador ACTIONS
    Route::get('/action/cadastro/pi/pesquisador/list', "Action\Cadastro\PI\CadastroPIPesquisadorController@list");
    Route::get('/action/cadastro/pi/pesquisador/search-not-used-by-pi', "Action\Cadastro\PI\CadastroPIPesquisadorController@searchNotUsedByPI");
    Route::get('/action/cadastro/pi/pesquisador/{id}', "Action\Cadastro\PI\CadastroPIPesquisadorController@getById");
    Route::delete('/action/cadastro/pi/pesquisador/{id}', "Action\Cadastro\PI\CadastroPIPesquisadorController@delete");
    Route::post('/action/cadastro/pi/pesquisador', "Action\Cadastro\PI\CadastroPIPesquisadorController@save");

    //PI-Redator
    Route::get('/cadastro/pi/redator', "Cadastro\PI\CadastroPIRedatorController@list")->name('cadastro-pi-redator');
    Route::get('/action/cadastro/pi/redator/list', "Action\Cadastro\PI\CadastroPIRedatorController@list");
    Route::get('/action/cadastro/pi/redator/{id}', "Action\Cadastro\PI\CadastroPIRedatorController@getById");
    Route::delete('/action/cadastro/pi/redator/{id}', "Action\Cadastro\PI\CadastroPIRedatorController@delete");
    Route::post('/action/cadastro/pi/redator', "Action\Cadastro\PI\CadastroPIRedatorController@save");

    //PI-Pais
    Route::get('/cadastro/pi/pais', "Cadastro\PI\CadastroPIPaisController@list")->name('cadastro-pi-pais');
    Route::get('/action/cadastro/pi/pais/list', "Action\Cadastro\PI\CadastroPIPaisController@list");
    Route::get('/action/cadastro/pi/pais/{id}', "Action\Cadastro\PI\CadastroPIPaisController@getById");
    Route::delete('/action/cadastro/pi/pais/{id}', "Action\Cadastro\PI\CadastroPIPaisController@delete");
    Route::post('/action/cadastro/pi/pais', "Action\Cadastro\PI\CadastroPIPaisController@save");

    //PI-Etapa
    Route::get('/cadastro/pi/etapa', "Cadastro\PI\CadastroPIEtapaController@list")->name('cadastro-pi-etapa');
    Route::get('/action/cadastro/pi/etapa/list', "Action\Cadastro\PI\CadastroPIEtapaController@list");
    Route::get('/action/cadastro/pi/etapa/{id}', "Action\Cadastro\PI\CadastroPIEtapaController@getById");
    Route::delete('/action/cadastro/pi/etapa/{id}', "Action\Cadastro\PI\CadastroPIEtapaController@delete");
    Route::post('/action/cadastro/pi/etapa', "Action\Cadastro\PI\CadastroPIEtapaController@save");


    //INPI-Valor do serviço
//    Route::get('/cadastro/inpi/valor', "Cadastro\INPI\CadastroINPIValorController@list")->name('cadastro-inpi-valor');
//    Route::get('/action/cadastro/inpi/valor/list', "Action\Cadastro\INPI\CadastroINPIValorController@list");
//    Route::get('/action/cadastro/inpi/valor/{id}', "Action\Cadastro\INPI\CadastroINPIValorController@getById");
//    Route::delete('/action/cadastro/inpi/valor/{id}', "Action\Cadastro\INPI\CadastroINPIValorController@delete");
//    Route::post('/action/cadastro/inpi/valor', "Action\Cadastro\INPI\CadastroINPIValorController@save");

    //INPI-Prazo da notificação INPI
    Route::get('/cadastro/inpi/prazo', "Cadastro\INPI\CadastroINPIPrazoController@list")->name('cadastro-inpi-prazo');
    Route::get('/action/cadastro/inpi/prazo/list', "Action\Cadastro\INPI\CadastroINPIPrazoController@list");
    Route::get('/action/cadastro/inpi/prazo/{id}', "Action\Cadastro\INPI\CadastroINPIPrazoController@getById");
    Route::delete('/action/cadastro/inpi/prazo/{id}', "Action\Cadastro\INPI\CadastroINPIPrazoController@delete");
    Route::post ('/action/cadastro/inpi/prazo', "Action\Cadastro\INPI\CadastroINPIPrazoController@save");

    //FI-Responsavel pagamento - respopaga
    Route::get('/cadastro/fi/respopaga', "Cadastro\FI\CadastroFIRespopagaController@list")->name('cadastro-pi-respopaga');
    Route::get('/action/cadastro/fi/respopaga/list', "Action\Cadastro\FI\CadastroFIRespopagaController@list");
    Route::get('/action/cadastro/fi/respopaga/{id}', "Action\Cadastro\FI\CadastroFIRespopagaController@getById");
    Route::delete('/action/cadastro/fi/respopaga/{id}', "Action\Cadastro\FI\CadastroFIRespopagaController@delete");
    Route::post('/action/cadastro/fi/respopaga', "Action\Cadastro\FI\CadastroFIRespopagaController@save");

    //FI-Descricao despesa
    Route::get('/cadastro/fi/descricao_despesa', "Cadastro\FI\CadastroFIDescricao_despesaController@list")->name('cadastro-pi-descricao_despesa');
    Route::get('/action/cadastro/fi/descricao_despesa/list', "Action\Cadastro\FI\CadastroFIDescricao_despesaController@list");
    Route::get('/action/cadastro/fi/descricao_despesa/{id}', "Action\Cadastro\FI\CadastroFIDescricao_despesaController@getById");
    Route::delete('/action/cadastro/fi/descricao_despesa/{id}', "Action\Cadastro\FI\CadastroFIDescricao_despesaController@delete");
    Route::post('/action/cadastro/fi/descricao_despesa', "Action\Cadastro\FI\CadastroFIDescricao_despesaController@save");

    //TT-Empresa URL
    Route::get('/cadastro/tt/empresa', "Cadastro\TT\CadastroTTEmpresaController@list")->name('cadastro-tt-empresa');
    Route::get('/cadastro/tt/empresa/editar/{id}', "Cadastro\TT\CadastroTTEmpresaController@edit");
    Route::get('/cadastro/tt/empresa/novo', "Cadastro\TT\CadastroTTEmpresaController@new");
    //TT-Empresa ACTIONS
    Route::get('/action/cadastro/tt/empresa/list', "Action\Cadastro\TT\CadastroTTEmpresaController@list");
    Route::get('/action/cadastro/tt/empresa/search-not-used-by-tt', "Action\Cadastro\TT\CadastroTTEmpresaController@searchNotUsedByTT");
    Route::get('/action/cadastro/tt/empresa/{id}', "Action\Cadastro\TT\CadastroTTEmpresaController@getById");
    Route::delete('/action/cadastro/tt/empresa/{id}', "Action\Cadastro\TT\CadastroTTEmpresaController@delete");
    Route::post('/action/cadastro/tt/empresa', "Action\Cadastro\TT\CadastroTTEmpresaController@save");

    //TT-Area de atuacao
    Route::get('/cadastro/tt/area', "Cadastro\TT\CadastroTTAreaController@list")->name('cadastro-tt-area');
    Route::get('/action/cadastro/tt/area/list', "Action\Cadastro\TT\CadastroTTAreaController@list");
    Route::get('/action/cadastro/tt/area/{id}', "Action\Cadastro\TT\CadastroTTAreaController@getById");
    Route::delete('/action/cadastro/tt/area/{id}', "Action\Cadastro\TT\CadastroTTAreaController@delete");
    Route::post('/action/cadastro/tt/area', "Action\Cadastro\TT\CadastroTTAreaController@save");
    //--------------------
    // GESTAO DE PROJETOS - NITSYS
    //--------------------
    Route::get('/projeto', "Projeto\ProjetoController@list")->name('projeto');
    Route::get('/action/projeto/projeto', "Action\Projeto\ProjetoController@list");   
    Route::post('/action/projeto/novo', "Action\Projeto\ProjetoController@save");   
    Route::post('/action/projeto/save', "Action\Projeto\ProjetoController@save");
    Route::get('/projeto/selecao/{id}', "Projeto\ProjetoController@viewselecao");
    Route::get('/projeto/editar/{id}', "Projeto\ProjetoController@edit");    
    Route::get('/projeto/visualizar/{id}', "Projeto\ProjetoController@viewprojeto");
    Route::delete('/action/projeto/deleta/{id}', "Action\Projeto\ProjetoController@delete");  

    // Participante (ou pesquisadores)
    Route::get('/projeto/participante/{id}', "Projeto\ProjetoController@listparticipante"); // ver @listpesquisador
    Route::get('/action/projeto/participante/{projetoID}/list/', "Action\Projeto\ProjetoParticipanteController@list");
    Route::delete('/action/projeto/participante/delete/{id}', "Action\Projeto\ProjetoParticipanteController@delete");
    Route::get('/action/projeto/participante/getbyid/{id}', "Action\Projeto\ProjetoParticipanteController@getById");
    Route::post('/action/projeto/participante/save/{projetoid}', "Action\Projeto\ProjetoParticipanteController@save");
    // Empresa
    Route::get('/projeto/empresa/{id}', "Projeto\ProjetoController@listempresa"); 
    Route::get('/action/projeto/empresa/{projetoID}/list/', "Action\Projeto\ProjetoEmpresaController@list");
    Route::delete('/action/projeto/empresa/delete/{id}', "Action\Projeto\ProjetoEmpresaController@delete");
    Route::get('/action/projeto/empresa/getbyid/{id}', "Action\Projeto\ProjetoEmpresaController@getById");
    Route::post('/action/projeto/empresa/save/{projetoid}', "Action\Projeto\ProjetoEmpresaController@save");
    // Instituicao
    Route::get('/projeto/instituicao/{id}', "Projeto\ProjetoController@listinstituicao"); 
    Route::get('/action/projeto/instituicao/{projetoID}/list/', "Action\Projeto\ProjetoInstituicaoController@list");
    Route::delete('/action/projeto/instituicao/delete/{id}', "Action\Projeto\ProjetoInstituicaoController@delete");
    Route::get('/action/projeto/instituicao/getbyid/{id}', "Action\Projeto\ProjetoInstituicaoController@getById");
    Route::post('/action/projeto/instituicao/save/{projetoid}', "Action\Projeto\ProjetoInstituicaoController@save");
    // Parceria
    Route::get('/projeto/parceria/{id}', "Projeto\ProjetoController@listparceria"); 
    Route::get('/action/projeto/parceria/{projetoID}/list/', "Action\Projeto\ProjetoParceriaController@list");
    Route::delete('/action/projeto/parceria/delete/{id}', "Action\Projeto\ProjetoParceriaController@delete");
    Route::get('/action/projeto/parceria/getbyid/{id}', "Action\Projeto\ProjetoParceriaController@getById");
    Route::post('/action/projeto/parceria/save/{projetoid}', "Action\Projeto\ProjetoParceriaController@save");
    // Etapa
   Route::get('/projeto/etapa/{id}', "Projeto\ProjetoController@listetapa"); 
   Route::get('/action/projeto/etapa/{projetoID}/list/', "Action\Projeto\ProjetoEtapaController@list");
   Route::delete('/action/projeto/etapa/delete/{id}', "Action\Projeto\ProjetoEtapaController@delete");
   Route::get('/action/projeto/etapa/getbyid/{id}', "Action\Projeto\ProjetoEtapaController@getById");
   Route::post('/action/projeto/etapa/save/{projetoid}', "Action\Projeto\ProjetoEtapaController@save");
    //  Documentos - Anexos 
    Route::get('/projeto/documento/{id}', "Projeto\ProjetoController@listdocumento");
    Route::get('/action/projeto/documento/{projetoID}/list/', "Action\Projeto\ProjetoDocumentoController@list");    
    Route::get('/action/projeto/documento/visualizar/{id}', "Action\Projeto\ProjetoDocumentoController@getViewById");  
    Route::get('/action/projeto/documento/edit/{id}', "Action\Projeto\ProjetoDocumentoController@getById");
    Route::delete('/action/projeto/documento/delete/{id}', "Action\Projeto\ProjetoDocumentoController@delete");
    Route::post('/action/projeto/documento/save/{piId}', "Action\Projeto\ProjetoDocumentoController@save");    
    // Despesa
    Route::get('/projeto/despesa/{id}', "Projeto\ProjetoController@listdespesa"); 
    Route::get('/action/projeto/despesa/{projetoID}/list/', "Action\Projeto\ProjetoDespesaController@list");
    Route::delete('/action/projeto/despesa/delete/{id}', "Action\Projeto\ProjetoDespesaController@delete");
    Route::get('/action/projeto/despesa/getbyid/{id}', "Action\Projeto\ProjetoDespesaController@getById");
    Route::post('/action/projeto/despesa/save/{projetoid}', "Action\Projeto\ProjetoDespesaController@save");
    // Visao do projeto (dentro de edicao)
    Route::get('/projeto/visao/{id}', "Projeto\ProjetoController@visao");  
    // RELATORIO - VENCIMENTO ETAPA 
    Route::get('/relatorioetapa', "Projeto\ProjetoController@listvencimentoetapa")->name('relatorioetapa');
    Route::get('/action/projeto/vencimento/etapa', "Action\Projeto\RelatorioController@listetapas");  
    // RELATORIO - PARTICIPANTES
    Route::get('/relatorioparticipante', "Projeto\ProjetoController@listrelatorioparticipante")->name('relatorioparticipante');
    Route::get('/action/projeto/relatorio/participante', "Action\Projeto\RelatorioController@listparticipantes");  
    // RELATORIO - INSTITUICOES
    Route::get('/relatorioinstituicao', "Projeto\ProjetoController@listrelatorioinstituicao")->name('relatorioinstituicao');
    Route::get('/action/projeto/relatorio/instituicao', "Action\Projeto\RelatorioController@listinstituicoes");  
    // RELATORIO - EMPRESAS
    Route::get('/relatorioempresa', "Projeto\ProjetoController@listrelatorioempresa")->name('relatorioempresa');
    Route::get('/action/projeto/relatorio/empresa', "Action\Projeto\RelatorioController@listempresas");  
    // RELATORIO - DESPESAS
    Route::get('/relatoriodespesa', "Projeto\ProjetoController@listrelatoriodespesa")->name('relatoriodespesa');
    Route::get('/action/projeto/relatorio/despesa', "Action\Projeto\RelatorioController@listdespesas");  

    //--------------------
    // COMUNICADO DE INVENCAO
    //--------------------
    // Comunicado de invencao - modelo 1 - ITAL
    // selecao e formulario
    Route::get('/ci1', "Comunicadoinvencao\Ci1Controller@list")->name('ci1');
    Route::get('/action/comunicadoinvencao/ci1', "Action\Comunicadoinvencao\Ci1Controller@list");   
    Route::post('/action/ci1/novo', "Action\Comunicadoinvencao\Ci1Controller@save");   
    Route::delete('/action/ci1/deleta/{id}', "Action\Comunicadoinvencao\Ci1Controller@delete");  
    Route::get('/ci1/selecao/{id}', "Comunicadoinvencao\Ci1Controller@viewselecao");
    Route::get('/ci1/editar/{id}', "Comunicadoinvencao\Ci1Controller@edit");
    Route::post('/action/ci1/save', "Action\Comunicadoinvencao\Ci1Controller@save");
    Route::post('/action/ci1/controlesave', "Action\Comunicadoinvencao\Ci1Controller@savecontrole");
    Route::get('/ci1/visualizar/{id}', "Comunicadoinvencao\Ci1Controller@viewcomunicado");
    // Pesquisadores
    Route::get('/ci1/pesquisador/{id}', "Comunicadoinvencao\Ci1Controller@listpesquisador");
    Route::get('/action/comunicadoinvencao/pesquisador/{ci1ID}/list/', "Action\Comunicadoinvencao\Ci1PesquisadorController@list");
    Route::delete('/action/comunicadoinvencao/pesquisador/delete/{id}', "Action\Comunicadoinvencao\Ci1PesquisadorController@delete");
    Route::get('/action/comunicadoinvencao/pesquisador/getbyid/{id}', "Action\Comunicadoinvencao\Ci1PesquisadorController@getById");
    Route::post('/action/comunicadoinvencao/pesquisador/save/{ci1id}', "Action\Comunicadoinvencao\Ci1PesquisadorController@save");
    //  Anexos (1)
    Route::get('/ci1/anexo1/{id}', "Comunicadoinvencao\Ci1Controller@anexo1");
    Route::get('/action/comunicadoinvencao/anexo1/{ci1ID}/anexo1/list/', "Action\Comunicadoinvencao\Ci1Anexo1Controller@list");    
    Route::get('/action/comunicadoinvencao/anexo1/visualizar/{id}', "Action\Comunicadoinvencao\Ci1Anexo1Controller@getViewById");  
    Route::get('/action/comunicadoinvencao/anexo1/edit/{id}', "Action\Comunicadoinvencao\Ci1Anexo1Controller@getById");
    Route::delete('/action/comunicadoinvencao/anexo1/delete/{id}', "Action\Comunicadoinvencao\Ci1Anexo1Controller@delete");
    Route::post('/action/comunicadoinvencao/anexo1/save/{piId}', "Action\Comunicadoinvencao\Ci1Anexo1Controller@save");    
    //  Controle (1)
    Route::get('/ci1/controle/{id}', "Comunicadoinvencao\Ci1Controller@controle");
    Route::get('/ci1/historico/{id}', "Comunicadoinvencao\Ci1Controller@historico");
    Route::post('/ci1/addgetec', "Action\Comunicadoinvencao\Ci1Controller@addgetec");
    // visualizacoes da gestao de tecnologia - tab PI
    Route::get('/ci1/piview/{id}', "Comunicadoinvencao\Ci1Controller@ci1piview");

    // ------------------
    // TECNOLOGIA - rotas
    // ------------------
    //TECNOOGIA PI URL
    Route::get('/tecnologia/pi', "Tecnologia\PI\TecnologiaPIController@list")->name('tecnologia-pi');
    Route::get('/tecnologia/pi/editar/{id}', "Tecnologia\PI\TecnologiaPIController@edit");
    Route::get('/tecnologia/pi/visualizar/{id}', "Tecnologia\PI\TecnologiaPIController@view");
    Route::get('/tecnologia/pi/novo', "Tecnologia\PI\TecnologiaPIController@new");
    //TECNOLOGIA PI ACTIONS
    Route::get('/action/tecnologia/pi/list', "Action\Tecnologia\TecnologiaController@list");
    Route::get('/action/tecnologia/pi/{id}', "Action\Tecnologia\TecnologiaController@getById");
    Route::delete('/action/tecnologia/pi/{id}', "Action\Tecnologia\TecnologiaController@delete");
    Route::post('/action/tecnologia/save', "Action\Tecnologia\TecnologiaController@save");
    // TECNOLOGIA PI TABS CONTENT    
    Route::get('/action/tecnologia/pi/{id}/tab/{tab}', "Action\Tecnologia\PI\TecnologiaPITabController@getContent");
 
    //TECNOLOGIA PI INFORMAÇÕES GERAIS
    Route::post('/action/tecnologia/pi/info', "Action\Tecnologia\PI\TecnologiaPITabInfoController@save");
    //  TECNOLOGIA PI TITULARIDADE
    Route::get('/action/tecnologia/pi/{piID}/titularidade/list/', "Action\Tecnologia\PI\TecnologiaPITabTitularidadeController@list");
    Route::get('/action/tecnologia/pi/titularidade/visualizar/{id}', "Action\Tecnologia\PI\TecnologiaPITabTitularidadeController@getViewById");    
    Route::get('/action/tecnologia/pi/titularidade/{id}', "Action\Tecnologia\PI\TecnologiaPITabTitularidadeController@getById");
    Route::delete('/action/tecnologia/pi/titularidade/{id}', "Action\Tecnologia\PI\TecnologiaPITabTitularidadeController@delete");
    Route::post('/action/tecnologia/pi/titularidade/{piId}', "Action\Tecnologia\PI\TecnologiaPITabTitularidadeController@save");
    // TECNOLOGIA PI PESQUISADOR
    Route::get('/action/tecnologia/pi/{piID}/pesquisador/list/', "Action\Tecnologia\PI\TecnologiaPITabPesquisadorController@list"); //Listagem pesquisadores para datatables 
    Route::get('/action/tecnologia/pi/pesquisador/{id}', "Action\Tecnologia\PI\TecnologiaPITabPesquisadorController@getById"); //Pega os dados do PIPesquisador para edição
    Route::delete('/action/tecnologia/pi/pesquisador/{id}', "Action\Tecnologia\PI\TecnologiaPITabPesquisadorController@delete"); // Delete um PIPesquisador especifico via ID
    Route::get('/action/tecnologia/pi/pesquisador/visualizar/{id}', "Action\Tecnologia\PI\TecnologiaPITabPesquisadorController@getViewById");
    // Route::post('/action/tecnologia/pi/pesquisador', "Action\Tecnologia\PI\TecnologiaPITabPesquisadorController@save"); // Save de edição do PIPesquisador
    Route::post('/action/tecnologia/pi/pesquisador/{piId}', "Action\Tecnologia\PI\TecnologiaPITabPesquisadorController@save"); //Adição de um novo PIPesquisador
    // TECNOLOGIA PI REGISTRO
    Route::get('/action/tecnologia/pi/{piID}/registro/list/', "Action\Tecnologia\PI\TecnologiaPITabRegistroController@list");
    Route::get('/action/tecnologia/pi/registro/visualizar/{id}', "Action\Tecnologia\PI\TecnologiaPITabRegistroController@getViewById");
    Route::get('/action/tecnologia/pi/registro/{id}', "Action\Tecnologia\PI\TecnologiaPITabRegistroController@getById");
    Route::delete('/action/tecnologia/pi/registro/{id}', "Action\Tecnologia\PI\TecnologiaPITabRegistroController@delete");
    Route::post('/action/tecnologia/pi/registro/{piId}', "Action\Tecnologia\PI\TecnologiaPITabRegistroController@save");
    // TECNOLOGIA PI FOMENTO
    Route::get('/action/tecnologia/pi/{piID}/fomento/list/', "Action\Tecnologia\PI\TecnologiaPITabFomentoController@list");
    Route::get('/action/tecnologia/pi/fomento/{id}', "Action\Tecnologia\PI\TecnologiaPITabFomentoController@getById");
    Route::delete('/action/tecnologia/pi/fomento/{id}', "Action\Tecnologia\PI\TecnologiaPITabFomentoController@delete");
    Route::post('/action/tecnologia/pi/fomento/{piId}', "Action\Tecnologia\PI\TecnologiaPITabFomentoController@save");
    // TECNOLOGIA PI RPI
    Route::get('/action/tecnologia/pi/{piID}/rpi/list/', "Action\Tecnologia\PI\TecnologiaPITabRpiController@list");
    //TECNOLOGIA PI ANOTACOES
    Route::post('/action/tecnologia/pi/historico', "Action\Tecnologia\PI\TecnologiaPITabHistoricoController@save");
    
    //TECNOOGIA TT URL
    Route::get('/tecnologia/tt', "Tecnologia\TT\TecnologiaTTController@list")->name('tecnologia-tt');
    Route::get('/tecnologia/tt/editar/{id}', "Tecnologia\TT\TecnologiaTTController@edit");
    //TECNOLOGIA TT ACTIONS
    Route::get('/action/tecnologia/tt/list', "Action\Tecnologia\TT\TecnologiaTTController@list");
    Route::get('/action/tecnologia/tt/{id}', "Action\Tecnologia\TT\TecnologiaTTController@getById");
    Route::delete('/action/tecnologia/tt/{id}', "Action\Tecnologia\TT\TecnologiaTTController@delete");
    Route::post('/action/tecnologia/tt', "Action\Tecnologia\PI\TecnologiaTTController@save");
    // TECNOLOGIA TT TABS CONTENT    
    Route::get('/action/tecnologia/tt/{id}/tab/{tab}', "Action\Tecnologia\TT\TecnologiaTTTabController@getContent");
    //TECNOLOGIA TT TECNOLOGIA
    Route::post('/action/tecnologia/tt/tec', "Action\Tecnologia\TT\TecnologiaTTTabTecController@save");
    //  TECNOLOGIA TT AREA
    Route::get('/action/tecnologia/tt/{piID}/area/list/', "Action\Tecnologia\TT\TecnologiaTTTabAreaController@list");
    Route::get('/action/tecnologia/tt/area/visualizar/{id}', "Action\Tecnologia\TT\TecnologiaTTTabAreaController@getViewById");    
    Route::get('/action/tecnologia/tt/area/{id}', "Action\Tecnologia\TT\TecnologiaTTTabAreaController@getById");
    Route::delete('/action/tecnologia/tt/area/{id}', "Action\Tecnologia\TT\TecnologiaTTTabAreaController@delete");
    Route::post('/action/tecnologia/tt/area/{piId}', "Action\Tecnologia\TT\TecnologiaTTTabAreaController@save");
    //  TECNOLOGIA TT EMPRESA
    Route::get('/action/tecnologia/tt/{piID}/empresa/list/', "Action\Tecnologia\TT\TecnologiaTTTabEmpresaController@list");
    Route::get('/action/tecnologia/tt/empresa/visualizar/{id}', "Action\Tecnologia\TT\TecnologiaTTTabEmpresaController@getViewById");    
    Route::get('/action/tecnologia/tt/empresa/{id}', "Action\Tecnologia\TT\TecnologiaTTTabEmpresaController@getById");
    Route::delete('/action/tecnologia/tt/empresa/{id}', "Action\Tecnologia\TT\TecnologiaTTTabEmpresaController@delete");
    Route::post('/action/tecnologia/tt/empresa/{piId}', "Action\Tecnologia\TT\TecnologiaTTTabEmpresaController@save");
    // Route::post('/action/tecnologia/tt/add-empresa/{piId}', "Action\Tecnologia\TT\TecnologiaTTTabEmpresaController@add"); //Adição de um novo empresa
    //  TECNOLOGIA TT LICENCIAMENTO
    Route::get('/action/tecnologia/tt/{ttID}/licenciamento/list/', "Action\Tecnologia\TT\TecnologiaTTTabLicenciamentoController@list");
    Route::get('/action/tecnologia/tt/licenciamento/visualizar/{id}', "Action\Tecnologia\TT\TecnologiaTTTabLicenciamentoController@getViewById");    
    Route::get('/action/tecnologia/tt/licenciamento/{id}', "Action\Tecnologia\TT\TecnologiaTTTabLicenciamentoController@getById");
    Route::delete('/action/tecnologia/tt/licenciamento/{id}', "Action\Tecnologia\TT\TecnologiaTTTabLicenciamentoController@delete");
    Route::post('/action/tecnologia/tt/licenciamento/{piId}', "Action\Tecnologia\TT\TecnologiaTTTablicenciamentoController@save");

    //  TECNOLOGIA TT CONTROLE
    Route::get('/action/tecnologia/tt/{ttID}/controle/list/', "Action\Tecnologia\TT\TecnologiaTTTabControleController@list");
    Route::get('/action/tecnologia/tt/controle/visualizar/{id}', "Action\Tecnologia\TT\TecnologiaTTTabControleController@getViewById");    
    Route::get('/action/tecnologia/tt/controle/{id}', "Action\Tecnologia\TT\TecnologiaTTTabControleController@getById");
    Route::delete('/action/tecnologia/tt/controle/{id}', "Action\Tecnologia\TT\TecnologiaTTTabControleController@delete");
    Route::post('/action/tecnologia/tt/controle/{piId}', "Action\Tecnologia\TT\TecnologiaTTTabControleController@save");
    // TECNOLOGIA TT FINANCEIRO
    Route::get('/action/tecnologia/tt/{ttID}/financeiro/list/', "Action\Tecnologia\TT\TecnologiaTTTabFinanceiroController@list");

    // TECNOLOGIA COMUNICACAO TABS CONTENT    
    Route::get('/action/tecnologia/co/{id}/tab/{tab}', "Action\Tecnologia\CO\TecnologiaCOTabController@getContent");

    //  TECNOLOGIA COMUNICAO LINK
    Route::get('/action/tecnologia/co/{piID}/link/list/', "Action\Tecnologia\CO\TecnologiaCOTabLinkController@list");
    Route::get('/action/tecnologia/co/link/visualizar/{id}', "Action\Tecnologia\CO\TecnologiaCOTabLinkController@getViewById");  
    Route::get('/action/tecnologia/co/link/{id}', "Action\Tecnologia\CO\TecnologiaCOTabLinkController@getById");
    Route::delete('/action/tecnologia/co/link/{id}', "Action\Tecnologia\CO\TecnologiaCOTabLinkController@delete");
    Route::post('/action/tecnologia/co/link/{piId}', "Action\Tecnologia\CO\TecnologiaCOTabLinkController@save");

    // TECNOLOGIA DOCUMENTO TABS CONTENT    
    Route::get('/action/tecnologia/documento/{id}/tab/{tab}', "Action\Tecnologia\Documento\TecnologiaDocumentoTabController@getContent");

    //  TECNOLOGIA DOCUMENTO - DOCUMENTO (INFORMACOES)
    Route::get('/action/tecnologia/documento/{piID}/documento/list/', "Action\Tecnologia\Documento\TecnologiaDocumentoTabDocumentoController@list");    
    Route::get('/action/tecnologia/documento/documento/visualizar/{id}', "Action\Tecnologia\Documento\TecnologiaDocumentoTabDocumentoController@getViewById");  
    Route::get('/action/tecnologia/documento/documento/{id}', "Action\Tecnologia\Documento\TecnologiaDocumentoTabDocumentoController@getById");
    Route::delete('/action/tecnologia/documento/documento/{id}', "Action\Tecnologia\Documento\TecnologiaDocumentoTabDocumentoController@delete");
    Route::post('/action/tecnologia/documento/documento/{piId}', "Action\Tecnologia\Documento\TecnologiaDocumentoTabDocumentoController@save");    

    // TECNOLOGIA ETAPA TABS CONTENT    
    Route::get('/action/tecnologia/etapa/{id}/tab/{tab}', "Action\Tecnologia\Etapa\TecnologiaEtapaTabController@getContent");

    //  TECNOLOGIA ETAPA (INFORMACOES)
    Route::get('/action/tecnologia/etapa/{piID}/list/', "Action\Tecnologia\Etapa\TecnologiaEtapaTabEtapaController@list");
    Route::get('/action/tecnologia/etapa/visualizar/{id}', "Action\Tecnologia\Etapa\TecnologiaEtapaTabEtapaController@getViewById");  
    Route::get('/action/tecnologia/etapa/edita/{id}', "Action\Tecnologia\Etapa\TecnologiaEtapaTabEtapaController@getById");
    Route::delete('/action/tecnologia/etapa/deleta/{id}', "Action\Tecnologia\Etapa\TecnologiaEtapaTabEtapaController@delete");
    Route::post('/action/tecnologia/etapa/salva/{piId}', "Action\Tecnologia\Etapa\TecnologiaEtapaTabEtapaController@save");    

    // TECNOLOGIA FINANCEIRO TABS CONTENT    
    Route::get('/action/tecnologia/financeiro/{id}/tab/{tab}', "Action\Tecnologia\Financeiro\TecnologiaFinanceiroTabController@getContent");

    //  TECNOLOGIA FINANCEIRO - DESPESA (INFORMACOES)
    Route::get('/action/tecnologia/financeiro/{piID}/despesa/list/', "Action\Tecnologia\Financeiro\TecnologiaFinanceiroTabDespesaController@list");
    Route::get('/action/tecnologia/financeiro/despesa/visualizar/{id}', "Action\Tecnologia\Financeiro\TecnologiaFinanceiroTabDespesaController@getViewById");  
    Route::get('/action/tecnologia/financeiro/despesa/{id}', "Action\Tecnologia\Financeiro\TecnologiaFinanceiroTabDespesaController@getById");
    Route::delete('/action/tecnologia/financeiro/despesa/{id}', "Action\Tecnologia\Financeiro\TecnologiaFinanceiroTabDespesaController@delete");
    Route::post('/action/tecnologia/financeiro/despesa/{piId}', "Action\Tecnologia\Financeiro\TecnologiaFinanceiroTabDespesaController@save");    

    // outros
    Route::get('/action/tecnologia/{id}/{conteudo}', "Action\Tecnologia\TecnologiaContentController@getContent");
    Route::get('/', 'HomeController@show')->name('home');

    // ---------------
    // REPASSE - rotas
    // ---------------
    //REPASSE URL
    Route::get('/repasse', "Repasse\RepasseController@list")->name('repasse');
    Route::get('/repasse/editar/{id}', "Repasse\RepasseController@edit");
    Route::get('/xxrepasse/xxvisualizar/{id}', "Repasse\RepasseController@repasseView");

    // AUTOCOMPLETE - LISTAGEM DE TECNOLOGIA - REPASSE
    Route::get('/action/repasse/listtecrep', "Action\Repasse\RepasseController@listtecrep");

    //REPASSE ACTIONS
    Route::get('/action/repasse/list', "Action\Repasse\RepasseController@list");
    Route::get('/action/repasse/{id}', "Action\Repasse\RepasseController@getById");
    Route::delete('/action/repasse/{id}', "Action\Repasse\RepasseController@delete");
    Route::post('/action/repasse/save', "Action\Repasse\RepasseController@save");
    Route::get('/action/repasse/view/{id}', "Action\Repasse\RepasseController@getViewById");

    // REPASSE TECNOLOGIA ACTIONS
    Route::get('/action/repasse/tecnologialist/{id}', "Action\Repasse\RepasseController@getTecnologiasById");
    Route::get('/action/repasse/editartecnologia/{id}', "Action\Repasse\RepasseController@getTecnologiaById");
    Route::post('/action/repasse/savepi', "Action\Repasse\RepasseController@savepi");
    Route::get('/action/repasse/repasseteclist/{id}', "Action\Repasse\RepasseController@repasseteclist");
    Route::delete('/action/repasse/deletetecnologia/{id}', "Action\Repasse\RepasseController@deletetecnologia");

    Route::post('/action/repasse/addtecrep', "Action\Repasse\RepasseController@addtecrep");
    

    // REPASSE PESQUISADORES ACTIONS
    Route::get('/action/repasse/pesquisadorlist/{id}', "Action\Repasse\RepasseController@getPesquisadoresById");
    Route::delete('/action/repasse/deletepesquisador/{id}', "Action\Repasse\RepasseController@deletepesquisador");

    // REPASSE PARCERIA ACTIONS
    Route::get('/action/repasse/parcerialist/{id}', "Action\Repasse\RepasseController@getParceriasById");
    Route::get('/action/repasse/despesalist/{id}', "Action\Repasse\RepasseController@getDespesasById");

    // REPASSE DESPESA ACTIONS (limpa repasse_pi_id)
    Route::delete('/action/repasse/despesarepasse/{id}', "Action\Repasse\RepasseController@deletedespesa");
    Route::get('/action/repasse/despesateclist/{repassePiID}', "Action\Repasse\RepasseController@despesateclist");
    Route::post('/action/repasse/savedespesa', "Action\Repasse\RepasseController@savedespesa");

    // -----------------
    // INPI - REVISTA RPI / PRAZO VENCIMENTO
    // -----------------

    //REVISTA RPI
    Route::get('/inpirpi', "Inpi\RevistarpiController@list")->name('revistarpi');
    Route::get('/action/inpi/list', "Action\Inpi\RevistarpiController@list");
    // filtro proximas notificações
    Route::get('/action/inpi/listfiltrorpi', "Action\Inpi\RevistarpiController@listfiltrorpi"); 
    
    Route::get('/action/inpi/{id}', "Action\Inpi\RevistarpiController@getById");
    Route::delete('/action/inpi/{id}', "Action\Inpi\RevistarpiController@delete");
    Route::post('/action/inpi', "Action\Inpi\RevistarpiController@save");
    // save item revista rpi
    Route::post('/action/inpi/leiturarpi', "Action\Inpi\RevistarpiController@leiturarpi");
    Route::get('/action/inpi/visualizar/{id}', "Action\Inpi\RevistarpiController@getViewById");    
    
    
    // VENCIMENTO REVISTA RPI
    Route::get('/vencimentorpi', "Inpi\VencimentorpiController@list")->name('vencimentorpi');
    // Route::get('/action/inpi/xlistvencimento', "Action\Inpi\VencimentorpiController@xlistvencimento");
    
    // VENCIMENTO PATENTES
    Route::get('/vencimentopatente', "Inpi\VencimentopatenteController@list")->name('vencimentopatente');
    Route::get('/action/vencimento/patente', "Action\Inpi\VencimentopatenteController@list");

    // VENCIMENTO EXAME TECNICO PATENTES
    Route::get('/exame', "Inpi\ExameController@list")->name('exame');
    Route::get('/action/exame', "Action\Inpi\ExameController@list");

    // -------------
    // INFORMACÕES
    // ------------

    // Tecnologias - soemnte as liberadas p visualizacao > visualizacao=sim 
    Route::get('/infotecnologia', "Informacao\InfotecnologiaController@list")->name('infotecnologia');
    Route::get('/action/informacao/infotecnologia', "Action\Informacao\InfotecnologiaController@list");
    Route::get('/infotecnologia/visualizar/{id}', "Informacao\InfotecnologiaController@view");

    // Registros
    Route::get('/inforegistro', "Informacao\InforegistroController@list")->name('inforegistro');
    Route::get('/action/informacao/inforegistro', "Action\Informacao\InforegistroController@list");

    // Pesquisadores
    Route::get('/infopesquisador', "Informacao\InfopesquisadorController@list")->name('infopesquisador');
    Route::get('/action/informacao/infopesquisador', "Action\Informacao\InfopesquisadorController@list");

    // Licenciamentos
    Route::get('/infolicenciamento', "Informacao\InfolicenciamentoController@list")->name('infolicenciamento');
    Route::get('/action/informacao/infolicenciamento', "Action\Informacao\InfolicenciamentoController@list");

    // Pontos de  controle
    Route::get('/infopontocontrole', "Informacao\InfopontocontroleController@list")->name('infopontocontrole');
    Route::get('/action/informacao/infopontocontrole', "Action\Informacao\InfopontocontroleController@list");
   
    //--------------------
    // AREA DO PESQUISADOR
    //--------------------
    // Pesquisador TECNOLOGIA
    Route::get('/pesquisadortecnologia', "Areapesquisador\PesquisadortecnologiaController@list")->name('pesquisadortecnologia');
    Route::get('/action/areapesquisador/pesquisadortecnologia', "Action\Areapesquisador\PesquisadortecnologiaController@list");        
    Route::get('/pesquisadortecnologia/visualizar/{id}', "Areapesquisador\PesquisadortecnologiaController@viewselecao");
    Route::get('/pesquisadortecnologia/informacao/{id}', "Areapesquisador\PesquisadortecnologiaController@viewinformacao");
    Route::get('/pesquisadortecnologia/documento/{id}', "Areapesquisador\PesquisadortecnologiaController@listdocumento");    

    // -------------
    // CONFIGURACOES
    // -------------

    // Clientes
    Route::get('/cliente', "Configuracao\ClienteController@list")->name('cliente');
    Route::get('/action/configuracao/cliente/list', "Action\Configuracao\ClienteController@list");
    Route::get('/action/configuracao/cliente/edit/{id}', "Action\Configuracao\ClienteController@getById");
    Route::delete('/action/configuracao/cliente/{id}', "Action\Configuracao\ClienteController@delete");
    Route::post('/action/configuracao/cliente/save', "Action\Configuracao\ClienteController@save");    

    // Usuarios
    Route::get('/usuarios', "Configuracao\UsuarioController@list")->name('usuarios');
    Route::get('/configuracao/usuarios/edit/{id}', "Configuracao\UsuarioController@edit");
    Route::get('/configuracao/usuarios/novo', "Configuracao\UsuarioController@new");

    Route::get('/action/configuracao/usuarios/list', "Action\Configuracao\UsuarioController@list");
    Route::delete('/action/configuracao/usuarios/{id}', "Action\Configuracao\UsuarioController@delete");
    Route::post('/action/configuracao/usuarios/save', "Action\Configuracao\UsuarioController@save");    

    // usuarios-permissoes
    // Route::get('/action/configuracao/usuarios/nits/permissoes', "Action\Configuracao\UsuarioController@listUsuarioNitPermissoes");
    // Permissoes
    Route::get('/permissao', "Configuracao\PermissaoController@list")->name('permissao');
    Route::get('/action/configuracao/permissao/list', "Action\Configuracao\PermissaoController@list");
    Route::get('/action/configuracao/permissao/edit/{id}', "Action\Configuracao\PermissaoController@getById");
    Route::delete('/action/configuracao/permissao/{id}', "Action\Configuracao\PermissaoController@delete");
    Route::post('/action/configuracao/permissao/save', "Action\Configuracao\PermissaoController@save");   

    // Nits
    Route::get('/nit', "Configuracao\NitController@list")->name('nit');
    Route::get('/action/configuracao/nit/list', "Action\Configuracao\NitController@list");
    Route::get('/action/configuracao/nit/edit/{id}', "Action\Configuracao\NitController@getById");
    Route::delete('/action/configuracao/nit/{id}', "Action\Configuracao\NitController@delete");
    Route::post('/action/configuracao/nit/save', "Action\Configuracao\NitController@save");   

    // Grupo
    Route::get('/grupo', "Configuracao\GrupoController@list")->name('grupo');
    Route::get('/action/configuracao/grupo/list', "Action\Configuracao\GrupoController@list");
    Route::get('/action/configuracao/grupo/edit/{id}', "Action\Configuracao\GrupoController@getById");
    Route::delete('/action/configuracao/grupo/{id}', "Action\Configuracao\GrupoController@delete");
    Route::post('/action/configuracao/grupo/save', "Action\Configuracao\GrupoController@save"); 
    
    // Acesso de usuarios
    Route::get('/veacesso', "Configuracao\VeacessoController@list")->name('veacesso');
    Route::get('/action/configuracao/veacesso', "Action\Configuracao\VeacessoController@list");

    //
    // ****************************************************************************************
    // *** SISTEMA 2 
    // *** SISTEMA DE GESTÇAO DE PROEJTOS - ENGENHARIA (utilizado empresa - sciel/ hcm / domarquitetura/ parqtec / oraljet / projeto)
    // ****************************************************************************************

    // dashboard
    Route::get('/aplicativo2/dashboard', 'Aplicativo2\dashboard\DashboardController@show');
    Route::get('/aplicativo2/dashboardproposta', 'Aplicativo2\dashboard\DashboardController@showproposta');
    

    // Pre-cadastro2 - a2condicao > condicao, usado no centro de custo
    Route::get('/aplicativo2/precadastro/condicao', "Aplicativo2\precadastro\CondicaoController@list")->name('aplicativo2/precadastro/condicao');
    Route::get('/action/aplicativo2/precadastro/condicao/list', "Action\Aplicativo2\Precadastro\CondicaoController@list");
    Route::get('/action/aplicativo2/precadastro/condicao/editar/{id}', "Action\Aplicativo2\Precadastro\CondicaoController@getById");
    Route::delete('/action/aplicativo2/precadastro/condicao/delete/{id}', "Action\Aplicativo2\Precadastro\CondicaoController@delete");
    Route::post('/action/aplicativo2/precadastro/condicao', "Action\Aplicativo2\Precadastro\CondicaoController@save");

    // Pre-cadastro2 - a2rateio > rateio , usado no centro de custo
    Route::get('/aplicativo2/precadastro/rateio', "Aplicativo2\precadastro\RateioController@list")->name('aplicativo2/precadastro/rateio');
    Route::get('/action/aplicativo2/precadastro/rateio/list', "Action\Aplicativo2\Precadastro\RateioController@list");
    Route::get('/action/aplicativo2/precadastro/rateio/editar/{id}', "Action\Aplicativo2\Precadastro\RateioController@getById");
    Route::delete('/action/aplicativo2/precadastro/rateio/delete/{id}', "Action\Aplicativo2\Precadastro\RateioController@delete");
    Route::post('/action/aplicativo2/precadastro/rateio', "Action\Aplicativo2\Precadastro\RateioController@save");

    // Pre-cadastro2 - a2centrodecusto 
    Route::get('/aplicativo2/precadastro/centrodecusto', "Aplicativo2\precadastro\CentrodecustoController@list")->name('aplicativo2/precadastro/centrodecusto');
    Route::get('/action/aplicativo2/precadastro/centrodecusto/list', "Action\Aplicativo2\Precadastro\CentrodecustoController@list");
    Route::get('/action/aplicativo2/precadastro/centrodecusto/editar/{id}', "Action\Aplicativo2\Precadastro\CentrodecustoController@getById");
    Route::delete('/action/aplicativo2/precadastro/centrodecusto/delete/{id}', "Action\Aplicativo2\Precadastro\CentrodecustoController@delete");
    Route::post('/action/aplicativo2/precadastro/centrodecusto', "Action\Aplicativo2\Precadastro\CentrodecustoController@save");

    // Pre-cadastro2 - a2categoria 
    Route::get('/aplicativo2/precadastro/categoria', "Aplicativo2\precadastro\CategoriaController@list")->name('aplicativo2/precadastro/categoria');
    Route::get('/action/aplicativo2/precadastro/categoria/list', "Action\Aplicativo2\Precadastro\CategoriaController@list");
    Route::get('/action/aplicativo2/precadastro/categoria/editar/{id}', "Action\Aplicativo2\Precadastro\CategoriaController@getById");
    Route::delete('/action/aplicativo2/precadastro/categoria/delete/{id}', "Action\Aplicativo2\Precadastro\CategoriaController@delete");
    Route::post('/action/aplicativo2/precadastro/categoria', "Action\Aplicativo2\Precadastro\CategoriaController@save");

    // Pre-cadastro2 - a2fontepagadora 
    Route::get('/aplicativo2/precadastro/fontepagadora', "Aplicativo2\precadastro\FontepagadoraController@list")->name('aplicativo2/precadastro/fontepagadora');
    Route::get('/action/aplicativo2/precadastro/fontepagadora/list', "Action\Aplicativo2\Precadastro\FontepagadoraController@list");
    Route::get('/action/aplicativo2/precadastro/fontepagadora/editar/{id}', "Action\Aplicativo2\Precadastro\FontepagadoraController@getById");
    Route::delete('/action/aplicativo2/precadastro/fontepagadora/delete/{id}', "Action\Aplicativo2\Precadastro\FontepagadoraController@delete");
    Route::post('/action/aplicativo2/precadastro/fontepagadora', "Action\Aplicativo2\Precadastro\FontepagadoraController@save");

    // aplicativo 2 - Cliente - pessoa fisica 
    Route::get('/aplicativo2/clientepf', "Aplicativo2\cliente\ClientepfController@list")->name('aplicativo2/clientepf');
    Route::get('/action/aplicativo2/cliente/clientepf/list', "Action\Aplicativo2\Cliente\ClientepfController@list");  
    Route::get('/aplicativo2/cliente/clientepf/editar/{id}', "Aplicativo2\cliente\ClientepfController@edit");
    Route::post('/action/aplicativo2/cliente/clientepf/save', "Action\Aplicativo2\Cliente\ClientepfController@save");
    Route::delete('/action/aplicativo2/cliente/clientepf/delete/{id}', "Action\Aplicativo2\Cliente\ClientepfController@delete");
    Route::get('/aplicativo2/cliente/clientepf/novo', "Aplicativo2\cliente\ClientepfController@new");

    // aplicativo 2 - Cliente - pessoa juridica (empresa) 
    Route::get('/aplicativo2/clientepj', "Aplicativo2\cliente\ClientepjController@list")->name('aplicativo2/clientepj');
    Route::get('/action/aplicativo2/cliente/clientepj/list', "Action\Aplicativo2\Cliente\ClientepjController@list");  
    Route::get('/aplicativo2/cliente/clientepj/editar/{id}', "Aplicativo2\cliente\ClientepjController@edit");
    Route::post('/action/aplicativo2/cliente/clientepj/save', "Action\Aplicativo2\Cliente\ClientepjController@save");
    Route::delete('/action/aplicativo2/cliente/clientepj/delete/{id}', "Action\Aplicativo2\Cliente\ClientepjController@delete");
    Route::get('/aplicativo2/cliente/clientepj/novo', "Aplicativo2\cliente\ClientepjController@new");

     // aplicativo 2 - relatorio Cliente 
     Route::get('/aplicativo2/cliente/relatoriocliente', "Aplicativo2\cliente\RelatorioClienteController@list")->name('aplicativo2/cliente/relatoriocliente');
     Route::get('/action/aplicativo2/cliente/relatoriocliente/list', "Action\Aplicativo2\Cliente\RelatorioClienteController@list");  

    // aplicativo 2 - GESTÃO DE PROPOSTAS 2
    Route::get('/aplicativo2/proposta', "Aplicativo2\Proposta\PropostaController@list")->name('aplicativo2/proposta');
    Route::get('/action/aplicativo2/proposta/list', "Action\Aplicativo2\Proposta\PropostaController@list");  
    Route::get('/aplicativo2/proposta/editar/{id}', "Aplicativo2\Proposta\PropostaController@edit");
    Route::post('/action/aplicativo2/proposta/save', "Action\Aplicativo2\Proposta\PropostaController@save");
    Route::delete('/action/aplicativo2/proposta/delete/{id}', "Action\Aplicativo2\Proposta\PropostaController@delete");
    Route::get('/aplicativo2/proposta/novo', "Aplicativo2\Proposta\PropostaController@new");


    // // procurando erro - temporario
    // Route::get('/aplicativo2/proposta2', "Aplicativo2\Proposta\Proposta2Controller@list")->name('aplicativo2/proposta');
    // Route::get('/action/aplicativo2/proposta2/list', "Action\Aplicativo2\Proposta\Proposta2Controller@list");  
    // Route::get('/aplicativo2/proposta2/editar/{id}', "Aplicativo2\Proposta\Proposta2Controller@edit");
    // Route::post('/action/aplicativo2/proposta2/save', "Action\Aplicativo2\Proposta\Proposta2Controller@save");
    // Route::delete('/action/aplicativo2/proposta2/delete/{id}', "Action\Aplicativo2\Proposta\Proposta2Controller@delete");
    // Route::get('/aplicativo2/proposta2/novo', "Aplicativo2\Proposta\Proposta2Controller@new");



    // GESTAO DE PROJETOS2
    Route::get('/aplicativo2/projeto', "Aplicativo2\projeto\ProjetoController@list")->name('projeto');
    Route::get('/action/aplicativo2/projeto/projeto', "Action\Aplicativo2\Projeto\ProjetoController@list");   
    Route::post('/action/aplicativo2/projeto/novo', "Action\Aplicativo2\Projeto\ProjetoController@save");   
    Route::post('/action/aplicativo2/projeto/save', "Action\Aplicativo2\Projeto\ProjetoController@save");
    Route::get('/aplicativo2/projeto/selecao/{id}', "Aplicativo2\projeto\ProjetoController@viewselecao");
    Route::get('/aplicativo2/projeto/editar/{id}', "Aplicativo2\projeto\ProjetoController@edit");    
    Route::get('/aplicativo2/projeto/visualizar/{id}', "Aplicativo2\projeto\ProjetoController@viewprojeto");
    Route::delete('/action/aplicativo2/projeto/deleta/{id}', "Action\Aplicativo2\Projeto\ProjetoController@delete");  
    // GESTÃO DE PROJETOS - clientepf pessoa fisica
    Route::get('/aplicativo2/projeto/clientepf/{id}', "Aplicativo2\projeto\ProjetoClientepfController@listclientepf");
    Route::get('/action/aplicativo2/projeto/clientepf/{projetoID}/list/', "Action\Aplicativo2\Projeto\ProjetoClientepfController@list");
    Route::delete('/action/aplicativo2/projeto/clientepf/delete/{id}', "Action\Aplicativo2\Projeto\ProjetoClientepfController@delete");
    Route::get('/action/aplicativo2/projeto/clientepf/getbyid/{id}', "Action\Aplicativo2\Projeto\ProjetoClientepfController@getById");
    Route::post('/action/aplicativo2/projeto/clientepf/save/{projetoid}', "Action\Aplicativo2\Projeto\ProjetoClientepfController@save");
    // GESTÃO DE PROJETOS - clientepj empresas
    Route::get('/aplicativo2/projeto/clientepj/{id}', "Aplicativo2\projeto\ProjetoClientepjController@listclientepj"); 
    Route::get('/action/aplicativo2/projeto/clientepj/{projetoID}/list/', "Action\Aplicativo2\Projeto\ProjetoClientepjController@list");
    Route::delete('/action/aplicativo2/projeto/clientepj/delete/{id}', "Action\Aplicativo2\Projeto\ProjetoClientepjController@delete");
    Route::get('/action/aplicativo2/projeto/clientepj/getbyid/{id}', "Action\Aplicativo2\Projeto\ProjetoClientepjController@getById");
    Route::post('/action/aplicativo2/projeto/clientepj/save/{projetoid}', "Action\Aplicativo2\Projeto\ProjetoClientepjController@save");
    // GESTÃO DE PROJETOS - etapas
    Route::get('/aplicativo2/projeto/etapa/{id}', "Aplicativo2\projeto\ProjetoEtapaController@listetapa"); 
    Route::get('/action/aplicativo2/projeto/etapa/{projetoID}/list/', "Action\Aplicativo2\Projeto\ProjetoEtapaController@list");
    Route::delete('/action/aplicativo2/projeto/etapa/delete/{id}', "Action\Aplicativo2\Projeto\ProjetoEtapaController@delete");
    Route::get('/action/aplicativo2/projeto/etapa/getbyid/{id}', "Action\Aplicativo2\Projeto\ProjetoEtapaController@getById");
    Route::post('/action/aplicativo2/projeto/etapa/save/{projetoid}', "Action\Aplicativo2\Projeto\ProjetoEtapaController@save");
    //  GESTÃO DE PROJETOS - Documentos e  Anexos 
    Route::get('/aplicativo2/projeto/documento/{id}', "Aplicativo2\projeto\ProjetoController@listdocumento"); // ** acertar arquivo controlerr**
    Route::get('/action/aplicativo2/projeto/documento/{projetoID}/list/', "Action\Aplicativo2\Projeto\ProjetoDocumentoController@list");    
    Route::get('/action/aplicativo2/projeto/documento/visualizar/{id}', "Action\Aplicativo2\Projeto\ProjetoDocumentoController@getViewById");  
    Route::get('/action/aplicativo2/projeto/documento/edit/{id}', "Action\Aplicativo2\Projeto\ProjetoDocumentoController@getById");
    Route::delete('/action/aplicativo2/projeto/documento/delete/{id}', "Action\Aplicativo2\Projeto\ProjetoDocumentoController@delete");
    Route::post('/action/aplicativo2/projeto/documento/save/{piId}', "Action\Aplicativo2\Projeto\ProjetoDocumentoController@save");   
    Route::get('/action/projeto2documentodownloadfile/{id}', 'Action\FileController@projeto2documentodownload');   // download arquivo
    //  GESTÃO DE PROJETOS - Despesas
    Route::get('/aplicativo2/projeto/despesa/{id}', "Aplicativo2\projeto\ProjetoController@listdespesa"); 
    Route::get('/action/aplicativo2/projeto/despesa/{projetoID}/list/', "Action\Aplicativo2\Projeto\ProjetoDespesaController@list");
    Route::delete('/action/aplicativo2/projeto/despesa/delete/{id}', "Action\Aplicativo2\Projeto\ProjetoDespesaController@delete");
    Route::get('/action/aplicativo2/projeto/despesa/getbyid/{id}', "Action\Aplicativo2\Projeto\ProjetoDespesaController@getById");
    Route::post('/action/aplicativo2/projeto/despesa/save/{projetoid}', "Action\Aplicativo2\Projeto\ProjetoDespesaController@save");
    //  GESTÃO DE PROJETOS - Receitas
    Route::get('/aplicativo2/projeto/receita/{id}', "Aplicativo2\projeto\ProjetoController@listreceita"); 
    Route::get('/action/aplicativo2/projeto/receita/{projetoID}/list/', "Action\Aplicativo2\Projeto\ProjetoReceitaController@list");
    Route::delete('/action/aplicativo2/projeto/receita/delete/{id}', "Action\Aplicativo2\Projeto\ProjetoReceitaController@delete");
    Route::get('/action/aplicativo2/projeto/receita/getbyid/{id}', "Action\Aplicativo2\Projeto\ProjetoReceitaController@getById");
    Route::post('/action/aplicativo2/projeto/receita/save/{projetoid}', "Action\Aplicativo2\Projeto\ProjetoReceitaController@save");    
    // GESTÃO DE PROJETOS - relatorio Clientes 
    Route::get('/aplicativo2/projeto/relatoriocliente', "Aplicativo2\projeto\RelatorioClienteController@list")->name('aplicativo2/projeto/relatoriocliente');
    Route::get('/action/aplicativo2/projeto/relatoriocliente/list', "Action\Aplicativo2\Projeto\RelatorioClienteController@list");  
    // GESTÃO DE PROJETOS - relatorio Despesas - desabilitado
    // Route::get('/aplicativo2/projeto/relatoriodespesa', "Aplicativo2\projeto\RelatorioDespesaController@list")->name('aplicativo2/projeto/relatoriodespesa');
    // Route::get('/action/aplicativo2/projeto/relatoriodespesa/list', "Action\Aplicativo2\Projeto\RelatorioDespesaController@list");  
    // GESTÃO DE PROJETOS - relatorio Receitas 
    Route::get('/aplicativo2/projeto/relatorioreceita', "Aplicativo2\projeto\RelatorioReceitaController@list")->name('aplicativo2/projeto/relatorioreceita');
    Route::get('/action/aplicativo2/projeto/relatorioreceita/list', "Action\Aplicativo2\Projeto\RelatorioReceitaController@list");      
    // GESTÃO DE PROJETOS - relatorio Resultado 
    Route::get('/aplicativo2/projeto/relatorioresultado', "Aplicativo2\projeto\RelatorioResultadoController@list")->name('aplicativo2/projeto/relatorioresultado');
    Route::get('/action/aplicativo2/projeto/relatorioresultado/list', "Action\Aplicativo2\Projeto\RelatorioResultadoController@list");      
    // Visao do projeto (dentro de edicao) - teste
    Route::get('/aplicativo2/projeto/visao/{id}', "Aplicativo2\projeto\ProjetoController@visao"); 

    // GESTAO DE DESPESAS
    Route::get('/aplicativo2/despesa', "Aplicativo2\despesa\DespesaController@list")->name('despesa');
    Route::get('/action/aplicativo2/despesa/despesa', "Action\Aplicativo2\Despesa\DespesaController@list");  
    // ajax - pega soma da despesa
    Route::get('/action/aplicativo2/despesa/somadespesa', "Action\Aplicativo2\Despesa\DespesaController@somalist");  
    //
    Route::post('/action/aplicativo2/despesa/novo', "Action\Aplicativo2\Despesa\DespesaController@save");   
    Route::post('/action/aplicativo2/despesa/save', "Action\Aplicativo2\Despesa\DespesaController@save");
    Route::get('/aplicativo2/despesa/selecao/{id}', "Aplicativo2\despesa\DespesaController@viewselecao");
    Route::get('/aplicativo2/despesa/editar/{id}', "Aplicativo2\despesa\DespesaController@edit");    
    Route::get('/aplicativo2/despesa/visualizar/{id}', "Aplicativo2\despesa\DespesaController@viewdespesa");
    Route::delete('/action/aplicativo2/despesa/deleta/{id}', "Action\Aplicativo2\despesa\DespesaController@delete");  
    // pega etapa - tela adiciOna despesa (naoa usado, pode ser no futuro - em teste)
    Route::get('/action/aplicativo2/despesaetapa/{id}', "Action\Aplicativo2\Despesa\DespesaController@getlistetapa");
    // GESTÃO DE DESPESAS - projeto
    Route::get('/aplicativo2/despesa/projeto/{id}', "Aplicativo2\despesa\DespesaController@listprojeto");
    Route::get('/action/aplicativo2/despesa/projeto/{despesaID}/list/', "Action\Aplicativo2\Despesa\DespesaProjetoController@list");
    Route::delete('/action/aplicativo2/despesa/projeto/delete/{id}', "Action\Aplicativo2\Despesa\DespesaProjetoController@delete");
    Route::get('/action/aplicativo2/despesa/projeto/getbyid/{id}', "Action\Aplicativo2\Despesa\DespesaProjetoController@getById");
    Route::post('/action/aplicativo2/despesa/projeto/save/{projetoid}', "Action\Aplicativo2\Despesa\DespesaProjetoController@save");
    // GESTÃO DE DESPESAS - relatorio Despesas com rateio 
    Route::get('/aplicativo2/despesa/relatoriodespesa', "Aplicativo2\despesa\RelatorioDespesaController@list")->name('aplicativo2/despesa/relatoriodespesa');
    Route::get('/action/aplicativo2/despesa/relatoriodespesa/list', "Action\Aplicativo2\Despesa\RelatorioDespesaController@list");  
    // ajax - pega soma da despesa
    Route::get('/action/aplicativo2/despesa/relatoriodespesa/somalist', "Action\Aplicativo2\Despesa\RelatorioDespesaController@somalist");  

    // CONFIGURACOES
    // Usuarios
    Route::get('/aplicativo2/usuarios', "Aplicativo2\Configuracao\UsuarioController@list")->name('/aplicativo2/usuarios');
    Route::get('/aplicativo2/configuracao/usuarios/edit/{id}', "Aplicativo2\Configuracao\UsuarioController@edit");
    Route::get('/aplicativo2/configuracao/usuarios/novo', "Aplicativo2\Configuracao\UsuarioController@new");
    Route::get('/action/aplicativo2/configuracao/usuarios/list', "Action\Aplicativo2\Configuracao\UsuarioController@list");
    Route::delete('/action/aplicativo2/configuracao/usuarios/{id}', "Action\Aplicativo2\Configuracao\UsuarioController@delete");
    Route::post('/action/aplicativo2/configuracao/usuarios/save', "Action\Aplicativo2\Configuracao\UsuarioController@save");    
    // Acesso de usuarios
    Route::get('/aplicativo2/veacesso', "Aplicativo2\Configuracao\VeacessoController@list")->name('veacesso');
    Route::get('/action/aplicativo2/configuracao/veacesso', "Action\Aplicativo2\Configuracao\VeacessoController@list");

    // Calendario - TESTE 
    Route::get('/aplicativo2/calendario/categoria', "Aplicativo2\calendario\CategoriaController@list")->name('aplicativo2/calendario/categoria');
    Route::get('/action/aplicativo2/calendario/categoria/list', "Action\Aplicativo2\Calendario\CategoriaController@list");
    Route::get('/action/aplicativo2/calendario/categoria/editar/{id}', "Action\Aplicativo2\Calendario\CategoriaController@getById");
    Route::delete('/action/aplicativo2/calendario/categoria/delete/{id}', "Action\Aplicativo2\Calendario\CategoriaController@delete");
    Route::post('/action/aplicativo2/calendario/categoria', "Action\Aplicativo2\Calendario\CategoriaController@save");

    //
    // ****************************************************************************************
    // *** SISTEMA 3 - clinica medica area da saude
    // *** SISTEMA DE GESTAO PARA CLINICAS / MEDICOS - REF. VANILDO PRADO - subdominio : vap / clinica
    // ****************************************************************************************

    // sistema medico - precadastro - formulario 
    Route::get('/aplicativo3/precadastro/formulario', "Aplicativo3\Precadastro\FormularioController@list")->name('aplicativo3/precadastro/formulario');
    Route::get('/action/aplicativo3/precadastro/formulario/list', "Action\Aplicativo3\Precadastro\FormularioController@list");
    Route::get('/action/aplicativo3/precadastro/formulario/editar/{id}', "Action\Aplicativo3\Precadastro\FormularioController@getById");
    Route::delete('/action/aplicativo3/precadastro/formulario/delete/{id}', "Action\Aplicativo3\Precadastro\FormularioController@delete");
    Route::post('/action/aplicativo3/precadastro/formulario', "Action\Aplicativo3\Precadastro\FormularioController@save");

    // sistema medico - precadastro - remedio 
    Route::get('/aplicativo3/precadastro/remedio', "Aplicativo3\Precadastro\RemedioController@list")->name('aplicativo3/precadastro/remedio');
    Route::get('/action/aplicativo3/precadastro/remedio/list', "Action\Aplicativo3\Precadastro\RemedioController@list");
    Route::get('/action/aplicativo3/precadastro/remedio/editar/{id}', "Action\Aplicativo3\Precadastro\RemedioController@getById");
    Route::delete('/action/aplicativo3/precadastro/remedio/delete/{id}', "Action\Aplicativo3\Precadastro\RemedioController@delete");
    Route::post('/action/aplicativo3/precadastro/remedio', "Action\Aplicativo3\Precadastro\RemedioController@save");

    // sistema medico - precadastro - profissional 
    Route::get('/aplicativo3/precadastro/profissional', "Aplicativo3\Precadastro\ProfissionalController@list")->name('aplicativo3/precadastro/profissional');
    Route::get('/action/aplicativo3/precadastro/profissional/list', "Action\Aplicativo3\Precadastro\ProfissionalController@list");
    Route::get('/action/aplicativo3/precadastro/profissional/editar/{id}', "Action\Aplicativo3\Precadastro\ProfissionalController@getById");
    Route::delete('/action/aplicativo3/precadastro/profissional/delete/{id}', "Action\Aplicativo3\Precadastro\ProfissionalController@delete");
    Route::post('/action/aplicativo3/precadastro/profissional', "Action\Aplicativo3\Precadastro\ProfissionalController@save");

    // sistema medico - precadastro - animal - TESTE 25.000 REGISTROS 
    Route::get('/aplicativo3/precadastro/animalselecao', "Aplicativo3\Precadastro\AnimalController@selecao")->name('aplicativo3/precadastro/animalselecao');
    
    Route::get('/aplicativo3/precadastro/animal/{nome}', "Aplicativo3\Precadastro\AnimalController@list");

    Route::get('/action/aplicativo3/precadastro/animal/list/{nome}', "Action\Aplicativo3\Precadastro\AnimalController@list");
    Route::get('/action/aplicativo3/precadastro/animal/editar/{id}', "Action\Aplicativo3\Precadastro\AnimalController@getById");
    Route::delete('/action/aplicativo3/precadastro/animal/delete/{id}', "Action\Aplicativo3\Precadastro\AnimalController@delete");
    Route::post('/action/aplicativo3/precadastro/animal', "Action\Aplicativo3\Precadastro\AnimalController@save");


    // sistema medico - Calendario - agenda
    // Route::get('/aplicativo3/calendario/agenda', "Aplicativo3\Calendario\AgendaController@list2");

    Route::get('/aplicativo3/calendario/agendaprof/{id}', "Aplicativo3\Calendario\AgendaController@list")->name('aplicativo3/calendario/agenda');
    Route::get('/aplicativo3/calendario/agendaproftodos', "Aplicativo3\Calendario\AgendaController@listtodos");
    
    Route::get('/aplicativo3/calendario/agendacadastro', "Aplicativo3\Calendario\AgendaController@cadastro");
    
    Route::get('/action/aplicativo3/calendario/agenda/list', "Action\Aplicativo3\Calendario\AgendaController@list");
    Route::get('/action/aplicativo3/calendario/agenda/editar/{id}', "Action\Aplicativo3\Calendario\AgendaController@getById");
    Route::delete('/action/aplicativo3/calendario/agenda/delete/{id}', "Action\Aplicativo3\Calendario\AgendaController@delete");
    Route::post('/action/aplicativo3/calendario/agenda', "Action\Aplicativo3\Calendario\AgendaController@save");

    // Route::get('/aplicativo3/calendario/selecao', "Aplicativo3\Calendario\AgendaController@selecao")->name('aplicativo3/calendario/selecao');
    // Route::get('/aplicativo3/calendario/agenda2/{id}', "Aplicativo3\Calendario\AgendaController@veagenda");
    

    // sistema medico - clientepf pessoa fisica
    Route::get('/aplicativo3/paciente/clientepf', "Aplicativo3\Paciente\ClientepfController@chama");
    Route::get('/aplicativo3/paciente/chamaclientepf/{nome}', "Aplicativo3\Paciente\ClientepfController@list");
    Route::get('/action/aplicativo3/paciente/clientepf/list{nome}', "Action\Aplicativo3\Paciente\ClientepfController@list");  
    // Route::get('/aplicativo3/paciente/clientepf', "Aplicativo3\Paciente\ClientepfController@list")->name('aplicativo3/paciente/clientepf');
    // Route::get('/action/aplicativo3/paciente/clientepf/list', "Action\Aplicativo3\Paciente\ClientepfController@list");  
    Route::get('/aplicativo3/paciente/clientepf/editar/{id}', "Aplicativo3\Paciente\ClientepfController@edit");
    Route::post('/action/aplicativo3/paciente/clientepf/save', "Action\Aplicativo3\Paciente\ClientepfController@save"); 
    Route::post('/action/aplicativo3/paciente/clientepf/novo', "Action\Aplicativo3\Paciente\ClientepfController@save");   
    Route::delete('/action/aplicativo3/paciente/clientepf/delete/{id}', "Action\Aplicativo3\Paciente\ClientepfController@delete");
    Route::get('/aplicativo3/paciente/clientepf/novo', "Aplicativo3\Paciente\ClientepfController@new");
    Route::get('/aplicativo3/paciente/selecao/{id}', "Aplicativo3\Paciente\ClientepfController@viewselecao");
    // Visao do projeto (dentro de clientepf) 
    Route::get('/aplicativo3/paciente/visao/{id}', "Aplicativo3\Paciente\ClientepfController@visao");    
    // Visao (tela inicial clientepf)
    Route::get('/aplicativo3/paciente/viewext/{id}', "Aplicativo3\Paciente\ClientepfController@viewext");

    // sistema medico - formulario
    Route::get('/aplicativo3/paciente/formulario/{id}', "Aplicativo3\Paciente\FormularioController@listformulario"); 
    Route::get('/action/aplicativo3/paciente/formulario/{clienteID}/list/', "Action\Aplicativo3\Paciente\FormularioController@list");
    Route::delete('/action/aplicativo3/paciente/formulario/delete/{id}', "Action\Aplicativo3\Paciente\FormularioController@delete");
    Route::get('/action/aplicativo3/paciente/formulario/getbyid/{id}', "Action\Aplicativo3\Paciente\FormularioController@getById");
    Route::post('/action/aplicativo3/paciente/formulario/save/{clienteid}', "Action\Aplicativo3\Paciente\FormularioController@save");
    // especial - ajax - dntro de clientepf - viao geral
    Route::post('/action/aplicativo3/paciente/formulario/save2/{clienteid}', "Action\Aplicativo3\Paciente\FormularioController@save2");

    // sistema medico - evolucao / historico
    Route::get('/aplicativo3/paciente/historico/{id}', "Aplicativo3\Paciente\HistoricoController@listhistorico"); 
    Route::get('/action/aplicativo3/paciente/historico/{clienteID}/list/', "Action\Aplicativo3\Paciente\HistoricoController@list");
    Route::delete('/action/aplicativo3/paciente/historico/delete/{id}', "Action\Aplicativo3\Paciente\HistoricoController@delete");
    Route::get('/action/aplicativo3/paciente/historico/getbyid/{id}', "Action\Aplicativo3\Paciente\HistoricoController@getById");
    Route::post('/action/aplicativo3/paciente/historico/save/{clienteid}', "Action\Aplicativo3\Paciente\HistoricoController@save");
    // especial - ajax - dntro de clientepf - viao geral
    Route::post('/action/aplicativo3/paciente/historico/save2/{clienteid}', "Action\Aplicativo3\Paciente\HistoricoController@save2");

    //  sistema medico - Documentos e  Anexos 
    Route::get('/aplicativo3/paciente/documento/{id}', "Aplicativo3\Paciente\DocumentoController@listdocumento"); // ok
    Route::get('/action/aplicativo3/paciente/documento/{clienteID}/list/', "Action\Aplicativo3\Paciente\DocumentoController@list");    // ok
    Route::get('/action/aplicativo3/paciente/documento/visualizar/{id}', "Action\Aplicativo3\Paciente\DocumentoController@getViewById");  
    Route::get('/action/aplicativo3/paciente/documento/edit/{id}', "Action\Aplicativo3\Paciente\DocumentoController@getById"); // ok
    Route::delete('/action/aplicativo3/paciente/documento/delete/{id}', "Action\Aplicativo3\Paciente\DocumentoController@delete");
    Route::post('/action/aplicativo3/paciente/documento/save/{piId}', "Action\Aplicativo3\Paciente\DocumentoController@save"); // edit ok - save ??  
    Route::get('/action/aplicativo3/paciente/cliente3documentodownloadfile/{id}', 'Action\Aplicativo3\Paciente\DocumentoController@cliente3documentodownload');   // download arquivo

    // sistema medico - CONFIGURACOES
    // Usuarios
    Route::get('/aplicativo3/usuarios', "Aplicativo3\Configuracao\UsuarioController@list")->name('/aplicativo3/usuarios');
    Route::get('/aplicativo3/configuracao/usuarios/edit/{id}', "Aplicativo3\Configuracao\UsuarioController@edit");
    Route::get('/aplicativo3/configuracao/usuarios/novo', "Aplicativo3\Configuracao\UsuarioController@new");
    Route::get('/action/aplicativo3/configuracao/usuarios/list', "Action\Aplicativo3\Configuracao\UsuarioController@list");
    Route::delete('/action/aplicativo3/configuracao/usuarios/{id}', "Action\Aplicativo3\Configuracao\UsuarioController@delete");
    Route::post('/action/aplicativo3/configuracao/usuarios/save', "Action\Aplicativo3\Configuracao\UsuarioController@save");    
    // Acesso de usuarios
    Route::get('/aplicativo3/veacesso', "Aplicativo3\Configuracao\VeacessoController@list")->name('veacesso');
    Route::get('/action/aplicativo3/configuracao/veacesso', "Action\Aplicativo3\Configuracao\VeacessoController@list");
    // Parametros do sistema
    // Route::get('/aplicativo3/parametro', "Aplicativo3\Configuracao\ParametroController@list")->name('/aplicativo3/parametro');
    Route::get('/aplicativo3/configuracao/parametro/edit/{id}', "Aplicativo3\Configuracao\ParametroController@edit");
    // Route::get('/aplicativo3/configuracao/parametro/edit/{id}', "Aplicativo3\Configuracao\ParametroController@edit");
    // Route::get('/action/aplicativo3/configuracao/parametro/list', "Action\Aplicativo3\Configuracao\ParametroController@list");
    Route::post('/action/aplicativo3/configuracao/parametro/save', "Action\Aplicativo3\Configuracao\ParametroController@save");    

    //
    // ****************************************************************************************
    // *** SISTEMA 4
    // *** SISTEMA DE GESTAO PARA VETERINARIOS - REF. CLINICA 4 PATAS - Silvana
    // ****************************************************************************************

    // sistema veterinario - precadastro - Especie 
    Route::get('/aplicativo4/precadastro/especie', "Aplicativo4\Precadastro\EspecieController@list")->name('aplicativo4/precadastro/especie');
    Route::get('/action/aplicativo4/precadastro/especie/list', "Action\Aplicativo4\Precadastro\EspecieController@list");
    Route::get('/action/aplicativo4/precadastro/especie/editar/{id}', "Action\Aplicativo4\Precadastro\EspecieController@getById");
    Route::delete('/action/aplicativo4/precadastro/especie/delete/{id}', "Action\Aplicativo4\Precadastro\EspecieController@delete");
    Route::post('/action/aplicativo4/precadastro/especie', "Action\Aplicativo4\Precadastro\EspecieController@save");

    // sistema veterinario - precadastro - Raca 
    Route::get('/aplicativo4/precadastro/raca', "Aplicativo4\Precadastro\RacaController@list")->name('aplicativo4/precadastro/raca');
    Route::get('/action/aplicativo4/precadastro/raca/list', "Action\Aplicativo4\Precadastro\RacaController@list");
    Route::get('/action/aplicativo4/precadastro/raca/editar/{id}', "Action\Aplicativo4\Precadastro\RacaController@getById");
    Route::delete('/action/aplicativo4/precadastro/raca/delete/{id}', "Action\Aplicativo4\Precadastro\RacaController@delete");
    Route::post('/action/aplicativo4/precadastro/raca', "Action\Aplicativo4\Precadastro\RacaController@save");

    // sistema veterinario - precadastro - Pelagem
    Route::get('/aplicativo4/precadastro/pelagem', "Aplicativo4\Precadastro\PelagemController@list")->name('aplicativo4/precadastro/pelagem');
    Route::get('/action/aplicativo4/precadastro/pelagem/list', "Action\Aplicativo4\Precadastro\PelagemController@list");
    Route::get('/action/aplicativo4/precadastro/pelagem/editar/{id}', "Action\Aplicativo4\Precadastro\PelagemController@getById");
    Route::delete('/action/aplicativo4/precadastro/pelagem/delete/{id}', "Action\Aplicativo4\Precadastro\PelagemController@delete");
    Route::post('/action/aplicativo4/precadastro/pelagem', "Action\Aplicativo4\Precadastro\PelagemController@save");

    // sistema veterinario - precadastro - Vacina
    Route::get('/aplicativo4/precadastro/vacina', "Aplicativo4\Precadastro\VacinaController@list")->name('aplicativo4/precadastro/vacina');
    Route::get('/action/aplicativo4/precadastro/vacina/list', "Action\Aplicativo4\Precadastro\VacinaController@list");
    Route::get('/action/aplicativo4/precadastro/vacina/editar/{id}', "Action\Aplicativo4\Precadastro\VacinaController@getById");
    Route::delete('/action/aplicativo4/precadastro/vacina/delete/{id}', "Action\Aplicativo4\Precadastro\VacinaController@delete");
    Route::post('/action/aplicativo4/precadastro/vacina', "Action\Aplicativo4\Precadastro\VacinaController@save"); 

    // sistema veterinario - precadastro - Patologia
    Route::get('/aplicativo4/precadastro/patologia', "Aplicativo4\Precadastro\PatologiaController@list")->name('aplicativo4/precadastro/patologia');
    Route::get('/action/aplicativo4/precadastro/patologia/list', "Action\Aplicativo4\Precadastro\PatologiaController@list");
    Route::get('/action/aplicativo4/precadastro/patologia/editar/{id}', "Action\Aplicativo4\Precadastro\PatologiaController@getById");
    Route::delete('/action/aplicativo4/precadastro/patologia/delete/{id}', "Action\Aplicativo4\Precadastro\PatologiaController@delete");
    Route::post('/action/aplicativo4/precadastro/patologia', "Action\Aplicativo4\Precadastro\PatologiaController@save");    

    // sistema veterinario - Proprietario 
    Route::get('/aplicativo4/proprietario/clienteselecao', "Aplicativo4\Proprietario\ClienteController@selecao")->name('aplicativo4/proprietario/clienteselecao');
    Route::get('/aplicativo4/proprietario/cliente/{nome}', "Aplicativo4\Proprietario\ClienteController@list");
    Route::get('/action/aplicativo4/proprietario/cliente/list/{nome}', "Action\Aplicativo4\Proprietario\ClienteController@list");
    Route::get('/action/aplicativo4/proprietario/cliente/editar/{id}', "Action\Aplicativo4\Proprietario\ClienteController@getById");
    Route::delete('/action/aplicativo4/proprietario/cliente/delete/{id}', "Action\Aplicativo4\Proprietario\ClienteController@delete");
    Route::post('/action/aplicativo4/proprietario/cliente', "Action\Aplicativo4\Proprietario\ClienteController@save");

    // sistema veterinario - Animal 
    Route::get('/aplicativo4/animal/clienteselecao', "Aplicativo4\Animal\ClienteController@selecao")->name('aplicativo4/animal/clienteselecao');
    Route::get('/aplicativo4/animal/cliente/{nome}', "Aplicativo4\Animal\ClienteController@list");
    Route::get('/action/aplicativo4/animal/cliente/list/{nome}', "Action\Aplicativo4\Animal\ClienteController@list");
    Route::get('/action/aplicativo4/animal/cliente/editar/{id}', "Action\Aplicativo4\Animal\ClienteController@getById");
    Route::delete('/action/aplicativo4/animal/cliente/delete/{id}', "Action\Aplicativo4\Animal\ClienteController@delete");
    Route::post('/action/aplicativo4/animal/cliente/save', "Action\Aplicativo4\Animal\ClienteController@save");
    // teste novo cliente
    Route::get('/aplicativo4/animal/novocliente', "Aplicativo4\Animal\ClienteController@novocliente");
    // especial - ajax - dentro de animal (verifica antes de salvar - novo registro)
    Route::post('/action/aplicativo4/animal/verificasave', "Action\Aplicativo4\Animal\ClienteController@verificasave");
    // Opcao - menu
    Route::get('/aplicativo4/animal/clienteopcao/{id}', "Aplicativo4\Animal\ClienteController@clienteopcao");
    // editar
    Route::get('/aplicativo4/animal/editar/{id}', "Aplicativo4\Animal\ClienteController@edit");  
    // historico
    Route::get('/aplicativo4/animal/historico/{id}', "Aplicativo4\Animal\ClienteController@historico");  

    // sistema veterinario - peso
    Route::get('/aplicativo4/animal/peso/{id}', "Aplicativo4\Animal\PesoController@listpeso"); 
    Route::get('/action/aplicativo4/animal/peso/{clienteID}/list/', "Action\Aplicativo4\Animal\PesoController@list");
    Route::delete('/action/aplicativo4/animal/peso/delete/{id}', "Action\Aplicativo4\Animal\PesoController@delete");
    Route::get('/action/aplicativo4/animal/peso/getbyid/{id}', "Action\Aplicativo4\Animal\PesoController@getById");
    Route::post('/action/aplicativo4/animal/peso/save/{clienteid}', "Action\Aplicativo4\Animal\PesoController@save");

    //
    // ****************************************************************************************
    // *** SISTEMA 5
    // *** SISTEMA DE GESTAO PARA CONTROLE DE MANUTENCAO DE TREM
    // ****************************************************************************************

    // dashboard
    Route::get('/aplicativo5/dashboard', 'Aplicativo5\Dashboard\DashboardController@show');

    // PRE-CADASTRO - DBS 
    Route::get('/aplicativo5/precadastro/dbs', "Aplicativo5\Precadastro\DbsController@list")->name('aplicativo5/precadastro/dbs');
    Route::get('/action/aplicativo5/precadastro/dbs/list', "Action\Aplicativo5\Precadastro\DbsController@list");
    Route::get('/action/aplicativo5/precadastro/dbs/editar/{id}', "Action\Aplicativo5\Precadastro\DbsController@getById");
    Route::delete('/action/aplicativo5/precadastro/dbs/delete/{id}', "Action\Aplicativo5\Precadastro\DbsController@delete");
    Route::post('/action/aplicativo5/precadastro/dbs/save', "Action\Aplicativo5\Precadastro\DbsController@save");

    // ar condicionado 
    Route::get('/aplicativo5/trem/arcondicionado', "Aplicativo5\Trem\ArcondicionadoController@list")->name('aplicativo5/trem/arcondicionado');
    Route::get('/action/aplicativo5/trem/arcondicionado/list', "Action\Aplicativo5\Trem\ArcondicionadoController@list");
    Route::get('/aplicativo5/trem/arcondicionado/editar/{id}', "Aplicativo5\Trem\ArcondicionadoController@edit");
    Route::delete('/action/aplicativo5/trem/arcondicionado/delete/{id}', "Action\Aplicativo5\Trem\ArcondicionadoController@delete");
    Route::get('/aplicativo5/trem/arcondicionado/novo', "Aplicativo5\Trem\ArcondicionadoController@new");
    Route::post('/action/aplicativo5/trem/arcondicionado/save', "Action\Aplicativo5\Trem\ArcondicionadoController@save");

    // Parametros do sistema
    Route::get('/aplicativo5/configuracao/parametro/edit/{id}', "Aplicativo5\Configuracao\ParametroController@edit");
    Route::post('/action/aplicativo5/configuracao/parametro/save', "Action\Aplicativo5\Configuracao\ParametroController@save");    

    //
    // ****************************************************************************************
    // *** SISTEMA 6
    // *** SISTEMA GRAFICO DE INFORMAÇÕES
    // ****************************************************************************************
    
    // Le CSV
    Route::get('/aplicativo6/leitura/lecsv', 'Aplicativo6\Leitura\LecsvController@list');
    Route::get('/action/aplicativo6/leitura/lecsv/list', 'Action\Aplicativo6\Leitura\LecsvController@list');
    Route::post('/action/aplicativo6/lecsv', "Action\Aplicativo6\Leitura\LecsvController@leituracsv");

    // Nome das colunas
    Route::get('/aplicativo6/leitura/nomecoluna/{id}', "Aplicativo6\Leitura\NomecolunaController@edit");
    Route::post('/action/aplicativo6/leitura/nomecoluna/save', "Action\Aplicativo6\Leitura\NomecolunaController@save");   

    // ACESSO TABELA1 - DADOS 
    Route::get('/aplicativo6/leitura/tabela1', 'Aplicativo6\Leitura\Tabela1Controller@list');
    Route::get('/action/aplicativo6/leitura/tabela1/list', 'Action\Aplicativo6\Leitura\Tabela1Controller@list');
    Route::get('/aplicativo6/leitura/tabela1/editar/{id}', "Aplicativo6\Leitura\Tabela1Controller@edit");
    Route::delete('/action/aplicativo6/leitura/tabela1/delete/{id}', "Action\Aplicativo6\Leitura\Tabela1Controller@delete");
    Route::get('/aplicativo6/leitura/tabela1/novo', "Aplicativo6\Leitura\Tabela1Controller@new");
    Route::post('/action/aplicativo6/leitura/tabela1/save', "Action\Aplicativo6\Leitura\Tabela1Controller@save");

    // dashboard
    Route::get('/aplicativo6/dashboard', 'Aplicativo6\Dashboard\DashboardController@show');

    // Parametros do sistema
    Route::get('/aplicativo6/configuracao/parametro/edit/{id}', "Aplicativo6\Configuracao\ParametroController@edit");
    Route::post('/action/aplicativo6/configuracao/parametro/save', "Action\Aplicativo6\Configuracao\ParametroController@save");    

    // CONFIGURACOES
    // Usuarios
    Route::get('/aplicativo6/usuarios', "Aplicativo6\Configuracao\UsuarioController@list")->name('/aplicativo6/usuarios');
    Route::get('/aplicativo6/configuracao/usuarios/edit/{id}', "Aplicativo6\Configuracao\UsuarioController@edit");
    Route::get('/aplicativo6/configuracao/usuarios/novo', "Aplicativo6\Configuracao\UsuarioController@new");
    Route::get('/action/aplicativo6/configuracao/usuarios/list', "Action\Aplicativo6\Configuracao\UsuarioController@list");
    Route::delete('/action/aplicativo6/configuracao/usuarios/{id}', "Action\Aplicativo6\Configuracao\UsuarioController@delete");
    Route::post('/action/aplicativo6/configuracao/usuarios/save', "Action\Aplicativo6\Configuracao\UsuarioController@save");    
    // Acesso de usuarios
    Route::get('/aplicativo6/veacesso', "Aplicativo6\Configuracao\VeacessoController@list")->name('veacesso');
    Route::get('/action/aplicativo6/configuracao/veacesso', "Action\Aplicativo6\Configuracao\VeacessoController@list");    

});

// Reseta senha 
Route::get('primeiro-acesso/troca-senha', 'Auth\PrimeiroAcesso@trocaSenha')->middleware('auth')->name('primeiroacesso.trocasenha');
Route::post('primeiro-acesso/troca-senha', 'Auth\PrimeiroAcesso@actionTrocaSenha')->middleware('auth')->name('primeiroacesso.actiontrocasenha');
//rotas Config

Route::get('/login', 'Auth\LoginController@showLoginForm')->name('login');
Route::post('/login', 'Auth\LoginController@login');
Route::post('/logout', 'Auth\LoginController@logout')->middleware('auth');
Route::get('/selecionar-cliente', 'Sistema\ClienteController@selecionar');


// Password Reset Routes...
Route::get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('password.request');
Route::post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('password.email');
Route::get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
Route::post('password/reset', 'Auth\ResetPasswordController@reset');


