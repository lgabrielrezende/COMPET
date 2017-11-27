<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="Domingos">
    <link rel="icon" href="../../favicon.ico">

    <title><?= $title_for_layout ?></title>

    <?php
    print $this->Html->css(['bootstrap3/bootstrap.min', 'bootstrap3/custom', 'font-awesome/css/font-awesome.min', 'belladonna']);
    print $scripts_for_layout;
    ?>
    <!-- Bootstrap core JavaScript
  ================================================== -->
    <?php
    print $this->Html->script(['jquery-1.11.3/jquery.min', 'bootstrap3/bootstrap.min']);
    ?>

</head>

<body>
    <!--Menu bootstrap 3.x-->
    <?= $this->element('menu-bootstrap3', ['title' => $title_for_layout]); ?>

    <div id="content-main" class="container">
        <?php
        print $this->FrontEnd->getHeader( $this->name, $this->action, $subtitle );
        print $this->FrontEnd->message();
        print $this->FrontEnd->getSubMenu( $submenu, $this->name, $this->action );
        ?>
        <div class="bella-main-container">
            <div id="content">
                <?= $content_for_layout ?></div>
            <div class="clear"></div>
        </div>
    </div><!-- /.container -->
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <div class="container log-sql">
        <?= $this->element('sql_dump') ?>
    </div>
</body>
</html>
