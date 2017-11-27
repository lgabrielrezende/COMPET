<?= $this->Form->create('Category', array('class' => 'form-horizontal', 'novalidate')); ?>
<div class="row">
    <div class=" col-lg-6">
        <?php
        print $this->B3Form->input('Category', ['label' => 'Categorias','type'=>'select','multiple'='checkbox']);
        ?>
        <?= $this->element("form/submit-b3", ['cancel' => '/games']) ?>
    </div>
</div>