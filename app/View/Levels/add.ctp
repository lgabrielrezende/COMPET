<?= $this->Form->create('Level', array('class' => 'form-horizontal', 'novalidate')); ?>
<div class="row">
    <div class=" col-lg-6">
        <?php
        print $this->B3Form->input('Level.name', ['placeholder' => 'Nível de Dificuldade']);
        print $this->B3Form->input('Level.points', ['placeholder' => 'Pontos ganhos']);
        ?>
        <?= $this->element("form/submit-b3", ['cancel' => '/levels']) ?>
    </div>
</div>



