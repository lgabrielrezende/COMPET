<?= $this->Html->css(['select2']);?>
<?= $this->Html->script(['select2']);?>

<?= $this->Form->create('Question', ['class' => 'form-add', 'novalidate']); ?>
<div class="row">
    <div class="col-lg-6">
        <?php
        print $this->B3Form->input('Question.description', ['placeholder' => 'Descrição da Pergunta']);
        print $this->B3Form->input('Question.level_id', ['empty' => '-- Selecione --']);
        print $this->B3Form->input('Question.answer',  ['type'=>'select','empty' => '-- Selecione --']);
        print $this->B3Form->input('Question.explanation', ['placeholder' => 'Explicação da resposta']);
        ?>
    </div>
    <div class="col-lg-6">
        <?= $this->B3Form->input('Question.option_1'); ?>
        <?= $this->B3Form->input('Question.option_2'); ?>
        <?= $this->B3Form->input('Question.option_3'); ?>
        <?= $this->B3Form->input('Question.option_4'); ?>
        <?= $this->B3Form->input('Question.option_5'); ?>
        <?= $this->B3Form->input('Category', ['label'=>'Categoria','type'=>'select', 'multiple'=>'multiple']);?>
    </div>
</div>
<div class="row">

</div>
    <?= $this->element("form/submit-b3", ['cancel' => '/Questions']) ?>
<script>
    $('#CategoryCategory').select2();   
</script>
