<?php

class Fase extends AppModel
{

    /*----------------------------------------
     * Atributtes
     ----------------------------------------*/

    public $name = "Fase";
    public $label = 'Fase';
    public $gender = 'a';

    public $belongsTo  = ['Level','Category'];

   /*----------------------------------------
    * Labels atributes
   ----------------------------------------*/ 

    public $attributeLabels = [
        'id' => 'ID',
        'description' => 'Descrição',
        'title'=>'Nome',
        'level_id' => 'Nível de dificuldade',
        'category_id' => 'Categoria'
    ];
    /*----------------------------------------
     * Validation
     ----------------------------------------*/

      public $validate =[
        "title" => [
            "rule" => "notBlank",
            "message" => "Esse campo não pode estar vazio!"
        ],

        "description" => [
            "rule" => "notBlank",
            "message" => "Esse campo não pode estar vazio!"
        ],

        "level_id" => [
            "rule" => "notBlank",
            "message" => "Esse campo não pode estar vazio!"
        ],

        "category_id" => [
            "rule" => "notBlank",
            "message" => "Esse campo não pode estar vazio!"
        ]


    ];

}