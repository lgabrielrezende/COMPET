<?= $this->element('crud/view-detail', [
   'icon_class' => 'fa fa-tip', 
    'data' => $tip,
    'model_name' => 'Tip',
    'fields' => ['Tip.id','Tip.description'],
     
]);