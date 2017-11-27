<!--<script type="text/javascript">-->
<!--    $(document).ready(function () {-->
<!--        $('form').submit(function (event) {-->
<!---->
<!--            $('button.btn').attr('disabled', 'disabled').addClass('disabled');-->
<!--            $('div.spinner').show();-->
<!--        });-->
<!--    });-->
<!--</script>-->

<?= $this->Form->create("User", array("action" => "login",'role'=>'login','novalidate')) ?>
<h2><?= $title_for_layout ?></h2>
<p>Informe seu usuário e senha</p>
<?=  $this->FrontEnd->message(); ?>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon"><span class="text-primary fa fa-user"></span></div>
        <?= $this->Form->input("User.email", ["label" => false, 'div' => false, 'class' => 'form-control','placeholder'=>'Usuário']);?>
    </div>
</div>
<div class="form-group">
    <div class="input-group">
        <div class="input-group-addon"><span class="text-primary fa fa-lock"></span></div>
        <?=$this->Form->input("User.password", array("label" => false, 'div' => false,'class' => 'form-control','placeholder'=>'Senha'));?>
    </div>
</div>
        <?= $this->Form->button('Entrar', array('type' => 'submit', 'class' => 'btn btn-block btn-success')) ?>
        <?= $this->Html->link('Esqueceu sua senha?','#',['class'=>'btn btn-block btn-default']); ?>
</div>

<?= $this->Form->end() ?>