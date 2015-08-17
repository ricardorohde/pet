<div class="tab-pane fade" id="rede">
    <form class="form-horizontal">
        <br />
        <div class="alert alert-dismissible alert-success" ng-if="petshop.listapetshopredeconvidado.length > 0">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Esse PetShop foi convidado!</strong> 
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="javascript:;" class="alert-link" ng-click="aceitarConvite()">
                Aceitar convite
            </a>
            &nbsp;&nbsp;&nbsp;&nbsp;
            <a href="javascript:;" class="alert-link" ng-click="rejeitarConvite()">
                Rejeitar convite
            </a>
            <p ng-if="petshop.listapetshopredeconvidado.0.mensagem != undefined && petshop.listapetshopredeconvidado.0.mensagem != ''">
                {{petshop.listapetshopredeconvidado.0.mensagem}}
            </p>
        </div>
    </form>
    <div class="row">
    	<div class='col-xs-6'>
        	<h4>Redes Associadas ({{petshop.listapetshoprede.length}})</h4>
        </div>
        <div class='col-xs-6'>
        	<div class="form-group text-right">
                <button type="submit" class="btn btn-primary btn-sm" ng-click="iniciar()">
                	<span class="glyphicon glyphicon-refresh" aria-hidden="true"></span>
                	Carregar
                </button>
        	</div>
        </div>
        <div class='col-xs-12'>
    		<div class="table-responsive">
    			<table class="table table-hover table-striped bottom">
    				<thead>
    					<tr class="active">
    						<th class='text-center hand' width="10%" ng-click="order('rede')">Código</th>
    						<th class='text-left hand' ng-click="order('redenome')">
    							Rede
    						</th>
    						<th class='text-left hand' width="30%" ng-click="order('usuarionome')">
    							Proprietário
    						</th>
    						<th class='text-center' width="10%" ng-click="order('sede')">
    						    Sede
                            </th>
    						<th class='text-center' width="10%">
    						    Excluir
                            </th>
    					</tr>
    				</thead>
    			</table>
    		</div>
    		<div class="table-responsive">
    			<table class="table table-hover table-striped">
    				<tbody>
    					<tr class='hand' ng-repeat='petshoprede in petshop.listapetshoprede | filter:busca | orderBy:predicate:reverse'>
    						<th class='text-center' scope='row' width='10%'>{{petshoprede.rede}}</th>
    						<td class='text-left text-capitalize' >{{petshoprede.redenome}}</td>
    						<td class='text-left text-capitalize' width="30%">{{petshoprede.usuarionome}}</td>
    						<td class='text-center' ng-class="petshoprede.sede == 'S'? 'text-success':'text-warning'" width='10%'>
    						    <span class="glyphicon" aria-hidden="true" ng-class="petshoprede.sede == 'S' ? 'glyphicon-ok':'glyphicon-remove'"></span>
                            </td>
    						<td class='text-center text-danger' width='10%'>
    						    <i class='glyphicon glyphicon-trash' ng-click='deletarPetshoprede(petshoprede)'></i>
                            </td>
    					</tr>
    				</tbody>
    			</table>
    		</div>
    	</div>
    </div>
</div>