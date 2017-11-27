<?= $this->element('crud/view-list', [
    'data' => $fases,
    'model_name' => 'Fase',
    'fields' => ['Fase.id','Fase.title'],

]); ?>