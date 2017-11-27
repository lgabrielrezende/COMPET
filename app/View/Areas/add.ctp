<?= $this->Form->create('User', array('class' => 'form-horizontal', 'novalidate')); ?>
<div class="row">
    <div class="col-lg-6">
        <?php
        print $this->B3Form->input('Area.parent_id',['type'=>'text']);
        print $this->B3Form->input('Area.appear',['type'=>'select','options'=>['0'=>'false','1'=>'true']]);
        print $this->B3Form->input('Area.controller');
        print $this->B3Form->input('Area.controller_label');
        print $this->B3Form->input('Area.action');
        print $this->B3Form->input('Area.action_label');
        print $this->B3Form->input('Area.icon_menu');
        ?>
        <?= $this->element("form/submit-b3", ['cancel' => '/users']) ?>
    </div>
</div>



