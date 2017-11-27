<?= $this->element('crud/view-list', [
    'icon_class' => 'fa fa-category',
	    'data' => $categories,
    'model_name' => 'Category',
    'fields' => ['Category.id','Category.name'],

]); ?>