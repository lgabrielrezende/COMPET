
<?= $this->element('crud/view-detail', [
    'icon_class' => 'fa fa-question',
    'data' => $question,
    'fields' => ['Question.id',
    	'Question.description',
    	'Question.explanation',
    	'Level.name',
    	'Question.option_1',
    	'Question.option_2',
    	'Question.option_3',
    	'Question.option_4',
    	'Question.option_5',
    	'Question.answer'=>[
    		'format'=>function($d){
    			if($d == 1){
    				return 'A';
    			}elseif ($d == 2) {
    				return 'B';
    			}elseif ($d == 3){
    				return 'C';
    			}elseif ($d == 4){
    				return 'D';
    			}else{
    				return 'E';
    			}
    		}]
    	],
]); ?>