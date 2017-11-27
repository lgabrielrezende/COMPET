<?php

class User extends AppModel
{

    /*----------------------------------------
     * Atributtes
     ----------------------------------------*/

    public $name = 'Achievements';

    public $label = 'Conquistas';

    /*----------------------------------------
     * Associations
     ----------------------------------------*/

    public $belongsTo = ['User'];

    /*----------------------------------------
    * Labels atributes
    ----------------------------------------*/

    public $attributeLabels = [
        'trophiename' => 'Troféu',
        'description' => 'Descrição'
        'points' => 'Pontuação'
     

    ];

    /*----------------------------------------
     * Validation
     ----------------------------------------*/

    public $validate = [
        'trophiename' => [
            'rule' => 'notBlank',
            'message' => 'Preencha o nome do troféu'
        ],

        'description' => [
            'notBlank' => [
                'rule' => 'notBlank',
                'message' => 'Preencha a descrição'
            ],
       
    ];


    /*----------------------------------------
     * Methods
     ----------------------------------------*/

    public static function isAdmin($profile_id = null){

        if (!$trophiename)
            $trophiename = AuthComponent::user('trophiename');

        return $trophiename == Configure::read('AdminProfileId');
    }

    public static function isAdminUser($user_id = null)
    {

        if (!$user_id)
            $user_id = AuthComponent::user('id');

        return $user_id == Configure::read('AdminUserId');
    }

    /*----------------------------------------
     * Callbacks
     ----------------------------------------*/

    public function beforeSave($options = [])
    {

        if (!$this->id)
            $this->data[$this->name]['password'] = AuthComponent::password('123456');

        elseif (!empty($this->data[$this->name]['newPassword'])) {

            $this->data[$this->name]['password'] = AuthComponent::password($this->data[$this->name]['newPassword']);
            unset($this->data[$this->name]['newPassword']);

            if (!empty($this->data[$this->name]['passwordConfirm']))
                unset($this->data[$this->name]['passwordConfirm']);

            if (isset($this->_passSwitched))
                if (!$this->_passSwitched)
                    $this->_passSwitched = $this->data[$this->name]['pass_switched'] = '1';

        } elseif (isset($this->data[$this->name]['password']))
            unset($this->data[$this->name]['password']);

        if (isset($this->data[$this->name]['pass_switched']))
            if (!$this->data[$this->name]['pass_switched'])
                unset($this->data[$this->name]['pass_switched']);

        return true;
    }

}