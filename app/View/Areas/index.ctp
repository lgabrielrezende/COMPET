<?= $this->element('crud/view-list', [
    'icon_class' => 'fa fa-list-alt',
    'data' => $areas,
    'fields' => ['Area.controller','Area.controller_label','Area.action','Area.action_label']
]); ?>

