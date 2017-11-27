<?= $this->Form->create('Tip', array('class' => 'form-horizontal','novalidade')); ?>
<div class="row">
    <div class=" col-lg-6">
        <?php
        print $this->Form->hidden('Tip.id');
        print $this->B3Form->input('Tip.description', ['placeholder' => 'Descrição']);
        print $this->B3Form->input('Tip.question_id', ['placeholder' => 'Questão Referente']);
        ?>
        <?= $this->element("form/submit-b3", ['cancel' => '/tips']) ?>
    </div>

