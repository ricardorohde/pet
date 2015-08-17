<!-- TELA DE LOGIN DO SITE -->
<div class="container" ng-controller="LoginController">
	<h1 class="text-center">Bem vindo ao PetShop.</h1>
	<form id="formLoginUsuario" class="form-signin centered" ng-class="formClass">
		<h4 class="form-signin-heading">Faça login para conectar</h4>
			
		<label for="inputEmail" class="sr-only">E-mail</label>
		<input type="text" id="inputEmail" class="form-control" placeholder="E-mail" required="true" autofocus="true" ng-model="login.email">
			
		<label for="senha" class="sr-only">Senha</label>
		<input type="password" id="senha" class="form-control" placeholder="Senha" required="true" ng-model="login.senha">
			
		<br />
		<input 
			id="btLogin" 
			class="btn btn-lg btn-primary btn-block" 
			ng-click="validar()" 
			title="Faça o login no site." type="button" 
			value="Fazer login" />
		
		<div class="checkbox">
			<label>
				<input type="checkbox" name="lembrar" value="Lembrar-me" ng-model="login.lembrar"> Lembrar-me
			</label>
		</div>
		<div class="form-group">
			<a href="<?php echo $this->createUrl('page/cadastro'); ?>">Cadastrar-se</a></li>
		</div>
	</form>
</div>