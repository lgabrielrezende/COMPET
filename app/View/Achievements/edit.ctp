<?= $this->Form->create('Achievements', array('class' => 'form-horizontal', 'novalidate')); ?>
<div class="row">
    <div class="col-lg-6">
        <?php
        print $this->Form->hidden('Achievements.id');
        print $this->B3Form->input('Achievements.parent_id',['type'=>'text']);
        print $this->B3Form->input('Achievements.appear',['type'=>'select','options'=>['0'=>'false','1'=>'true']]);
        print $this->B3Form->input('Achievements.controller');
        print $this->B3Form->input('Achievements.controller_label');
        print $this->B3Form->input('Achievements.action');
        print $this->B3Form->input('Achievements.action_label');
        print $this->B3Form->input('Achievements.icon_menu');
        ?>
        <?= $this->element("form/submit-b3", ['cancel' => '/achievements']) ?>
    </div>
</div>



