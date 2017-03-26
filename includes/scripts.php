<!-- jQuery -->
<script src="<?= $project; ?>vendor/jquery/jquery.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="<?= $project; ?>vendor/bootstrap/js/bootstrap.min.js"></script>
<!-- Metis Menu Plugin JavaScript -->
<script src="<?= $project; ?>vendor/metisMenu/metisMenu.min.js"></script>
<!-- Morris Charts JavaScript -->
<script src="<?= $project; ?>vendor/raphael/raphael.min.js"></script>
<script src="<?= $project; ?>vendor/morrisjs/morris.min.js"></script>
<!-- Custom Theme JavaScript -->
<script src="<?= $project; ?>dist/js/sb-admin-2.js"></script>
<!-- Bootstrap FileInput -->
<script src="<?= $project; ?>vendor/bootstrap-fileinput/js/plugins/canvas-to-blob.min.js"></script>
<script src="<?= $project; ?>vendor/bootstrap-fileinput/js/plugins/sortable.min.js"></script>
<script src="<?= $project; ?>vendor/bootstrap-fileinput/js/plugins/purify.min.js"></script>
<script src="<?= $project; ?>vendor/bootstrap-fileinput/js/fileinput.min.js"></script>
<script src="<?= $project; ?>vendor/bootstrap-fileinput/themes/fa/theme.js"></script>
<script src="<?= $project; ?>vendor/bootstrap-fileinput/js/locales/pt-BR.js"></script>

<script type="text/javascript">
  $("#btnSair").click(function () {

    <?php if($_SESSION['tipo_usuario'] == 0){ ?>
    $.post('<?= $project; ?>sessions.php', {action: 'logoutAdmin'}, function () {
      location.href = <?= $project; ?>;
    });
    <?php } else { ?>
    $.post('<?= $project; ?>sessions.php', {action: 'logoutUser'}, function () {
      location.href = <?= $project; ?>;
    });
    <?php } ?>

  });

  $(document).ready(function () {
    $("ul").removeClass('in');
  });
  $("[data-toggle='tooltip']").tooltip();
</script>

<style>
  .hideSidebar {
    /*margin-left: 20px;*/
    /*margin-right: 20px;*/
  }
</style>

<script type="text/javascript">
  $(document).ready(function(){
    $('#page-wrapper').css("margin-left",0);
    $('.sidebar').css("left", -400);
    $('div#page-wrapper').find('.row').addClass("hideSidebar");
    $('div#page-wrapper').find('.row').removeClass("container");
  });

  var toggle = true;
  $('#ShowHide').click(toggleBar);

  function toggleBar() {
    toggle = !toggle;
    if (toggle) {
      $('#page-wrapper').animate({marginLeft: "0"});
      $('.sidebar').animate({left: -400});
      $('div#page-wrapper').find('.row').addClass("hideSidebar");
      $('div#page-wrapper').find('.row').removeClass("container");
    }
    else {
      $('#page-wrapper').animate({marginLeft: "250px"}, 400);
      $('.sidebar').animate({left: 0});
      $('div#page-wrapper').find('.row').removeClass("hideSidebar");
    }
  }

  if ($(window).width() < 755) {
    toggle = false;
    $('div#page-wrapper').find('.row').removeClass("hideSidebar");
    $('#ShowHide').hide();
  }

  $(window).resize(function () {
//		console.log($(window).width());
    if ($(window).width() < 755) {
      toggle = false;
      $('div#page-wrapper').find('.row').removeClass("hideSidebar");
      $('#ShowHide').hide();
    } else {
      $('#ShowHide').show();
    }
  });
</script>
