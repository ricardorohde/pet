insert into Petshop(id, nome, descricao, cnpj, endereco, limiteusuario, tipocobranca, datainicio, datafim, sede) 
                values(null, 'PetDefault', 'Default de criação do usuário jonaskreling', '', '', 1, 'UNICO', '2015-07-27 00:00:00', '0000-00-00 00:00:00','N');

insert into Usuariopetshop(id, usuario, petshop) values(null, 1, 1);

insert into Geral(id,cds, inutil, petshop) values(null, 'true', 'false', 1);