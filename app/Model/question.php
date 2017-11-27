<?php

class Question extends AppModel
{

    /*----------------------------------------
     * Atributtes
     ----------------------------------------*/

    public $name = "Question";
    public $label = 'Questão';
    public $gender = 'a';

    public $displayField = 'description';
    public $belongsTo = ['Level'];
    public $hasAndBelongsToMany = ['Category'];

   /*----------------------------------------
    * Labels atributes
   ----------------------------------------*/

    public $attributeLabels = [
        'id' => 'ID',
        'description' => 'Descrição',
        'level_id' => 'Nível de dificuldade',
        'explanation' => 'Explicação',
        'answer' => 'Resposta',
        /*'tip' => 'Dica'*/
        'option_1' => 'Alternativa A',
        'option_2' => 'Alternativa B',
        'option_3' => 'Alternativa C',
        'option_4' => 'Alternativa D',
        'option_5' => 'Alternativa E',
    ];

    public $answers = [
        '1' => 'Alternativa A',
        '2' => 'Alternativa B',
        '3' => 'Alternativa C',
        '4' => 'Alternativa D',
        '5' => 'Alternativa E',
    ];

    /*----------------------------------------
     * Validation
     ----------------------------------------*/

    public $validate = array(

        "description" => array(

            "rule" => 'notBlank',
            "message" => "Informe a Descrição"
        ),
        "level_id" => array(

            "rule" => 'notBlank',
            "message" => "Informe o Nível"
        ),
        "explanation" => array(

            "rule" => 'notBlank',
            "message" => "Informe a Explicação"
        ),
        "answer" => array(

            "rule" => 'notBlank',
            "message" => "Informe as opções"
        ),
        "option_1" => array(
            "rule" => 'notBlank',
            "message" => "Informe a letra a"
        ),
        "option_2" => array(
            "rule" => 'notBlank',
            "message" => "Informe a letra b"
        ),
        "option_3" => array(
            "rule" => 'notBlank',
            "message" => "Informe a letra c"
        ),
        "option_4" => array(
            "rule" => 'notBlank',
            "message" => "Informe a letra d"
        ),
        "option_5" => array(
            "rule" => 'notBlank',
            "message" => "Informe a letra e"
        )
    );
}