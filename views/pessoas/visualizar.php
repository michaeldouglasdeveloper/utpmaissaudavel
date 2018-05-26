<div class="col-md-12">
    <div class="x_panel">
        <div class="x_title">
            <h2>Pessoas Cadastradas</h2>            
            <div class="clearfix"></div>
        </div>
        <div class="x_content">            
            <table id="datatable-buttons" class="table table-striped table-bordered" style="text-align: center">
                <thead>
                    <tr>
                        <th style="text-align: center">ID</th>
                        <th style="text-align: center">Nome</th>
                        <th style="text-align: center">Email</th>
                        <th style="text-align: center">Perfil</th>                        
                        <th style="text-align: center">Criado Em</th>
                        <th style="text-align: center">Ações</th>                        
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($pessoas as $pessoa) : ?>
                        <tr>
                            <td><?= $pessoa['id_pessoa'] ?></td>
                            <td><?= $pessoa['nome_pessoa'] ?></td>
                            <td><?= $pessoa['email'] ?></td>
                            <td><?= $pessoa['nome_perfil'] ?></td>                            
                            <?php $data = $pessoa['criado_em'] ?>
                            <td><?= date('d/m/Y', strtotime($data)) ?></td>
                            <td>
                                <button id="<?= $pessoa['id_pessoa']; ?>" onclick="editar(this.id)"  class="editar btn btn-info btn-xs">Editar</button>
                                <button id="<?= $pessoa['id_pessoa']; ?>" onclick="excluir(this.id)" class="excluir btn btn-danger btn-xs">Excluir</button>
                            </td>                            
                        </tr>                    
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>        
        <div id="modalEdit" class="modal fade" role="dialog" >
            <div class="modal-dialog">                
                <div class="modal-content" style="border-radius: 10px">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Editar Registro</h4>
                    </div>
                    <form id="form">
                        <div class="modal-body" id="formularioEdicao">       
                        </div>                        
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
                        <button id="btnEditar" class="btn btn-success btn-xs">Editar</button>
                    </div>
                </div>
            </div>
        </div>
        <div id="modalDelete" class="modal fade" role="dialog">
            <div class="modal-dialog">                
                <div class="modal-content" style="border-radius: 10px">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Excluir Registro</h4>
                    </div>
                    <form id="form">
                        <div class="modal-body" id="pessoa">       
                        </div>                        
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger btn-xs" data-dismiss="modal">Cancelar</button>
                        <button id="btnExcluir" class="btn btn-success btn-xs">Excluir</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/pessoas/pessoas.js"></script>
<script type="text/javascript" src="<?php echo URL; ?>/assets/js/jquery.mask.js"></script>
