<?php
print $this->Form->create('User', array('class' => 'form-horizontal', 'novalidate'));
?>

<div class="row">
	<div class="col-lg-5 pull-left">
		<div class="form-group">
			<h4>Dados do Usuário</h4>
			<hr/>
		</div>
		<?php
		print $this->Form->hidden('User.id');
		print $this->B3Form->input('User.name', ['placeholder' => 'Nome do usuário']);
		print $this->B3Form->input('User.email', ['Email', 'placeholder' => 'exemplo@dominio.com', 'type' => 'email']);
		?>
		<?= $this->element("form/submit-b3", array('cancel' => "/")) ?>
	</div>

	<div class="col-lg-5 pull-right">
		<div class="form-group">
			<h4>Mudança de senha</h4>
			<hr/>
			<p class="small text-danger">Preencha apenas se desejar modificar a senha atual</p>
		</div>
		<?php
		print $this->B3Form->input('User.newPassword', array('label' => 'Nova senha', 'type' => 'password', 'autocomplete' => 'off'));
		print $this->B3Form->input('User.passwordConfirm', array('label' => 'Confirme a senha', 'type' => 'password', 'autocomplete' => 'off'));
		?>
	</div>
</div>
