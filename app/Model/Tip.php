<?php

class Tip extends AppModel
{
    public $name = "Tips";
    public $label = "Dica";
    public $gender = 'a';
    
    public $belongsTo = ['Question'];
    
    public $attributeLabels = [
        'id' => 'ID',
        'description' => 'Dica',
        'question_id'=> 'Questão Referente',
    ];
    
    public $validate =[
        "description" => [
            "rule" => "notBlank",
            "message" => "Esse campo não pode estar vazio!"
        ],
    ];
}




