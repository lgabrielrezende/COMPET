<?php // pr($this->data);die; ?>
<?= $this->Form->create('Tip', array('class'=>'form-horizontal','novalidate')); ?>

<div class="row">
    <div class="col-lg-6">
        <div id="dicas">
        <?php
            print $this->B3Form->input('Tip.question_id', ['empty' => '-- Selecione --']);
        ?>
            
            <?php if(empty($this->data['Tip'][0])) :?>
                <?= $this->B3Form->input('Tip.0.description', ['label'=>'Descricao','placeholder' => 'Dica','type'=>'textarea']);?>
            
            <?php else :?>
                <?php foreach($this->data['Tip'] as $key =>$val) :?>
                    <?= $this->B3Form->input('Tip.'.$key.'.description', ['label'=>'Descricao','placeholder' => 'Dica','type'=>'textarea']);?>
                <?php endforeach; ?>
            <?php endif;?>

        </div>
        <?= $this->Html->link('Nova dica','#',['onClick'=>'newDica()','class'=>'btn btn-success']); ?>
        <?= $this->element("form/submit-b3", ['cancel' => '/levels']) ?>
    
    </div>
</div>


<script>
    var i = 1;
    var newDica = function() {
        var dica =
            '<div class="form-group">' +
            '<label for="Tip'+i+'Description" class="control-label"><span class="req">*</span> Descricao</label>' +
            '<textarea name="data[Tip]['+i+'][description]" placeholder="Dica" class="form-control" cols="30" rows="6" id="Tip'+i+'Description" required="required">' +
            '</textarea></div>';
        $oldHtml = $('#dicas').html();
        $('#dicas').append(dica);
        i++;
    }
</script>


