<?= $this->element('crud/view-detail', [
    'icon_class' => 'fa fa-user',
    'data' => $user,
    'title' => 'User.name',
    'fields' => ['User.name', 'User.email',
        'Profile.name' => [
            'label' => 'Perfil',
        ],
        "User.last_login" => [
            'format' => function ($d) {
                return $this->FrontEnd->niceDate($d);
            }
        ]],
]); ?>