<?= $this->element('crud/view-detail', [
    'icon_class' => 'fa fa-list-alt',
    'data' => $area,
    'title' => 'Area.controller',
    'fields' => ['Area.appear',
                'Area.controller',
                'Area.controller_label',
                'Area.action',
                'Area.action_label',
                'Area.icon_menu']
]); ?>