<?= $this->Form->create('Category', array('class' => 'form-horizontal','novalidade')); ?>
<div class="row">
    <div class=" col-lg-6">
        <?php
        print $this->Form->hidden('Category.id');
        print $this->B3Form->input('Category.name', ['placeholder' => 'Categoria']);
        ?>
        <?= $this->element("form/submit-b3", ['cancel' => '/categories  ']) ?>
    </div>

