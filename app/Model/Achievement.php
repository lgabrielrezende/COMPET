<?php

class Achievement extends AppModel
{

    /*----------------------------------------
     * Atributtes
     ----------------------------------------*/

    public $name = 'Achievement';

    public $label = 'Achievement';

    /*----------------------------------------
     * Associations
     ----------------------------------------*/

    public $hasAndBelongsToMany = ['User'];

    /*----------------------------------------
    * Labels atributes
    ----------------------------------------*/

    public $attributeLabels = [
        'trophiename' => 'Troféu',
        'description' => 'Descrição',
        'points' => 'Pontuação'
     

    ];

    /*----------------------------------------
     * Validation
     ----------------------------------------*/

    
}