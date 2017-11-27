<?= $this->element('crud/view-list', [
    'icon_class' => 'fa fa-tag',
    'data' => $levels,
    'model_name'=>'Level',
    'fields' => ['Level.id','Level.name','Level.points']
]); ?>

