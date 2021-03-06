<div class="clearfix"></div>
<div class="form-horizontal">
    <div class="col-md-12 col-sm-12 col-xs-12">        
        <div class="x_panel">
            <div class="x_title">   
                <h4>Cadastrar Unidade de Saúde</h4>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">
                <br />                
                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="unidade">Unidade</label>
                    <div class="col-md-6">
                        <input type="text" id="unidade" name="unidade" required="required" class="form-control col-md-7 col-xs-12">
                    </div>                
                </div> 
                <div class="item form-group">
                    <label class="col-md-1 col-sm-3 col-xs-12" for="regional">Regional</label>
                    <div class="col-md-6">
                        <select class="form-control" id="regional" name="regional">
                            <option >Selecione</option>
                            <?php foreach ($regionais as $regional) : ?>
                                <option value="<?= $regional['id_regional'] ?>"><?= $regional['id_regional'] ?> - <?= $regional['nome_regional'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>                
                </div>   
                <div class="form-group">
                    <div style="float: right;">
                        <button id="gravar" class="btn btn-success btn-xs">Gravar</button>
                        <button id="limpar" class="btn btn-primary btn-xs" type="reset">Limpar</button>
                        <a href="<?php echo URL ?>/home">
                            <button class="btn btn-danger btn-xs" type="button">Cancelar</button>
                        </a>                                               
                    </div>
                </div>            
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/unidades/unidades.js"></script>

