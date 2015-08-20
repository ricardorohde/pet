<div class="modal fade" id="modalCadastroParceiros" role="dialog" aria-labelledby="myModalLabel">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title text-left" id="myModalLabel">Cadastro de Parceiro</h4>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#perfilParceiros" data-toggle="tab">Perfil</a></li>
					<li><a href="#contatosParceiros" data-toggle="tab">Contatos</a></li>
					<li><a href="#enderecoParceiros" data-toggle="tab">Endere&ccedil;o</a></li>
					<li><a href="#logoParceiros" data-toggle="tab">Logo</a></li>
					<li><a href="#descricaoParceiros" data-toggle="tab">Descri&ccedil;&atilde;o</a></li>
				</ul>
				<div id="myTabContent" class="tab-content">
					<div class="tab-pane fade active in" id="perfilParceiros">
						<form class="form-horizontal">
							<br />
							<div class="form-group text-left">
								<label for="nome" class="control-label col-xs-2 text-left">Nome:</label>
								<div class="col-xs-10">
									<input type="text" class="form-control input-sm" id="nome" placeholder="Nome do Fornecedor" ng-model="parceiros.nome" maxlength="50">
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane fade" id="contatosParceiros">
						<form class="form-horizontal">
							<br />
							<div class="form-group text-left">
								<label for="celular1" class="control-label col-xs-2 text-left">Celular:</label>
								<div class='col-xs-4'>
									<input type="text" class="form-control input-sm" id="celular1" ng-model="parceiros.contato.celular1.valor" placeholder="(XX) 9999-9999" ui-br-phone-number>
								</div>
								<label for="celular2" class="control-label col-xs-2 text-left">Celular:</label>
								<div class='col-xs-4'>
									<input type="text" class="form-control input-sm" id="celular2" ng-model="parceiros.contato.celular2.valor" placeholder="(XX) 9999-9999" ui-br-phone-number>
								</div>
							</div>
							<div class="form-group text-left">
								<label for="telefone1" class="control-label col-xs-2 text-left">Telefone:</label>
								<div class='col-xs-4'>
									<input type="text" class="form-control input-sm" id="telefone1" ng-model="parceiros.contato.telefone1.valor" placeholder="(XX) 9999-9999" ui-br-phone-number>
								</div>
								<label for="telefone2" class="control-label col-xs-2 text-left">Telefone:</label>
								<div class='col-xs-4'>
									<input type="text" class="form-control input-sm" id="telefone2" ng-model="parceiros.contato.telefone2.valor" placeholder="(XX) 9999-9999" ui-br-phone-number>
								</div>
							</div>
							<div class="form-group text-left">
								<label for="email" class="control-label col-xs-2 text-left">Email:</label>
								<div class='col-xs-10'>
									<input type="text" class="form-control input-sm" id="email" ng-model="parceiros.contato.email.valor" placeholder="contato@fornecedor.com.br">
								</div>
							</div>
							<div class="form-group text-left">
								<label for="site" class="control-label col-xs-2 text-left">Site:</label>
								<div class='col-xs-10'>
									<input type="text" class="form-control input-sm" id="site" placeholder="www.fornecedor.com.br" ng-model="parceiros.contato.site.valor" maxlength="200">
								</div>
							</div>
							<div class="form-group text-left">
								<label for="facebook" class="control-label col-xs-2 text-left">Facebook:</label>
								<div class='col-xs-10'>
									<input type="text" class="form-control input-sm" id="facebook" placeholder="https://www.facebook.com/jonas.kreling" ng-model="parceiros.contato.facebook.valor" maxlength="200">
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane fade" id="enderecoParceiros">
						<form class="form-horizontal">
							<br />
							<div class="form-group text-left">
								<label for="rua" class="control-label col-xs-2 modal-padding">Rua:</label>
								<div class='col-xs-7 modal-padding'>
									<input type="text" class="form-control input-sm" id="rua" ng-model="parceiros.endereco.endereco" placeholder="Rua ....">
								</div>
								<label for="numero" class="control-label col-xs-1 modal-padding">N&deg;:</label>
								<div class='col-xs-2 modal-padding'>
									<input type="text" class="form-control input-sm" id="numero" ng-model="parceiros.endereco.numero" ui-number-mask="0" ui-hide-group-sep>
								</div>
							</div>
							<div class="form-group text-left">
								<label for="bairro" class="control-label col-xs-2 modal-padding">Bairro:</label>
								<div class='col-xs-7 modal-padding'>
									<div class="input-group">
										<input type="text" class="form-control input-sm" id="bairro" ng-model="parceiros.endereco.bairronome" ng-disabled="true" >
										<span class="input-group-addon input-sm hand" data-toggle="modal" data-target="#modalSelectBairro" ng-click="findAllBairroPetshop()">
					                        <i class="glyphicon glyphicon-search"></i>
					                    </span>
               						</div>
								</div>
								<label for="cep" class="control-label col-xs-1 modal-padding">CEP:</label>
								<div class='col-xs-2 modal-padding'>
									<input type="text" class="form-control input-sm" id="cep" placeholder="99999-999" ng-model="parceiros.endereco.cep" ui-br-cep-mask>
								</div>
							</div>
							<div class="form-group text-left">
								<label for="cidade" class="control-label col-xs-2 modal-padding">Cidade:</label>
								<div class='col-xs-10 modal-padding'>
									<input type="text" class="form-control input-sm" id="cidade" ng-model="parceiros.endereco.cidadenome" ng-disabled="true" >
								</div>
							</div>
							<div class="form-group text-left">
								<label for="estado" class="control-label col-xs-2 modal-padding">Estado:</label>
								<div class='col-xs-10 modal-padding'>
									<input type="text" class="form-control input-sm" id="estado" ng-model="parceiros.endereco.estadonome" ng-disabled="true">
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane fade" id="logoParceiros">
						<form class="form-horizontal">
							<br />
							<div class="form-group text-left">
								<imagem-upload></imagem-upload>
							</div>
							<div class="form-group text-left">
								<div class="col-xs-6 col-xs-offset-3">
									<a href="javascript:;" class="thumbnail" ng-if="parceiros.logo.url != ''">
										<img ng-src="{{parceiros.logo.url}}" />
									</a>
								</div>
							</div>
						</form>
					</div>
					<div class="tab-pane fade" id="descricaoParceiros">
						<form class="form-horizontal">
							<br />
							<div class="form-group text-left">
								<label for="descricao" class="control-label col-xs-2 text-left">Descri&ccedil;&atilde;o:</label>
								<div class="col-xs-10">
									<textarea class="form-control input-sm" id="descricao" placeholder="Descri&ccedil;&atilde;o do Parceiro de Neg&oacute;cios" rows="3" ng-model="parceiros.descricao" maxlength="500">
			                    
			                		</textarea>
			                	</div>
							</div>
						</form>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Fechar</button>
				<button type="button" class="btn btn-primary btn-sm" data-dismiss="modal" ng-click="salvar()" ng-disabled="fornecedor.isNotSave">Salvar</button>
			</div>
		</div>
	</div>
</div>