<?= $this->element('crud/view-list', [
	'icon_class' => 'fa fa-tag',
	'data' => $profiles,
	'fields' => ['Profile.name']
]); ?>

