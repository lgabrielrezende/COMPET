<?= $this->Form->create('Fase', array('class' => 'form-horizontal','novalidade')); ?>
<div class="row">
    <div class=" col-lg-6">
        <?php
        print $this->Form->hidden('Fase.id');
        print $this->B3Form->input('Fase.title', ['placeholder' => 'Fase']);
        print $this->B3Form->input('Fase.description', ['placeholder' => 'Fase']);
        print $this->B3Form->input('Fase.level_id', ['empty' => '-- Selecione --']);
        print $this->B3Form->input('Fase.category_id', ['empty' => '-- Selecione --']);

        ?>
        <?= $this->element("form/submit-b3", ['cancel' => '/Fase ']) ?>
    </div>
