<?php

return array(
	'name'=>'Petshop',
	'defaultController'=>'Login',
	'import'=>array(
        'application.models.*',
        'ext.yii-mail.YiiMailMessage',
    ),
	'components'=>array(
		'mail' => array(
 			'class' => 'ext.yii-mail.YiiMail',
 			'transportType' => 'php',
 			'viewPath' => 'application.views.mail', 
 			'logging' => true,
 			'dryRun' => false
 		),
		'db' => array(
            'class'=>'CDbConnection',
            'connectionString'=>'mysql:host=localhost;dbname=pet',
            'username'=>'root',
            'password'=>'78951236',
            'charset'=>'utf8',
        ),
		'urlManager' => array(
			'urlFormat'=>'path',
			'rules'=>array(
				
				/* LOGIN */
				'login'=>'login/abrirLogin',
				'logar'=>'login/logar',
				'deslogar'=>'login/deslogar',
				'isLogado'=>'login/isLogado',
				'logado'=>'login/logado',
				'getUser'=>'login/getUser',
				'page/<page:\w+>'=>'login/page',
				'trocarPetshopAtual'=>'login/trocarPetshopAtual',
				
				/* PETSHOP */
				'g'=>'petshop/inicio',
				'getPagesMenu'=>'petshop/getPagesMenu',
				
				/* AGENDA */
				'petshop/agenda'=>'agenda/inicio',
				
				/* PRODUTO */
				'petshop/produto'=>'produto/inicio',
				
				/* SERVICO */
				'petshop/servico'=>'servico/inicio',
				
				/* CLIENTE */
				'petshop/cliente'=>'cliente/inicio',
				
				/* VENDAS */
				'petshop/venda'=>'venda/inicio',
				
				/* LABORATORIO */
				'petshop/laboratorio'=>'laboratorio/inicio',
				
				/* CONFIGURAÇÃO */
				'petshop/configuracao'=>'configuracao/inicio',
				
				'petshop/rede'=>'rede/abrir',
				'petshop/salvarRede'=>'rede/salvar',
				'petshop/deletarRede'=>'rede/deletar',
				'petshop/buscarRede'=>'rede/buscar',
				
				'petshop/petshop'=>'petshop/abrir',
				'salvarPetshop'=>'petshop/salvarPetshop',
				'deletarPetshop'=>'petshop/deletarPetshop',
				'buscarPetshop'=>'petshop/buscarPetshop',
				'findAllPetshop'=>'petshop/findAllPetshop',
				'enviarConvitePetshop'=>'petshop/enviarConvitePetshop',
				'aceitarConvite'=>'petshop/aceitarConvite',
				'rejeitarConvite'=>'petshop/rejeitarConvite',
				'getPetshopredeAceito'=>'petshop/getPetshopredeAceito',
				'getPetshopredeConvidado'=>'petshop/getPetshopredeConvidado',
				'findAllPetshopByNotRede'=>'petshop/findAllPetshopByNotRede',
				'findAllPetshopByUsuario'=>'petshop/findAllPetshopByUsuario',
				
				'petshop/cidade'=>'endereco/abrirCidade',
				'petshop/salvarCidadepetshop'=>'endereco/salvarCidadepetshop',
				'petshop/deletarCidadepetshop'=>'endereco/deletarCidadepetshop',
				'petshop/findAllCidadepetshop'=>'endereco/findAllCidadepetshop',
				'petshop/buscarCidadepetshop'=>'endereco/buscarCidadepetshop',
				'petshop/findAllCidadeByEstado'=>'endereco/findAllCidadeByEstado',
				
				'petshop/bairro'=>'endereco/abrirBairro',
				'petshop/salvarBairropetshop'=>'endereco/salvarBairropetshop',
				'petshop/deletarBairropetshop'=>'endereco/deletarBairropetshop',
				'petshop/findAllBairropetshop'=>'endereco/findAllBairropetshop',
				'petshop/buscarBairropetshop'=>'endereco/buscarBairropetshop',
				
				'petshop/tipoanimalpetshop'=>'animal/abrirTipoanimalpetshop',
				'petshop/tipoanimal'=>'animal/abrirTipoanimal',
				'petshop/salvarTipoanimalpetshop'=>'animal/salvarTipoanimalpetshop',
				'petshop/deletarTipoanimalpetshop'=>'animal/deletarTipoanimalpetshop',
				'petshop/findAllTipoanimalpetshop'=>'animal/findAllTipoanimalpetshop',
				'petshop/buscarTipoanimalpetshop'=>'animal/buscarTipoanimalpetshop',
				'petshop/findAllTipoanimal'=>'animal/findAllTipoanimal',
				'petshop/salvarTipoanimal'=>'animal/salvarTipoanimal',
				'petshop/deletarTipoanimal'=>'animal/deletarTipoanimal',
				
				'petshop/raca'=>'raca/abrirRaca',
				'petshop/findAllRaca'=>'raca/findAllRaca',
				'petshop/salvarRaca'=>'raca/salvarRaca',
				'petshop/deletarRaca'=>'raca/deletarRaca',
				
				'petshop/parceiros'=>'parceiros/abrirParceiros',
				'petshop/findAllParceiros'=>'parceiros/findAllParceiros',
				'petshop/salvarParceiros'=>'parceiros/salvarParceiros',
				'petshop/deletarParceiros'=>'parceiros/deletarParceiros',
				
				'petshop/fornecedor'=>'fornecedor/abrirFornecedor',
				'petshop/findAllFornecedor'=>'fornecedor/findAllFornecedor',
				'petshop/salvarFornecedor'=>'fornecedor/salvarFornecedor',
				'petshop/deletarFornecedor'=>'fornecedor/deletarFornecedor',
				'petshop/salvarContatofornecedor'=>'fornecedor/salvarContatofornecedor',
				
				'petshop/unidademedida'=>'unidade/abrirUnidademedida',
				'petshop/findAllUnidademedida'=>'unidade/findAllUnidademedida',
				'petshop/salvarUnidademedida'=>'unidade/salvarUnidademedida',
				'petshop/deletarUnidademedida'=>'unidade/deletarUnidademedida',
				
				'petshop/findAllEstado'=>'endereco/findAllEstado',
				'petshop/buscarEstado'=>'endereco/buscarEstado',
				
				'petshop/findAllTipocontato'=>'tipocontato/findAllTipocontato',
				
				
			),
		),
	),
);