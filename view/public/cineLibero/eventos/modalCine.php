<!-- MODAL CADASTRO CINE LIBERO LUXARDO -->

<div class="modal fade" tabindex="-1" role="dialog" id="cadastroModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e4e8e;">
        <h2 class="modal-title" style="text-align:center;color:white">Cadastro de Evento</h2>
      </div>

      <form class="form-horizontal" method="post" action="<?= $project; ?>controller/cineLiberoCtrl.php" enctype="multipart/form-data">
        <div class="modal-body">

          <input type="hidden" name="view" value="public">
          <input type="hidden" name="tabela" value="evento">
          <input type="hidden" name="sOP" value="cadastro">
          <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Nome:</label>
            <div class="col-sm-10">
              <input id="nome" class="form-control" autofocus="autofocus" maxlength="80"
                     placeholder="Maximo de Caractéres 80" type="text" name="nome" required>
            </div>
          </div>
          
          <div class="form-group">
            <label for="descricao" class="col-sm-2 control-label">Descrição:</label>
            <div class="col-sm-10">
              <textarea id="descricao" class="form-control" placeholder="Caracteres Maximos 255" maxlength="255"
                        cols="30" rows="5" name="descricao" required></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="programacao" class="col-sm-2 control-label">Programação Regular:</label>
            <div class="col-sm-10">
              <textarea id="programacao" class="form-control" placeholder="Caracteres Maximos 80" maxlength="80"
                        cols="30" rows="5" name="progRegular" required></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="projeto" class="col-sm-2 control-label">Projetos:</label>
            <div class="col-sm-10">
              <textarea id="projeto" class="form-control" placeholder="Caracteres Maximos 80" maxlength="80"
                        cols="30" rows="5" name="projeto"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="horario" class="col-sm-2 control-label">Horário:</label>
            <div class="col-sm-10">
              <input type="text" name="horario" class="form-control horario" id="horario"
                     style="text-align:center" required>
            </div>
          </div>

          <div class="form-group">
            <label for="preco" class="col-sm-2 control-label">Preço:</label>
            <div class="col-sm-10">
              <input id="preco" type="text" name="preco" class="form-control" required>
            </div>
          </div>

          <div class="form-group">
            <label for="imgText" class="col-sm-2 control-label">Nome da imagem:</label>
            <div class="col-sm-10">
              <input type="text" name="imgText" id="testeIMG" class="form-control"/>
            </div>
          </div>

          <div class="form-group">
            <label for="fieldImg" class="col-sm-2 control-label">Selecione a imagem:</label>
            <div class="col-sm-10">
              <input type="file" name="imagem" id="fieldImg" class="file" data-preview-file-type="text"/>
            </div>
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

<!-- MODAL Alteração CINE LIBERO LUXARDO -->

<div class="modal fade" tabindex="-1" role="dialog" id="alteracaoModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e4e8e;">
        <h2 class="modal-title" style="text-align:center;color:white">Alteração de Evento</h2>
      </div>

      <form class="form-horizontal" method="post" action="<?= $project; ?>controller/cineLiberoCtrl.php" enctype="multipart/form-data">
        <div class="modal-body">

          <input type="hidden" name="view" value="public">
          <input type="hidden" name="tabela" value="evento">
          <input type="hidden" name="sOP" value="alteracao">
          <input type="hidden" id="idAlteracao" name="idEvento">
          <div class="form-group">
            <label for="nome" class="col-sm-2 control-label">Nome:</label>
            <div class="col-sm-10">
              <input id="nome" class="form-control nomeAlterar" autofocus="autofocus" maxlength="80"
                     placeholder="Maximo de Caractéres 80" type="text" name="nome" required>
            </div>
          </div>

          <div class="form-group">
            <label for="descricao" class="col-sm-2 control-label">Descrição:</label>
            <div class="col-sm-10">
              <textarea id="descricao" class="form-control descricaoAlterar" placeholder="Caracteres Maximos 255"
                        maxlength="255"
                        cols="30" rows="5" name="descricao" required></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="programacao" class="col-sm-2 control-label">Programação Regular:</label>
            <div class="col-sm-10">
              <textarea id="programacao" class="form-control programacaoAlterar" placeholder="Caracteres Maximos 80"
                        maxlength="80"
                        cols="30" rows="5" name="progRegular" required></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="projeto" class="col-sm-2 control-label">Projetos:</label>
            <div class="col-sm-10">
              <textarea id="projeto" class="form-control projetoAlterar" placeholder="Caracteres Maximos 80"
                        maxlength="80"
                        cols="30" rows="5" name="projeto"></textarea>
            </div>
          </div>

          <div class="form-group">
            <label for="horario" class="col-sm-2 control-label">Horário:</label>
            <div class="col-sm-10">
              <input type="text" name="horario" class="form-control horario horarioAlterar" id="horario"
                     style="text-align:center" required>
            </div>
          </div>

          <div class="form-group">
            <label for="preco" class="col-sm-2 control-label">Preço:</label>
            <div class="col-sm-10">
              <input id="preco" type="text" name="preco" class="form-control precoAlterar" style="text-align: center"
                     required>
            </div>
          </div>

          <div class="form-group">
            <label for="imagem" class="col-sm-2 control-label"><span class="imgLabel"></span></label>
            <div class="col-sm-10">
              <div style="text-align:center" class="imgDivAlterar">
                <img class="form-control imgAlterar" id="imagem" style="width:65%;height:50%;"/>
              </div>
              <input type="hidden" name="imgText" class="form-control imgTextAlterar"/>
            </div>
            <label for="fieldImg" class="col-sm-2 control-label">Selecione a imagem:</label>
            <div class="col-sm-10">
              <input type="file" name="imagem" id="fieldImg" class="file" data-preview-file-type="text"/>
            </div>
          </div>

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

<!-- MODAL Remoção CINE LIBERO LUXARDO -->

<div class="modal fade" tabindex="-1" role="dialog" id="remocaoModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header" style="background-color:#4e4e8e;">
        <h2 class="modal-title" style="text-align:center;color:white">Exclusão de Evento</h2>
      </div>

      <form class="form-horizontal" method="post" action="<?= $project; ?>controller/cineLiberoCtrl.php">
        <div class="modal-body">

          <input type="hidden" name="view" value="public">
          <input type="hidden" name="tabela" value="evento">
          <input type="hidden" name="sOP" value="remocao">
          <input type="hidden" id="idRemocao" name="idEvento">

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

<script src="<?= $project; ?>js/jquery-ui.min.js"></script>
<script src="<?= $project; ?>js/jquery.datetimepicker.full.js"></script>
<script>
  $("document").ready(function () {
    $.datetimepicker.setLocale('pt');
    $('.horario').datetimepicker({
      beforeShow: function(){$('input').blur();},
      step: 5,
      format: 'd/m/Y H:i',
      formatDate: 'd/m/Y'
    });
  });

  // Limpa campos de data e horario ao clicar!
  $('.data').click(function () {
    $(this).val("");
  });
  $('.horario').click(function () {
    $(this).val("");
  });

  $('#cadastroModal').on('shown.bs.modal', function () {
    $('#nome').focus()
  });
</script>