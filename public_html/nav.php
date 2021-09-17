<p id="nav">

  <?php if ($pagetitle == 'home') { ?>
    Home
  <?php } else { ?>
    <a href="/index.php">Home</a>
  <?php } ?>
  &nbsp;&nbsp;&nbsp;

  <!--
  <?php if ($pagetitle == 'about') { ?>
    About
  <?php } else { ?>
    <a href="about.php">About</a>
  <?php } ?>
  &nbsp;&nbsp;&nbsp;
  -->

  <?php if ($pagetitle == 'pledges') { ?>
    Pledges
  <?php } else { ?>
    <a href="pledges.php">Pledges</a>
  <?php } ?>
  &nbsp;&nbsp;&nbsp;

  <?php if ($pagetitle == 'faq') { ?>
    FAQ
  <?php } else { ?>
    <a href="faq.php">FAQ</a>
  <?php } ?>
  &nbsp;&nbsp;&nbsp;

  <?php if ($pagetitle == 'create_pledge') { ?>
    Create a pledge
  <?php } else { ?>
    <?php if(array_key_exists("username", $_SESSION)) { ?>
      <a href="create_pledge.php" class="pledge-link">Create a pledge</a>
    <?php } else { ?>
      <a href="logged_out_create_pledge.php" class="pledge-link">Create a pledge</a>
    <?php } ?>
  <?php } ?>
  &nbsp;&nbsp;&nbsp;

  <?php if (!(array_key_exists("username", $_SESSION))) { ?>

    <?php if ($pagetitle == 'login') { ?>
      Login
    <?php } else { ?>
      <a href="login.php">Login</a>
    <?php } ?>
    &nbsp;&nbsp;&nbsp;

    <?php if ($pagetitle == 'register') { ?>
      Register
    <?php } else { ?>
      <a href="register.php">Register</a>
    <?php } ?>
    &nbsp;&nbsp;&nbsp;

    <?php if ($pagetitle == 'inquiry') { ?>
      Inquiry Form
    <?php } else { ?>
      <a href="inquiry.php">Inquiry Form</a>
    <?php } ?>
    &nbsp;&nbsp;&nbsp;

  <?php } ?>
  
</p>
