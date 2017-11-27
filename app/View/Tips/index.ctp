
<?= $this->element('crud/view-list', [
    'icon_class' => 'fa fa-tip',
    'data' => $tips,
    'model_name' => 'Tip',
    'fields' => ['Tip.id','Tip.description','Tip.question_id'],

]); ?>

