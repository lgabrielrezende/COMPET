<?= $this->element('crud/view-detail', [
    'icon_class' => 'fa fa-tag',
    'data' => $level,
    'model_name'=>'Level',
    'fields' => ['Level.id','Level.name'],
]); ?>