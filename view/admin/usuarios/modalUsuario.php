<!-- MODAL CADASTRO USUARIOS -->

<div class="modal fade" tabindex="-1" role="dialog" id="cadastroModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e4e8e;">
        <h2 class="modal-title" style="text-align:center;color:white">Cadastro de Usuário</h2>
      </div>

      <form class="form-horizontal" method="post" action="<?php echo $project; ?>controller/UsuarioCtrl.php">
        <div class="modal-body">

          <input type="hidden" name="sOP" value="cadastro">
          <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Nome:</label>
            <div class="col-sm-10">
              <input id="nome" class="form-control" type="text" name="nome" required>
            </div>
          </div>
          <div class="form-group">
            <label for="login" class="col-sm-2 control-label">Login:</label>
            <div class="col-sm-10">
              <input id="login" class="form-control" type="text" name="login" required>
            </div>
          </div>
          <div class="form-group">
            <label for="senha" class="col-sm-2 control-label">Senha:</label>
            <div class="col-sm-10">
              <input id="senha" class="form-control" type="password" name="senha" required>
            </div>
          </div>
          <div class="form-group">
            <label for="tipo" class="col-sm-2 control-label">Tipo de Usuário:</label>
            <div class="col-sm-10">
              <select id="tipo" class="form-control tipo" name="tipo" required>
                <option></option>
                <option value="1">Moderador</option>
                <option value="2">Gerente</option>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="gerente" class="col-sm-2 control-label">Gerente:</label>
            <div class="col-sm-10">
              <select id="gerente" class="form-control" name="gerente" required>
                <option></option>
                <?php foreach ($user->listarIDGerente(2) as $data2) { ?>
                  <option value="<?php echo $data2["id_usuario"]; ?>"><?php echo $data2["nome_usuario"]; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>
          <div class="form-group">
            <label for="setor" class="col-sm-2 control-label">Setor:</label>
            <div class="col-sm-10">
              <select id="setor" class="form-control" name="setor" required>
                <option></option>
                <?php foreach ($user->listarSetoresUsuario() as $data3) { ?>
                  <option value="<?php echo $data3["id_setor"]; ?>"><?php echo $data3["nome"]; ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-md pull-left botao-fechar" data-dismiss="modal">
              Fechar
            </button>
            <button type="submit" class="btn btn-success botao-cadastro">Cadastrar</button>
          </div>
      </form>

    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- --------------------------------------------------------------------------------------------------------- -->

<!-- MODAL Alteração USUARIOS -->

<div class="modal fade" tabindex="-1" role="dialog" id="alteracaoModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e4e8e;">
        <h2 class="modal-title" style="text-align:center;color:white">Alteração de Usuário</h2>
      </div>

      <form class="form-horizontal" method="post" action="<?php echo $project; ?>controller/UsuarioCtrl.php">
        <div class="modal-body">

          <input type="hidden" name="sOP" value="alteracao">
          <input type="hidden" id="idAlteracao" name="idUsuario">
          <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Nome:</label>
            <div class="col-sm-10">
              <input id="nome" class="form-control nomeAlterar" type="text" name="nome" required>
            </div>
          </div>
          <div class="form-group">
            <label for="login" class="col-sm-2 control-label">Login:</label>
            <div class="col-sm-10">
              <input id="login" class="form-control loginAlterar" type="text" name="login" required>
            </div>
          </div>
          <div class="form-group">
            <label for="senha" class="col-sm-2 control-label">Senha:</label>
            <div class="col-sm-10">
              <input id="senha" class="form-control senhaAlterar" type="password" name="senha" required>
            </div>
          </div>
          <div class="form-group">
            <label for="tipo" class="col-sm-2 control-label">Tipo de Usuário:</label>
            <div class="col-sm-10">
              <select id="tipo" class="form-control tipo tipoAlterar" name="tipo" required>
                <option></option>
                <option value="1">Moderador</option>
                <option value="2">Gerente</option>
              </select>
            </div>
          </div>
          <div class="form-group">
<!--            <div class="cadastroGerente">-->
<!--              <div id="itens">-->
                <label for="gerente" class="col-sm-2 control-label">Gerente:</label>
                <div class="col-sm-10">
                  <select id="gerente" class="form-control gerenteAlterar" name="gerente" required>
                    <option></option>
                    <?php foreach ($user->listarIDGerente(2) as $data2) { ?>
                      <option value="<?php echo $data2["id_usuario"]; ?>"><?php echo $data2["nome_usuario"]; ?></option>
                    <?php } ?>
                  </select>
                </div>
<!--              </div>-->
<!--            </div>-->
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-md pull-left botao-fechar" data-dismiss="modal">
              Fechar
            </button>
            <button type="submit" class="btn btn-success botao-alterar">Alterar</button>
          </div>
      </form>

    </div>
  </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<!-- --------------------------------------------------------------------------------------------------------- -->

<!-- MODAL Remoção USUARIOS -->

<div class="modal fade" tabindex="-1" role="dialog" id="remocaoModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e4e8e;">
        <h2 class="modal-title" style="text-align:center;color:white">Exclusão de Usuário</h2>
      </div>

      <form class="form-horizontal" method="post" action="<?php echo $project; ?>controller/UsuarioCtrl.php">
        <div class="modal-body">

          <input type="hidden" name="sOP" value="remocao">
          <input type="hidden" id="idRemocao" name="idUsuario">

          <h2 align="center">Deseja excluir esta entrada?</h2>

          <div class="modal-footer">
            <button type="button" class="btn btn-danger btn-md pull-left botao-fechar" data-dismiss="modal">
              Fechar
            </button>
            <button type="submit" class="btn btn-success botao-remover">Excluir</button>
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

//  $('.tipo').change(function () {
//    var id = $(this).val();
//    if (id == 1) {
//      var text = "";
//      text += '<div id="itens">';
//      text += '<label for="gerente" class="col-sm-2 control-label">Gerente:</label>';
//      text += '<div class="col-sm-10">';
//      text += '<select id="gerente" class="form-control gerenteAlterar" name="gerente" required>';
//      text += '<option></option>';
//      text += '<?php //foreach ($user->listarIDGerente(2) as $data2){ ?>//';
//      text += '<option value="<?php //echo $data2["id_usuario"]; ?>//">';
//      text += '<?php //echo $data2["nome_usuario"]; ?>//';
//      text += '</option>';
//      text += '<?php //} ?>//';
//      text += '</select>';
//      text += '</div>';
//      text += '</div>';
//      $('.cadastroGerente').append(text);
//    } else {
//      $('.cadastroGerente').children().remove();
//    }
//  });
</script>