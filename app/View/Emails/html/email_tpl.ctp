<?php
$url =
    sprintf( 'id=%s&email=%s&uid=%s&datetime=%s',$id,$email,$uid,$date);
?>


<h1> Seja Bem Vindo ao COMPET </h1>

    <p>Clique no link para ativar seu Login :
        http://localhost/MiniCompet/Users/checkActivate?<?php echo $url ; ?></p>

);