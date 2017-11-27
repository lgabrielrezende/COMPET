<?= $this->element('crud/view-list', [
    'icon_class' => 'fa fa-question',
    'data' => $questions,
    'fields' => ['Question.description'=>['format'=>function($d){
        return substr($d,0,60)."...";
    }, ]]
]); ?>
