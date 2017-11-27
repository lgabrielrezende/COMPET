<?= $this->Form->create('User', array('class' => 'form-horizontal', 'novalidate')); ?>
<div class="row">
    <div class="col-lg-6">
        <?php
        print $this->B3Form->input('User.name', ['placeholder' => 'Nome do usuário']);
        print $this->B3Form->input('User.email', ['placeholder' => 'exemplo@dominio.com', 'type' => 'email']);
        print $this->B3Form->input('User.profile_id', ['empty' => '-- Selecione --']);
        ?>
        <?= $this->element("form/submit-b3", ['cancel' => '/users']) ?>
    </div>

    <div class="col-lg-4 col-lg-offset-2">
        <div class="alert alert-block alert-info">
            <a class="close" data-dismiss="alert">×</a>
            Por padr&atilde;o, a senha para o novo usu&aacute;rio ser&aacute; "<strong>123456</strong>". Cada Usu&aacute;rio
            deve modificar sua pr&oacute;pria senha ao realizar seu primeiro acesso ao sistema.
        </div>
    </div>
</div>






