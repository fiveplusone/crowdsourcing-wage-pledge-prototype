<?php if (isset($_SESSION["error"])) { ?>
  <div id="error"><?php echo $_SESSION["error"]; ?></div>
  <?php unset($_SESSION["error"]); ?>
<?php } ?>

<?php if (isset($_SESSION["notice"])) { ?>
  <div id="notice"><?php echo $_SESSION["notice"]; ?></div>
  <?php unset($_SESSION["notice"]); ?>
<?php } ?>
