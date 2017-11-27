<?= $this->Html->css(['select2']);?>
<?= $this->Html->script(['select2']);?>

<?= $this->Form->create('fam_suspend_monitor(fam, fam_monitor)', ['class' => 'form-add', 'novalidate']); ?>
<div class="row">
    <div class="col-lg-6">
        <?php
        print $this->B3Form->input('Fase.title', ['placeholder' => 'Titulo da Fase']);
        print $this->B3Form->input('Fase.description', ['placeholder' => 'Descrição da Fase']);
        print $this->B3Form->input('Fase.level_id', ['empty' => '-- Selecione --', 'options'=> $level]);
        print $this->B3Form->input('Fase.category_id', ['empty' => '-- Selecione --', 'options'=> $category]);
        ?>
    </div>
</div>
<div class="row">

</div>
	<?= $this->element("form/submit-b3", ['cancel' => '/Fase/index']) ?>
<script>
    $('#CategoryCategory').select2();
</script>

