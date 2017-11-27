<?= $this->Form->create('Achievement', array('class' => 'form-horizontal', 'novalidate')); ?>
<div class="row">
    <div class="col-lg-6">
        <?php
        print $this->B3Form->input('Achievement.description',['label'=>'Nome do troféu','type'=>'text']);
        print $this->B3Form->input('Achievement.',['label'=>'descrição','type'=>'text']);
        ?>
        <?= $this->element("form/submit-b3", ['cancel' => '/Achievement/']) ?>
    </div>
</div>







