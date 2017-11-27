<?= $this->element('crud/view-detail', [
    'data' => $Fase,
    'model_name' => 'Fase',
    'fields' => ['Fase.id','Fase.title','Fase.description','Level.name','Category.name'],
]); ?>