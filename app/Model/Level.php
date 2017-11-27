<?php

class Level extends AppModel
{

    /*----------------------------------------
     * Atributtes
     ----------------------------------------*/

    public $name = "Level";
    public $label = 'Nível de Dificuldade';
    public $gender = 'o';
    public $displayField = 'name';
    public $hasMany =['Fase'];

   /*----------------------------------------
    * Labels atributes
   ----------------------------------------*/

    public $attributeLabels = [
        'name' => 'Dificuldade',
        'points' => 'Pontos'
    ];

    /*----------------------------------------
     * Validation
     ----------------------------------------*/

    public $validate =[
        "name" => [
            "rule" => "notBlank",
            "message" => "Esse campo não pode estar vazio!"
        ],
        "points"=> [
            "rule" => "numeric",
            "message" => "Somente números!"
        ]
    ];
}