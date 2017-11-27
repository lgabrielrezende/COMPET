<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
    <meta name="viewport" content="width=1,initial-scale=1,user-scalable=1"/>
    <title><?= "Login::".$title_for_layout?></title>

    <link
        href="http://fonts.googleapis.com/css?family=Lato:100italic,100,300italic,300,400italic,400,700italic,700,900italic,900"
        rel="stylesheet" type="text/css">
    <?php print $this->Html->css(['bootstrap3/bootstrap.min', 'style-login', 'font-awesome/css/font-awesome.min']); ?>


</head>
<body>

<section class="container">
    <section class="login-form">

        <?= $content_for_layout?>
    </section>
</section>

<!--<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<!--<script src="assets/bootstrap/js/bootstrap.min.js"></script>-->
<?php
print $this->Html->script(['jquery-1.11.3/jquery.min', 'bootstrap3/bootstrap.min']);
?>
</body>
</html>