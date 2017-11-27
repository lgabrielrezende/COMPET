<?php
if (!isset($icon_class)) {
    $icon_class = "";
}
if (!isset($controller_name)) {
    $controller_name = $this->name;
}

if (!isset($fields)) {
    $fields = [];
}

if (empty($model_name)) {
    $model_name = substr($controller_name, 0, -1);
}

function bModelAndField($field)
{
    $exp = explode('.', $field);
    $model = $exp[0];
    $fieldName = $exp[1];
    return ['model' => $model, 'field' => $fieldName];
}

$func2ModelAndField = function ($key, $field) {
    $exp = [];
    if (!is_array($field)) {
        $exp = bModelAndField($field);
    } else {
        $exp = bModelAndField($key);
    }
    $model = $exp['model'];
    $fieldName = $exp['field'];

    App::uses('Model', "{$model}");
    $modelO = new $model;
    if (!empty($field['label'])) {
        $fieldLabel = $field['label'];
    } else {
        $fieldLabel = empty($modelO->attributeLabels[$fieldName]) ? $fieldName : $modelO->attributeLabels[$fieldName];
    }
    $modelLabel = empty($modelO->label) ? $model : $modelO->label;
    return ['field_name' => $fieldName, 'model_name' => $model, 'model_label' => $modelLabel, 'field_label' => $fieldLabel];
};


/*Links to update or delete model's data*/
$add_action = "/" . $controller_name . "/add/";
$view_action = "/" . $controller_name . "/view/";
$delete_action = "/" . $controller_name . "/delete/";
$update_action = "/" . $controller_name . "/edit/";
?>

<?php if (empty($data)) { ?>
    <p class="alert alert-info nothing"><i class="icon-info-sign"></i> Não há nenhum <?= $model_name ?>
        ainda. <?= $this->Html->link('Criar Novo', $add_action, ['class' => 'btn btn-mini']) ?></p>
<?php } else { ?>

    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <?php foreach ($fields as $key => $field) : ?>
                <?php $rowLabel = $func2ModelAndField($key, $field); ?>
                <?php if (!is_array($field)) : ?>
                    <th><?= $this->Paginator->sort($field, $rowLabel['field_label']) ?></th>
                <?php else: ?>
                    <th><?= $this->Paginator->sort($key, $rowLabel['field_label']) ?></th>
                <?php endif; ?>
            <?php endforeach; ?>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($data as $key => $row): ?>
            <tr>
                <td><i class="<?= $icon_class ?>"> </i></td>
                <?php foreach ($fields as $key => $field): ?>
                    <?php $rowLabel = $func2ModelAndField($key, $field); ?>
                    <?php if (empty($field['format'])): ?>
                        <td><?= $row[$rowLabel['model_name']][$rowLabel['field_name']]; ?></td>
                    <?php else: ?>
                        <td><?= $field['format']($row[$rowLabel['model_name']][$rowLabel['field_name']]); ?></td>
                    <?php endif; ?>
                <?php endforeach; ?>
                <td>
                    <div class="pull-right">
                        <?php $model_id = $row[$model_name]['id']; ?>
                        <?= $this->Html->link('<i class="fa fa-search"></i>',$view_action.$model_id,['class'=>'btn btn-info btn-sm','escape'=>false]); ?>
                        <?= $this->Html->link('<i class="fa fa-pencil"></i>',$update_action.$model_id,['class'=>'btn btn-warning btn-sm','escape'=>false]); ?>
                        <?= $this->Html->link('<i class="fa fa-trash"></i>',$delete_action.$model_id,['class'=>'btn btn-danger btn-sm delete','escape'=>false]); ?>

                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
    <?= $this->element('crud/delete-confirmation',['model'=>(new $model_name)->label]);?>
    <?php print $this->element("crud/pagination");} ?>