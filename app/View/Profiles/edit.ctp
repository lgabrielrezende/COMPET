<?php
print $this->Form->create("Profile", array("class" => "form-horizontal"));
print $this->Form->hidden('Profile.id');
?>

    <div class="row">
    <div class="control-group">
        <div class="col-lg-12 ">
    <?=  $this->B3Form->input('Profile.name', array('placeholder' => 'Nome do perfil'));?>
        </div>
        <h4>
            <?= $this->Form->label('Area', 'Áreas de Acesso', array('class' => 'control-label')); ?>
        </h4>
        <?= $this->Form->input('Area', array("label" => false, 'div' => 'controls areas', 'escape' => false, 'multiple' => 'checkbox', 'class' => 'col-lg-2'));
        ?>
    </div>
    </div>
    <div class="row">
        <?= $this->element("form/submit-b3", array('cancel' => "/profiles/view/{$this->passedArgs[0]}")) ?>
    </div>

