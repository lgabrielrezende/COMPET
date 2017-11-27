<?php

class User extends AppModel
{

    /*----------------------------------------
     * Atributtes
     ----------------------------------------*/

    public $name = 'User';

    public $label = 'Usuário';

    /*----------------------------------------
     * Associations
     ----------------------------------------*/

    public $belongsTo = ['Profile'];

    /*----------------------------------------
    * Labels atributes
    ----------------------------------------*/

    public $attributeLabels = [
        'id' => 'ID',
        'name' => 'Nome',
        'email' => 'Email',
        'profile_id' => 'Perfil',
        'last_login' => 'Último Login',
        'uid' => 'UID',
        'valid' => 'VALID',
    ];

    /*----------------------------------------
     * Validation
     ----------------------------------------*/

    public $validate = [
        'name' => [
            'rule' => 'notBlank',
            'message' => 'Preencha Nome'
        ],

        'email' => [
            'notBlank' => [
                'rule' => 'notBlank',
                'message' => 'Preencha Email'
            ],

            'email' => [
                'rule' => 'email',
                'message' => 'Email inválido'
            ],

            'isUnique' => [
                'rule' => 'isUnique',
                'message' => 'Este email já está cadastrado'
            ]
        ],

        'profile_id' => [
            'notBlank' => [
                'rule' => 'notBlank',
                'message' => 'Selecione um Perfil'
            ],
            'adminProfile' => [
                'rule' => 'adminProfile',
                'message' => 'Você não pode criar usuários com Perfil Administrador'
            ]
        ],

        'password' => [
            'notBlank' => [
                'rule' => 'passnotBlank',
                'message' => 'Preencha com sua senha atual'
            ],

            'currentPassword' => [
                'rule' => 'currentPassword',
                'message' => 'Senha incorreta'
            ]
        ],

        'newPassword' => [
            'newPassnotBlank' => [
                'rule' => 'newPassnotBlank',
                'message' => 'Preencha sua nova senha'
            ],

            'newPassNotSame' => [
                'rule' => 'newPassNotSame',
                'message' => 'Sua nova senha não pode ser igual a senha antiga'
            ],

            'between' => [
                'rule' => ['between', 6, 20],
                'message' => 'Senha deve conter entre 6 e 20 caracteres',
                'allowEmpty' => true
            ],

            'alphanumeric' => [
                'rule' => 'alphanumeric',
                'message' => 'Senha deve conter apenas letras e/ou números (sem acentuação ou caracteres especiais)',
                'allowEmpty' => true
            ]
        ],
        'passwordConfirm' => [
            'rule' => 'passwordConfirm',
            'message' => 'Senha de Confirmação não confere'
        ]
    ];


    public function passwordConfirm($check)
    {

        return array_pop($check) == $this->data[$this->name]['newPassword'];
    }

    public function currentPassword($check)
    {

        $currentPassword = $this->field('password');
        return AuthComponent::password(array_pop($check)) == $currentPassword;
    }

    public function passnotBlank($check)
    {

        return array_pop($check) != '';
    }

    public function newPassnotBlank($check)
    {

        if (isset($this->_passSwitched)) {

            if (!$this->_passSwitched) {

                $value = array_pop($check);
                return !empty($value);
            }
        }

        return true;
    }

    public function newPassNotSame($check)
    {

        if (isset($this->_passSwitched)) {

            if (!$this->_passSwitched) {

                $currentPassword = $this->field('password');
                return AuthComponent::password(array_pop($check)) != $currentPassword;
            }
        }

        return true;
    }

    public function adminProfile($check)
    {

        if (!$this->isAdmin())
            return array_pop($check) != Configure::read('AdminProfileId');

        return true;
    }

    /*----------------------------------------
     * Methods
     ----------------------------------------*/

    public function lastLogin($user_id)
    {

        $this->id = $user_id;
        $this->saveField('last_login', date('Y-m-d H:i:s'));
    }

    public static function isAdmin($profile_id = null)
    {

        if (!$profile_id)
            $profile_id = AuthComponent::user('profile_id');

        return $profile_id == Configure::read('AdminProfileId');
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

    public function beforeValidate($options = [])
    {

        if (array_key_exists('pass_switched', $options)) {

            $this->_passSwitched = $options['pass_switched'];

            if (!$this->_passSwitched) {

                $this->validate['newPassword']['alphanumeric']['allowEmpty'] = false;
                $this->validate['newPassword']['between']['allowEmpty'] = false;
            }
        }

        return true;
    }

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