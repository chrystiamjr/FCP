<!-- jQuery -->
<script src="<?php echo $project; ?>vendor/jquery/jquery.min.js"></script>

<!-- Bootstrap Core JavaScript -->
<script src="<?php echo $project; ?>vendor/bootstrap/js/bootstrap.min.js"></script>

<!-- Metis Menu Plugin JavaScript -->
<script src="<?php echo $project; ?>vendor/metisMenu/metisMenu.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php echo $project; ?>vendor/raphael/raphael.min.js"></script>
<script src="<?php echo $project; ?>vendor/morrisjs/morris.min.js"></script>

<!-- Custom Theme JavaScript -->
<script src="<?php echo $project; ?>dist/js/sb-admin-2.js"></script>

<script type="text/javascript">
  $("#btnSair").click(function () {

    <?php if($_SESSION['tipo_usuario'] == 0){ ?>
    $.post('<?php echo $project; ?>sessions.php', {action: 'logoutAdmin'}, function () {
      location.href = <?php echo $project; ?>;
    });
    <?php } else { ?>
    $.post('<?php echo $project; ?>sessions.php', {action: 'logoutUser'}, function () {
      location.href = <?php echo $project; ?>;
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
  var toggle = false;
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
