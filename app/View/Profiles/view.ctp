<div class="view">
    <div class="row-fluid title">
        <h2 class="col-lg-8"><i class="fa fa-tag"></i> <?= $profile['Profile']['name'] ?></h2>
        <div class="col-lg-4 btn-menu-view">
            <div class="button-actions pull-right">
                <?= $this->Html->link('<i class="fa fa-trash"></i> Excluir', "/profiles/delete/{$profile['Profile']['id']}", array('class' => 'btn btn-mini btn-danger delete', 'escape' => false));
                ?>

                <?= $this->Html->link('<i class="fa fa-edit"></i> Editar', "/profiles/edit/{$profile['Profile']['id']}", array('class' => 'btn btn-mini btn-warning', 'escape' => false));
                ?>
            </div>
        </div>
    </div>

    <table class="table table-striped">
        <tbody>
        <tr>
            <td class="dlabel">Áreas de acesso</td>
            <td class="data">
                <div class="col-lg-4">

                <?php if (!empty($profile['Area'])) {
                   $cont=0;
                    foreach ($profile['Area'] as $area): ?>
                        <?php if($cont==5): ?>
                            </div>
                            <div class="col-lg-4">
                            <?php $cont=0;?>
                        <?php endif;?>
                        <p><?= $area['controller_label'] ?> &raquo; <span
                                class="bold"><?= $area['action_label'] ?></span></p>

                    <?php $cont++; endforeach;
                } else {
                    print 'Nenhuma.';
                } ?>
                </div>
            </td>
        </tr>

        </tbody>
    </table>
</div>

<?= $this->element('crud/delete-confirmation', array('model' => 'Perfil de Usuário')) ?>