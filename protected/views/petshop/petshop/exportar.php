<div class="tab-pane fade" id="exportar">
    <form class="form-horizontal">
        <br />
        <div class="form-group">
            <div class="col-xs-10 col-xs-offset-2">
                Os dados serão exportados em formato TXT.
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6 col-xs-offset-2">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Cliente
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="col-xs-6 col-xs-offset-2">
                <div class="checkbox">
                    <label>
                        <input type="checkbox"> Animal
                    </label>
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="console" class="col-lg-2 control-label"></label>
            <div class="col-lg-10">
                <textarea class="form-control input-sm" id="console" rows="5" ng-model="petshop.exportar.console" disabled="true">
                    
                </textarea>
            </div>
        </div>
        <div class="form-group">
            <div class="col-lg-10 col-lg-offset-2 text-right">
                <button type="submit" class="btn btn-primary btn-sm" ng-click="exportar()">
                    <i class="glyphicon glyphicon-save"></i>
                    Exportar
                </button>
            </div>
        </div>
    </form>
</div>