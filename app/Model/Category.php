<?php

class Category extends AppModel{
    
    public $name = "Category";
    public $label = 'Categoria';
    public $gender = 'a';
    public $hasMany = ['Fase'];
    
       
    public $attributeLabels = [
        'id' => 'ID',
        'name' => 'Categoria'
    ];
    
    
    public $validate =[
        "name" => [
            "rule" => "notBlank",
            "message" => "Esse campo não pode estar vazio!"
        ],
    ];
}

