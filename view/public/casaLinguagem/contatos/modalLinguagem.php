<!-- MODAL CADASTRO CASA LINGUAGEM -->

<div class="modal fade" tabindex="-1" role="dialog" id="cadastroModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e4e8e;">
        <h2 class="modal-title" style="text-align:center;color:white">Cadastro de Contato</h2>
      </div>

      <form class="form-horizontal" method="post" action="<?php echo $project; ?>controller/casaLinguagemCtrl.php">
        <div class="modal-body">

          <input type="hidden" name="view" value="public">
          <input type="hidden" name="tabela" value="contato">
          <input type="hidden" name="sOP" value="cadastro">
          <div class="form-group">
            <label for="areaAtuacao" class="col-sm-2 control-label">Área de Atuacao:</label>
            <div class="col-sm-10">
              <input id="areaAtuacao" class="form-control" name="areaAtuacao" required></input>
            </div>
          </div>
          <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Nome:</label>
            <div class="col-sm-10">
              <input id="nome" class="form-control" type="text" name="nome" required>
            </div>
          </div>

          <div class="form-group">
            <label for="numero" class="col-sm-2 control-label">Número:</label>
            <div class="col-sm-10">
              <input id="numero" class="form-control" type="text" name="numero" required>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">E-mail:</label>
            <div class="col-sm-10">
              <input id="email" class="form-control" type="email" name="email" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-md pull-left" data-dismiss="modal" style="padding: 6 100">
            Fechar
          </button>
          <button type="submit" class="btn btn-success" style="padding: 6 100">Cadastrar</button>
        </div>
      </form>

    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->


<!-- --------------------------------------------------------------------------------------------------------- -->

<!-- MODAL Alteração CASA LINGUAGEM -->

<div class="modal fade" tabindex="-1" role="dialog" id="alteracaoModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e4e8e;">
        <h2 class="modal-title" style="text-align:center;color:white">Alteração de Contato</h2>
      </div>

      <form class="form-horizontal" method="post" action="<?php echo $project; ?>controller/casaLinguagemCtrl.php">
        <div class="modal-body">

          <input type="hidden" name="view" value="public">
          <input type="hidden" name="tabela" value="contato">
          <input type="hidden" name="sOP" value="alteracao">
          <input type="hidden" id="idAlteracao" name="idContato">
          <div class="form-group">
            <label for="areaAtuacao" class="col-sm-2 control-label">Área de Atuacao:</label>
            <div class="col-sm-10">
              <input id="areaAtuacao" class="form-control areaAtuacaoAlterar" name="areaAtuacao" required></input>
            </div>
          </div>
          <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Nome:</label>
            <div class="col-sm-10">
              <input id="nome" class="form-control nomeAlterar" type="text" name="nome" required>
            </div>
          </div>

          <div class="form-group">
            <label for="numero" class="col-sm-2 control-label">Número:</label>
            <div class="col-sm-10">
              <input id="numero" class="form-control numeroAlterar" type="text" name="numero" required>
            </div>
          </div>
          <div class="form-group">
            <label for="email" class="col-sm-2 control-label">E-mail:</label>
            <div class="col-sm-10">
              <input id="email" class="form-control emailAlterar" type="email" name="email" required>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger btn-md pull-left" data-dismiss="modal" style="padding: 6 100">
            Fechar
          </button>
          <button type="submit" class="btn btn-success" style="padding: 6 100">Alterar</button>
        </div>
      </form>

    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- --------------------------------------------------------------------------------------------------------- -->

<!-- MODAL Remoção CASA LINGUAGEM -->

<div class="modal fade" tabindex="-1" role="dialog" id="remocaoModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e4e8e;">
        <h2 class="modal-title" style="text-align:center;color:white">Exclusão de Contato</h2>
      </div>

      <form class="form-horizontal" method="post" action="<?php echo $project; ?>controller/casaLinguagemCtrl.php">
        <div class="modal-body">

          <input type="hidden" name="view" value="public">
          <input type="hidden" name="tabela" value="contato">
          <input type="hidden" name="sOP" value="remocao">
          <input type="hidden" id="idRemocao" name="idContato">

          <h2 align="center">Deseja excluir esta entrada?</h2>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-md pull-left" data-dismiss="modal" style="padding: 6 100">
              Fechar
            </button>
            <button type="submit" class="btn btn-success" style="padding: 6 100">Excluir</button>
          </div>
      </form>

    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script>
  $('#cadastroModal').on('shown.bs.modal', function () {
    $('#areaAtuacao').focus()
  });
</script>