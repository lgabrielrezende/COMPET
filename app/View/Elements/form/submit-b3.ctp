<div class="form-actions">
    <p class="required"><span class="req">*</span> campos de preenchimento obrigat&oacute;rio</p>
    <?php
    
    $options1 = array(
        'class' => 'btn btn-primary submit', 
        'title' => 'clique para salvar', 
        'div' => false, 
        'escape' => false
    );
    $options2 = array(
        'class' => 'btn btn-default cancel',
        'title' => 'clique para cancelar',
        'div' => false,
        'escape' => false,
        'onclick' => 'location.href=\'/compet\/Questions\'',
        'data-toggle' => 'collapse'
    );

    if (!empty($cancel))
        $options['alt'] = $this->Html->url($cancel);

    if (!empty($cancelRedirect))
        $options['alt'] = $this->Html->url($cancel[$cancelRedirect]);
    ?>
    <div class="p-button">
        
        <?= $this->Form->button('<i class="icon-check icon-white"></i> Salvar', $options1); ?>

        <?= $this->Form->button('Cancelar', $options2); 
        ?>

    </div>
</div>

<?= $this->Form->end() ?>