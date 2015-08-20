-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Máquina: 127.0.0.1
-- Data de Criação: 27-Maio-2015 às 18:42
-- Versão do servidor: 5.5.34
-- versão do PHP: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de Dados: `pet`
--
CREATE DATABASE IF NOT EXISTS `pet` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `pet`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Unidademedida`
-- Exemplo : sigla - M, nome - metro 
--

CREATE TABLE IF NOT EXISTS `Unidademedida` (
  `id` int(3) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `sigla` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

insert into Unidademedida( id, nome, sigla) values(null, 'Metro', 'M');
insert into Unidademedida( id, nome, sigla) values(null, 'Centímetro', 'CM');
insert into Unidademedida( id, nome, sigla) values(null, 'Milímetro', 'MM');

insert into Unidademedida( id, nome, sigla) values(null, 'Kilograma', 'KG');
insert into Unidademedida( id, nome, sigla) values(null, 'Grama', 'G');

insert into Unidademedida( id, nome, sigla) values(null, 'Litro', 'L');
insert into Unidademedida( id, nome, sigla) values(null, 'Mililitro', 'ML');

insert into Unidademedida( id, nome, sigla) values(null, 'Unidade', 'UNIDADE');
insert into Unidademedida( id, nome, sigla) values(null, 'Dezena', 'DEZENA');
insert into Unidademedida( id, nome, sigla) values(null, 'Centena', 'CENTENA');
insert into Unidademedida( id, nome, sigla) values(null, 'Milhar', 'MILHAR');
insert into Unidademedida( id, nome, sigla) values(null, 'Dúzia', 'DÚZIA');

insert into Unidademedida( id, nome, sigla) values(null, 'Pacote', 'PACOTE');
insert into Unidademedida( id, nome, sigla) values(null, 'Galão', 'GALÃO');
insert into Unidademedida( id, nome, sigla) values(null, 'Fardo', 'FARDO');
insert into Unidademedida( id, nome, sigla) values(null, 'Frasco', 'FRASCO');
insert into Unidademedida( id, nome, sigla) values(null, 'Farafa', 'GARAFA');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Estado`
--

CREATE TABLE IF NOT EXISTS `Estado` (
  `id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `sigla` varchar(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

insert into Estado(id, nome,sigla) values(null, 'Acre','AC');
insert into Estado(id, nome,sigla) values(null, 'Alagoas','AL');
insert into Estado(id, nome,sigla) values(null, 'Amazonas','AM');
insert into Estado(id, nome,sigla) values(null, 'Amapá','AP');

insert into Estado(id, nome,sigla) values(null, 'Bahia','BA');
insert into Estado(id, nome,sigla) values(null, 'Ceará','CE');
insert into Estado(id, nome,sigla) values(null, 'Distrito Federal','DF');
insert into Estado(id, nome,sigla) values(null, 'Espírito Santo','ES');

insert into Estado(id, nome,sigla) values(null, 'Goiás','GO');
insert into Estado(id, nome,sigla) values(null, 'Maranhão','MA');
insert into Estado(id, nome,sigla) values(null, 'Minas Gerais','MG');
insert into Estado(id, nome,sigla) values(null, 'Mato Grosso do Sul','MS');

insert into Estado(id, nome,sigla) values(null, 'Mato Grosso','MT');
insert into Estado(id, nome,sigla) values(null, 'Pará','PA');
insert into Estado(id, nome,sigla) values(null, 'Paraíba','PB');
insert into Estado(id, nome,sigla) values(null, 'Pernambuco','PE');

insert into Estado(id, nome,sigla) values(null, 'Piauí','PI');
insert into Estado(id, nome,sigla) values(null, 'Paraná','PR');
insert into Estado(id, nome,sigla) values(null, 'Rio de Janeiro','RJ');
insert into Estado(id, nome,sigla) values(null, 'Rio Grande do Norte','RN');

insert into Estado(id, nome,sigla) values(null, 'Rondônia','RO');
insert into Estado(id, nome,sigla) values(null, 'Roraima','RR');
insert into Estado(id, nome,sigla) values(null, 'Rio Grande do Sul','RS');
insert into Estado(id, nome,sigla) values(null, 'Santa Catarina','SC');

insert into Estado(id, nome,sigla) values(null, 'Sergipe','SE');
insert into Estado(id, nome,sigla) values(null, 'São Paulo','SP');
insert into Estado(id, nome,sigla) values(null, 'Tocantins','TO');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Cidade`
--

CREATE TABLE IF NOT EXISTS `Cidade` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `estado` int(2) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX estado_indice(`estado`),
  CONSTRAINT fk_estado FOREIGN KEY (`estado`) REFERENCES Estado(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Rede`
-- rede : essa tabela é pra configurar quando é uma rede de PetShop
--

CREATE TABLE IF NOT EXISTS `Rede` (
  `id` int(5) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `datainicio` datetime NOT NULL,
  `nome` varchar(50) NOT NULL UNIQUE,
  `logo` varchar(200) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `usuario` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=10000;

-- --------------------------------------------------------

--
-- Estrutura da tabela `petshop`
-- limiteusuario : limite máximo da quantidade de usuários por sistema.
-- tipocobranca : Como será cobrado pelo sistema. Valores : DIARIO ou MENSAL ou UNICO.
-- datainicio : data de inicio da utilização do sistema.
-- datafim : data de fim da utilização do sistema.
-- datavencimento : é a data de vencimento da fatura. somente dia e mes; só é aplicável quando nao for pagamento único.
--

CREATE TABLE IF NOT EXISTS `Petshop` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `limiteusuario` int(11) NOT NULL,
  `tipocobranca` varchar(20) NOT NULL,
  `datainicio` datetime NOT NULL,
  `datafim` datetime,
  `datavencimento` varchar(20),
  PRIMARY KEY (`id`),
  CONSTRAINT check_table_petshop CHECK (`nome` IS NOT NULL OR `cnpj` IS NOT NULL OR `endereco` IS NOT NULL OR `limiteusuario` > 0 OR `tipocobranca` IS NOT NULL)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

insert into Petshop(id, nome, descricao, cnpj, limiteusuario, tipocobranca, datainicio, datafim, datavencimento) 
                values(null, 'PetDefault 1', 'Default de criação do usuário jonaskreling', '', 1, 'UNICO', '2015-07-27 00:00:00', '0000-00-00 00:00:00', '25');
insert into Petshop(id, nome, descricao, cnpj, limiteusuario, tipocobranca, datainicio, datafim, datavencimento) 
                values(null, 'PetDefault 2', 'Default de criação do usuário jonaskreling', '', 1, 'UNICO', '2015-07-27 00:00:00', '0000-00-00 00:00:00', '25');
insert into Petshop(id, nome, descricao, cnpj, limiteusuario, tipocobranca, datainicio, datafim, datavencimento) 
                values(null, 'PetDefault 3', 'Default de criação do usuário jonaskreling', '', 1, 'UNICO', '2015-07-27 00:00:00', '0000-00-00 00:00:00', '25');
insert into Petshop(id, nome, descricao, cnpj, limiteusuario, tipocobranca, datainicio, datafim, datavencimento) 
                values(null, 'PetDefault 4', 'Default de criação do usuário jonaskreling', '', 1, 'UNICO', '2015-07-27 00:00:00', '0000-00-00 00:00:00', '25');

-- --------------------------------------------------------

--
-- Estrutura da tabela `petshoprede`
-- status : CONVIDADO , ACEITO.
-- sede : se é a 'sede' da rede de PetShop.
--

CREATE TABLE IF NOT EXISTS `Petshoprede` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `status` varchar(50) NOT NULL,
  `mensagem` varchar(500) NOT NULL,
  `data` datetime NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  `rede` int(5) UNSIGNED NOT NULL,
  `sede` varchar(1) DEFAULT 'N' NOT NULL,
  PRIMARY KEY (`id`),
  INDEX rede_indice(`rede`),
  INDEX petshop_indice(`petshop`),
  FOREIGN KEY (`rede`) REFERENCES Rede(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE RESTRICT,
  CONSTRAINT unique_petshoprede UNIQUE (`rede`,`petshop`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Cidadepetshop`
--

CREATE TABLE IF NOT EXISTS `Cidadepetshop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cidade` int(5) UNSIGNED NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  INDEX cidade_indice(`cidade`),
  CONSTRAINT fk_cidade FOREIGN KEY (`cidade`) REFERENCES Cidade(`id`) ON DELETE RESTRICT,
  CONSTRAINT fk_petshop FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE RESTRICT,
  CONSTRAINT unique_cidadepetshop UNIQUE (`cidade`,`petshop`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Bairro`
--

CREATE TABLE IF NOT EXISTS `Bairro` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(35) NOT NULL,
  `cidadepetshop` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX cidadepetshop_indice(`cidadepetshop`),
  CONSTRAINT fk_cidadepetshop FOREIGN KEY (`cidadepetshop`) REFERENCES Cidadepetshop(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Enderecopetshop`
--

CREATE TABLE IF NOT EXISTS `Enderecopetshop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(50) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `referencia` varchar(500) NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  `bairro` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  INDEX bairro_indice(`bairro`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`bairro`) REFERENCES Bairro(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Mensalidade`
--

CREATE TABLE IF NOT EXISTS `Mensalidade` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `datavencimento` datetime NOT NULL,
  `valor` double NOT NULL,
  `status` varchar(20) NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  CONSTRAINT check_mensalidade CHECK (`petshop` IS NOT NULL OR `valor` >= 0),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Parceiros`
--

CREATE TABLE IF NOT EXISTS `Parceiros` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `site` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Servico`
-- status : ATIVO ou INATIVO
-- 

CREATE TABLE IF NOT EXISTS `Servico` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `valor` double NOT NULL,
  `descontomaximo` double NOT NULL,
  `descontominimo` double NOT NULL,
  `codigodebarras` varchar(100) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `status` varchar(200) NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  CONSTRAINT check_servico CHECK (`valor` >= 0 OR `descontomaximo` >= 0 OR `descontominimo` >= 0),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `AgendaServico`
-- status : ESPERA , ATENDIMENTO, FINALIZACAO, TERMINADO, ENTREGUE
-- pago : indica se foi pago ou nao.
--

CREATE TABLE IF NOT EXISTS `Agendaservico` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `dataservico` datetime NOT NULL,
  `datapagamento` datetime NOT NULL,
  `inicioatendimento` datetime NOT NULL,
  `fimatendimento` datetime NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `valor` double NOT NULL,
  `pago` varchar(20) NOT NULL,
  `desconto` double NOT NULL,
  `status` varchar(20) NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  CONSTRAINT check_agendaservico CHECK (`valor` >= 0 OR `desconto` >= 0),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Fornecedor`
-- status : se o fornecedor está ATIVO ou INATIVO.
-- 

CREATE TABLE IF NOT EXISTS `Fornecedor` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `cnpj` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `site` varchar(200) NOT NULL,
  `logo` varchar(200) NOT NULL,
  `status` varchar(200) DEFAULT 'ATIVO' NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Marca`
-- status : se a marca está ativa.
-- 

CREATE TABLE IF NOT EXISTS `Marca` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `status` varchar(200) NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Produto`
-- status : se o fornecedor está ativo ou não.
-- nivelproduto : usado para saber se é um produto ou grupo de produtos.
-- unidademedida : unidade padrão para aquele produto
--

CREATE TABLE IF NOT EXISTS `Produto` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `codigodebarras` varchar(100) NOT NULL,
  `codigo` varchar(50) NOT NULL,
  `referencia` varchar(50) NOT NULL,
  `nivelproduto` int(11) NOT NULL,
  `descricao` varchar(50) NOT NULL,
  `status` varchar(200) NOT NULL,
  `marca` int(6) UNSIGNED NOT NULL,
  `pai` int(11) NOT NULL,
  `unidademedida` int(3) UNSIGNED NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  INDEX marca_indice(`marca`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`marca`) REFERENCES Marca(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `PedidoFornecedor`
-- status : ENTREGUE ou ESPERA.
-- por padrão somente usuários administradores poderão fazer pedidos aos fornecedores.
--

CREATE TABLE IF NOT EXISTS `Pedidofornecedor` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `fornecedor` int(6) UNSIGNED NOT NULL,
  `produto` int(6) UNSIGNED NOT NULL,
  `datapedido` datetime NOT NULL,
  `dataentrega` datetime NOT NULL,
  `datapagamento` datetime NOT NULL,
  `quantidade` double NOT NULL,
  `unidademedida` int(3) UNSIGNED NOT NULL,
  `pago` varchar(20) NOT NULL,
  `usuario` int(6) UNSIGNED NOT NULL,
  `status` varchar(200) NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  INDEX produto_indice(`produto`),
  INDEX fornecedor_indice(`fornecedor`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`produto`) REFERENCES Produto(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`fornecedor`) REFERENCES Fornecedor(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- ------------------------------------------------------

--
-- Estrutura da tabela `ImagemProduto`
-- São imagens associadas com o produto.
--

CREATE TABLE IF NOT EXISTS `Imagemproduto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(100) NOT NULL,
  `status` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `produto` int(6) UNSIGNED NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  INDEX produto_indice(`produto`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`produto`) REFERENCES Produto(`id`) ON DELETE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Produtofornecedor`
-- status : se o fornecedor está ativo ou não.
-- 

CREATE TABLE IF NOT EXISTS `Produtofornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `produto` int(6) UNSIGNED NOT NULL,
  `fornecedor` int(6) UNSIGNED NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  INDEX fornecedor_indice(`fornecedor`),
  INDEX produto_indice(`produto`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`fornecedor`) REFERENCES Fornecedor(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`produto`) REFERENCES Produto(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Estoque`
-- custo unitario : custo de compra do produto - 1 unidade.
-- preço unitario : preço de venda do produto - 1 unidade.
-- status : indica se o estoque está finalizado ou não.
-- datatermino : data de quando encerrou o estoque
-- unidademedida : unidade de compra, deve ser a mesma unidade do produto. Quando o produto é auterado gera inconsistência no sistema.
-- 

CREATE TABLE IF NOT EXISTS `Estoque` (
  `id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `custounitario` double NOT NULL,
  `precounitario` double NOT NULL,
  `porcentagem` double NOT NULL,
  `quantidade` double NOT NULL,
  `descontominimo` double NOT NULL,
  `descontomaximo` double NOT NULL,
  `datacompra` datetime NOT NULL,
  `datatermino` datetime NOT NULL,
  `validade` datetime NOT NULL,
  `status` varchar(200) NOT NULL,
  `armazenamento` varchar(200) NOT NULL,
  `unidademedida` int(3) UNSIGNED NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  `produtofornecedor` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  INDEX unidademedida_indice(`unidademedida`),
  INDEX produtofornecedor_indice(`produtofornecedor`),
  CONSTRAINT check_estoque CHECK (`custounitario` > 0 OR `precounitario` > 0 OR `porcentagem` >= 0),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`unidademedida`) REFERENCES Unidademedida(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`produtofornecedor`) REFERENCES Produtofornecedor(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Usuario`
-- Usuários do sistema de gestão do petshop.
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `nascimento` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `celular` varchar(15) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `ultimamudanca` datetime NOT NULL,
  `tipoUsuario` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

ALTER TABLE `Rede` ADD CONSTRAINT chave_estrangeira_rede FOREIGN KEY (`usuario`) REFERENCES `Usuario`(`id`);

insert into Usuario(id, nome, sobrenome, nascimento, email, senha, celular, sexo, foto, ultimamudanca, tipoUsuario) 
            values(null, 'jonas','franco kreling','18/03/1990','jonasfrancokreling@gmail.com','78951236','4599463862','M','https://i.imgur.com/8AoEklt.jpg','0000-00-00 00:00:00','ADMIN-MASTER');

insert into Usuario(id, nome, sobrenome, nascimento, email, senha, celular, sexo, foto, ultimamudanca, tipoUsuario) 
            values(null, 'jonas','franco kreling','18/03/1990','jonasfrancokreling1@gmail.com','78951236','4599463862','M','https://i.imgur.com/8AoEklt.jpg','0000-00-00 00:00:00','ADMIN-MASTER');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Venda`
-- valor : valor na data de denda.
-- status : se foi pago ou não.
-- data : data de venda.
-- unidademedida : unidade de venda, deve ser a mesma unidade do produto. Quando o produto é auterado gera inconsistência no sistema.
--

CREATE TABLE IF NOT EXISTS `Venda` (
  `id` int(8) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `quantidade` double NOT NULL,
  `valor` double NOT NULL,
  `desconto` double NOT NULL,
  `datavenda` datetime NOT NULL,
  `datapagamento` datetime NOT NULL,
  `status` varchar(20) NOT NULL,
  `pago` varchar(20) NOT NULL,
  `unidademedida` int(3) UNSIGNED NOT NULL,
  `estoque` int(7) UNSIGNED NOT NULL,
  `pedidosite` int(7) UNSIGNED NOT NULL,
  `usuario` int(6) UNSIGNED NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  INDEX usuario_indice(`usuario`),
  INDEX unidademedida_indice(`unidademedida`),
  INDEX estoque_indice(`estoque`),
  CONSTRAINT check_venda CHECK (`quantidade` > 0 OR `valor` >= 0 OR `desconto` >= 0),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`usuario`) REFERENCES Usuario(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`unidademedida`) REFERENCES Unidademedida(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`estoque`) REFERENCES Estoque(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Usuariopetshop`
--

CREATE TABLE IF NOT EXISTS `Usuariopetshop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(6) UNSIGNED NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  INDEX usuario_indice(`usuario`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`usuario`) REFERENCES Usuario(`id`) ON DELETE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

insert into Usuariopetshop(id, usuario, petshop) values(null, 1, 1);
insert into Usuariopetshop(id, usuario, petshop) values(null, 2, 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Historicologin`
-- Historico de login dos usuários.
--

CREATE TABLE IF NOT EXISTS `Historicologin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `usuario` int(6) UNSIGNED NOT NULL,
  `entrou` datetime NOT NULL,
  `saiu` datetime NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  INDEX usuario_indice(`usuario`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`usuario`) REFERENCES Usuario(`id`) ON DELETE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

--
-- Estrutura da tabela `Cliente`
-- status : indica se o cliente está ativo.
-- perfil : indica se o perfil do cliente e dos animais dele estão público ou privado.
--

CREATE TABLE IF NOT EXISTS `Cliente` (
  `id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(20) NOT NULL,
  `sobrenome` varchar(50) NOT NULL,
  `nascimento` varchar(20) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `ultimamudanca` datetime NOT NULL,
  `tipoUsuario` varchar(50) NOT NULL,
  `rg` varchar(50) NOT NULL,
  `cpf` varchar(50) NOT NULL,
  `endereco` varchar(200) NOT NULL,
  `bairro` int(6) UNSIGNED NOT NULL,
  `status` varchar(20) NOT NULL,
  `perfil` varchar(20) NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX bairro_indice(`bairro`),
  INDEX petshop_indice(`petshop`),
  FOREIGN KEY (`bairro`) REFERENCES Bairro(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- ------------------------------------------------------

--
-- Estrutura da tabela `Pedidossite`
-- status : finalizado ou em atendimento ou nao atendido.
-- cliente : id do cliente que fez o pedido.
-- usuario : responsavel por atender o pedido.
--

CREATE TABLE IF NOT EXISTS `Pedidosite` (
  `id` int(7) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `datapedido` datetime NOT NULL,
  `dataatendido` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `usuario` int(6) UNSIGNED NOT NULL,
  `cliente` int(7) UNSIGNED NOT NULL,
  `produto` int(6) UNSIGNED NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  INDEX produto_indice(`produto`),
  INDEX cliente_indice(`cliente`),
  INDEX usuario_indice(`usuario`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`produto`) REFERENCES Produto(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`cliente`) REFERENCES Cliente(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`usuario`) REFERENCES Usuario(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;     

ALTER TABLE `Venda` ADD CONSTRAINT chave_estrangeira_venda FOREIGN KEY (`pedidosite`) REFERENCES `Pedidosite`(`id`);

-- --------------------------------------------------------

--
-- Estrutura da tabela `Mensagem`
--

CREATE TABLE IF NOT EXISTS `Mensagem` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `data` datetime NOT NULL,
  `mensagem` varchar(7000) NOT NULL,
  `status` varchar(20) NOT NULL,
  `cliente` int(7) UNSIGNED NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX cliente_indice(`cliente`),
  INDEX petshop_indice(`petshop`),
  FOREIGN KEY (`cliente`) REFERENCES Cliente(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `TipoContato`
-- Cadastro de todos os Tipos de contatos
--

CREATE TABLE IF NOT EXISTS `Tipocontato` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

INSERT INTO `Tipocontato` (`id`, `nome`) VALUES
(1, 'sms'),
(2, 'email'),
(3, 'telefone'),
(4, 'celular'),
(5, 'facebook'),
(6, 'twiter'),
(7, 'whatsapp'),
(8, 'site'),
(9, 'celular1'),
(10, 'celular2'),
(11, 'telefone1'),
(12, 'telefone2'),
(13, 'celular3'),
(14, 'telefone3');

-- --------------------------------------------------------

--
-- Estrutura da tabela `Contato`
-- Cadastro de todos os contatos do cliente
--

CREATE TABLE IF NOT EXISTS `Contatocliente` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cliente` int(7) UNSIGNED NOT NULL,
  `tipocontato` int(11) NOT NULL,
  `nome` varchar(20) NOT NULL,
  `valor` varchar(100) NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  INDEX cliente_indice(`cliente`),
  INDEX tipocontato_indice(`tipocontato`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`cliente`) REFERENCES Cliente(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`tipocontato`) REFERENCES Tipocontato(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `TipoContatoPetshop`
-- Associação de todos os Tipos de contatos de cada petShop
--

CREATE TABLE IF NOT EXISTS `Tipocontatopetshop` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `petshop` int(6) UNSIGNED NOT NULL,
  `tipocontato` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  INDEX tipocontato_indice(`tipocontato`),
  INDEX petshop_indice(`petshop`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`tipocontato`) REFERENCES Tipocontato(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- ------------------------------------------------------

--
-- Estrutura da tabela `Porte`
--

CREATE TABLE IF NOT EXISTS `Porte` (
  `id` int(2) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

insert into Porte(id , nome) values(null, 'EXTRA PEQUENO');
insert into Porte(id , nome) values(null, 'PEQUENO');
insert into Porte(id , nome) values(null, 'MÉDIO');
insert into Porte(id , nome) values(null, 'GRANDE');
insert into Porte(id , nome) values(null, 'EXTRA GRANDE');

-- ------------------------------------------------------

--
-- Estrutura da tabela `Tipoanimal`
-- Exemplo : Cachorro, gato, pássaro, etc...
--

CREATE TABLE IF NOT EXISTS `Tipoanimal` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

 insert into Tipoanimal(nome) values('Cão');
 insert into Tipoanimal(nome) values('Gato');
 insert into Tipoanimal(nome) values('Furão');
 insert into Tipoanimal(nome) values('Mico');
 insert into Tipoanimal(nome) values('Coelho');
 insert into Tipoanimal(nome) values('Hamster');
 insert into Tipoanimal(nome) values('Rato');
 insert into Tipoanimal(nome) values('Camundongo');
 insert into Tipoanimal(nome) values('Porco da Índia');
 insert into Tipoanimal(nome) values('Chinchila');
 insert into Tipoanimal(nome) values('Gerbil');
 insert into Tipoanimal(nome) values('Esquilo');
 insert into Tipoanimal(nome) values('Piriquitos');
 insert into Tipoanimal(nome) values('Canário');
 insert into Tipoanimal(nome) values('Caturra');
 insert into Tipoanimal(nome) values('Cacatuas');
 insert into Tipoanimal(nome) values('Papagaios');
 insert into Tipoanimal(nome) values('Galinha');
 insert into Tipoanimal(nome) values('Araras');
 insert into Tipoanimal(nome) values('Mandarim');
 insert into Tipoanimal(nome) values('Agapornis');
 insert into Tipoanimal(nome) values('Tucano');
 insert into Tipoanimal(nome) values('Galah');
 insert into Tipoanimal(nome) values('Calafate');
 insert into Tipoanimal(nome) values('Cardeal');
 insert into Tipoanimal(nome) values('Curió');
 insert into Tipoanimal(nome) values('Canário-da-terra');
 insert into Tipoanimal(nome) values('Cágados');
 insert into Tipoanimal(nome) values('Tartarugas'); 
 insert into Tipoanimal(nome) values('Jabutis');
 insert into Tipoanimal(nome) values('Lagartos');
 insert into Tipoanimal(nome) values('Cobras');
 insert into Tipoanimal(nome) values('Sapos');
 insert into Tipoanimal(nome) values('Perereca');
 insert into Tipoanimal(nome) values('Salamandras');
 insert into Tipoanimal(nome) values('Peixes');
 insert into Tipoanimal(nome) values('Tarântulas');

-- ------------------------------------------------------

--
-- Estrutura da tabela `Tipoanimalpetshop`
--

CREATE TABLE IF NOT EXISTS `Tipoanimalpetshop` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `tipoanimal` int(4) UNSIGNED NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  INDEX tipoanimal_indice(`tipoanimal`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`tipoanimal`) REFERENCES Tipoanimal(`id`) ON DELETE RESTRICT,
  CONSTRAINT unique_tipoanimalpetshop UNIQUE (`tipoanimal`,`petshop`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- ------------------------------------------------------

--
-- Estrutura da tabela `Raca`
-- Exemplo : Fila, labrador, etc...
--

CREATE TABLE IF NOT EXISTS `Raca` (
  `id` int(4) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `origem` varchar(50) NOT NULL,
  `tipoanimalpetshop` int(4) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX tipoanimalpetshop_indice(`tipoanimalpetshop`),
  FOREIGN KEY (`tipoanimalpetshop`) REFERENCES Tipoanimalpetshop(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- ------------------------------------------------------

--
-- Estrutura da tabela `Animal`
-- Exemplo : Animal cadastrado no sistema.
--

CREATE TABLE IF NOT EXISTS `Animal` (
  `id` int(6) UNSIGNED ZEROFILL NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) NOT NULL,
  `registro` varchar(50) NOT NULL,
  `nascimento` datetime NOT NULL,
  `sexo` varchar(2) NOT NULL,
  `pelagem` varchar(50) NOT NULL,
  `dna` varchar(50) NOT NULL,
  `video` varchar(100) NOT NULL,
  `descricao` varchar(5000) NOT NULL,
  `status` varchar(20) NOT NULL,
  `raca` int(4) UNSIGNED NOT NULL,
  `pai` int(6) UNSIGNED NOT NULL,
  `mae` int(6) UNSIGNED NOT NULL,
  `cliente` int(7) UNSIGNED NOT NULL,
  `porte` int(2) UNSIGNED NOT NULL,
  `tipoanimalpetshop` int(4) UNSIGNED NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  INDEX raca_indice(`raca`),
  INDEX pai_indice(`pai`),
  INDEX mae_indice(`mae`),
  INDEX cliente_indice(`cliente`),
  INDEX porte_indice(`porte`),
  INDEX tipoanimal_indice(`tipoanimalpetshop`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`raca`) REFERENCES Raca(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`pai`) REFERENCES Animal(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`mae`) REFERENCES Animal(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`cliente`) REFERENCES Cliente(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`porte`) REFERENCES Porte(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`tipoanimalpetshop`) REFERENCES Tipoanimalpetshop(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- ------------------------------------------------------

--
-- Estrutura da tabela `ImagemAnimal`
-- São imagens associadas com os animais.
--

CREATE TABLE IF NOT EXISTS `Imagemanimal` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `url` varchar(200) NOT NULL,
  `status` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `animal` int(6) UNSIGNED NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX animal_indice(`animal`),
  INDEX petshop_indice(`petshop`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`animal`) REFERENCES Animal(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- -------------------------------------------------------

--
-- Estrutura da tabela `Geral`
-- cds = carregar_dados_site : habilita o carregamento dos dados.
-- padrão : já começa como padrão estar habilitado.
--          Usuários admin pode alterar.
--
-- inutil : deixa inútil o sistema. Boolean : true ou false.
--

CREATE TABLE IF NOT EXISTS `Geral` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cds` varchar(100) NOT NULL,
  `inutil` varchar(100) NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

insert into Geral(id,cds, inutil, petshop) values(null, 'true', 'false', 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `ContatoFornecedor`
-- Cadastro de todos os contatos dos fornecedores
--

CREATE TABLE IF NOT EXISTS `Contatofornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fornecedor` int(6) UNSIGNED NOT NULL,
  `tipocontato` int(11) NOT NULL,
  `valor` varchar(500) NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  INDEX fornecedor_indice(`fornecedor`),
  INDEX tipocontato_indice(`tipocontato`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`fornecedor`) REFERENCES Fornecedor(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`tipocontato`) REFERENCES Tipocontato(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `ContatoParceiros`
-- Cadastro de todos os contatos dos parceiros
--

CREATE TABLE IF NOT EXISTS `Contatoparceiros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parceiros` int(6) UNSIGNED NOT NULL,
  `tipocontato` int(11) NOT NULL,
  `valor` varchar(500) NOT NULL,
  `petshop` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX petshop_indice(`petshop`),
  INDEX parceiros_indice(`parceiros`),
  INDEX tipocontato_indice(`tipocontato`),
  FOREIGN KEY (`petshop`) REFERENCES Petshop(`id`) ON DELETE CASCADE,
  FOREIGN KEY (`parceiros`) REFERENCES Parceiros(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`tipocontato`) REFERENCES Tipocontato(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Enderecofornecedor`
--

CREATE TABLE IF NOT EXISTS `Enderecofornecedor` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(50) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `referencia` varchar(500) NOT NULL,
  `fornecedor` int(6) UNSIGNED NOT NULL,
  `bairro` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX fornecedor_indice(`fornecedor`),
  INDEX bairro_indice(`bairro`),
  FOREIGN KEY (`fornecedor`) REFERENCES Fornecedor(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`bairro`) REFERENCES Bairro(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `Enderecoparceiros`
--

CREATE TABLE IF NOT EXISTS `Enderecoparceiros` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `endereco` varchar(50) NOT NULL,
  `numero` varchar(20) NOT NULL,
  `cep` varchar(20) NOT NULL,
  `referencia` varchar(500) NOT NULL,
  `parceiros` int(6) UNSIGNED NOT NULL,
  `bairro` int(6) UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  INDEX parceiros_indice(`parceiros`),
  INDEX bairro_indice(`bairro`),
  FOREIGN KEY (`parceiros`) REFERENCES Parceiros(`id`) ON DELETE RESTRICT,
  FOREIGN KEY (`bairro`) REFERENCES Bairro(`id`) ON DELETE RESTRICT
) ENGINE=InnoDB  DEFAULT CHARSET=utf8;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
