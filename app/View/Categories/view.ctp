<?= $this->element('crud/view-detail', [
   'icon_class' => 'fa fa-category', 
    'data' => $category,
    'model_name' => 'Category',
    'fields' => ['Category.id','Category.name'],
     
]);

