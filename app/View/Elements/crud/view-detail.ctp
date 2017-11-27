<?php
if (!isset($icon_class)) {
    $icon_class = "";
}
// #### Required fields
if (!isset($title)) {
    $title = "";
} else {
    $exp = explode('.', $title);
    $title = $data[$exp[0]][$exp[1]];
    $exp = "";
}

$controller_name = $this->name;

if (empty($model_name)) {
    $model_name = substr($controller_name, 0, -1);
}

/*Links to update or delete model's data*/
$delete_action = "/" . $controller_name . "/delete/{$data[$model_name]['id']}";
$update_action = "/" . $controller_name . "/edit/{$data[$model_name]['id']} ";

$func = function ($key, $f, array &$d) {

    if (!is_array($f)) {
        $exp = explode('.', $f);
        $model = $exp[0];
        $fieldName = $exp[1];

        App::uses('Model', "{$model}");

        $modelObject = new $model;

        $fieldLabel = empty($modelObject->attributeLabels[$fieldName]) ? $fieldName : $modelObject->attributeLabels[$fieldName];

        return ['label' => $fieldLabel, 'value' => $d[$model][$fieldName]];
    } else {
        $exp = explode('.', $key);
        $model = $exp[0];
        $fieldName = $exp[1];

        App::uses('Model', "{$model}");

        $modelObject = new $model;
        if (empty($f['label'])) {
            $fieldLabel = empty($modelObject->attributeLabels[$fieldName]) ? $fieldName : $modelObject->attributeLabels[$fieldName];
        } else {
            $fieldLabel = $f['label'];
        }
        $value = $d[$model][$fieldName];

        if (!empty($f['format'])) {
            $value = $f['format']($d[$model][$fieldName]);
        }

        return ['label' => $fieldLabel, 'value' => $value];
    }
}

?>

    <div class="view">
        <div class="row">
            <h2 class="col-lg-8"><i class="<?= $icon_class ?>"></i> <?= $title ?></h2>
            <div class="col-lg-4 btn-menu-view">
                <div class="button-actions pull-right">
                    <?= $this->Html->link('<i class="fa fa-trash"></i> Excluir', $delete_action, array('class' => 'btn btn-mini btn-danger delete ', 'escape' => false));
                    ?>
                    <?= $this->Html->link('<i class="fa fa-pencil"></i> Editar', $update_action, array('class' => 'btn btn-mini btn-warning', 'escape' => false));
                    ?>
                </div>
            </div>
        </div>

        <table class="table table-striped">
            <tbody>
            <?php foreach ($fields as $key => $field): ?>
                <tr>
                    <?php
                    $result = $func($key, $field, $data);
                    ?>
                    <td><?= $result['label'] ?></td>
                    <td><?= $result['value'] ?></td>
                </tr>
            <?php endforeach; ?>

        </table>
    </div>

<?= $this->element('crud/delete-confirmation', ['model' => (new $model_name)->label]); ?>