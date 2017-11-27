<?php
App::uses('CakeEmail', 'Network/Email');


class UsersController extends AppController
{

    /*----------------------------------------
     * Atributtes
     ----------------------------------------*/

    public $name = "Users";

    public $setMenu = "Users";

    public $label = 'Usuários';

    public $submenu = ['index', 'add'];

    /*----------------------------------------
     * Callbacks
     ----------------------------------------*/

    public function beforeFilter()
    {
        parent::beforeFilter();
        Security::setHash("md5");
        $this->Security->unlockActions = array(['manage_account']);
        $this->Auth->allow('checkActivate');
    }

    /*----------------------------------------
     * Actions
     ----------------------------------------*/

    public function index()
    {
        $this->checkAccess($this->name, __FUNCTION__);
        $this->paginate['fields'] = ['id', 'name', 'email', 'last_login'];
        $this->paginate['contain'] = ['Profile.name'];
        $this->paginate['order'] = "User.created DESC";

        $this->set("users", $this->paginate("User"));
    }

    public function view($id = null)
    {
        $this->checkAccess($this->name, __FUNCTION__);
        $this->User->contain(['Profile' => ['fields' => ['name']]]);
        $user = $this->User->findById($id);

        $this->checkResult($user, 'User');
        $this->set("user", $user);
    }

    public function add()
    {
        $this->checkAccess($this->name, __FUNCTION__);

        if ($this->request->isPost()) {

            $this->User->create($this->request->data);


            if ($this->User->validates()) {

                if ($this->User->save(null, false)) {
                    $user = $this->User->findById($this->User->id);
                    $this->User->set ('uid',uniqid(rand(), true));
                    $this->User->save();
                    $this->send( $this->User->id );
                    $this->setMessage('saveSuccess', 'User');
                    $this->redirect(['controller' => $this->name, 'action' => 'view', $this->User->id]);

                } else
                    $this->setMessage('saveError', 'User');

            } else
                $this->setMessage('validateError');
        }

        $this->profilesList();
    }

    public function edit($id = null)
    {

        $this->checkAccess($this->name, __FUNCTION__);

        if (!$this->User->isAdmin() && $this->User->isAdmin($id)) {

            $this->Session->setFlash("Você não pode <strong>editar</strong> Usuários <strong>Administradores</strong>.", "default", ['class' => 'error']);
            $this->redirect(array('controller' => $this->name, 'action' => 'view', $id));
        }

        if ($this->User->isAdminUser($id)) {

            if ($this->User->isAdminUser())
                $this->Session->setFlash('Para editar seu usuário Administrador, clique em "<strong>Meus dados</strong>" no menu do canto superior direito.', 'default', ['class' => 'warning', 'button' => ['label' => ' Editar meus dados', 'url' => '/users/manageAccount']]);
            else
                $this->Session->setFlash("Você não pode <strong>editar</strong> o Usuário <strong>Administrador Geral</strong>.", "default", array('class' => 'error'));

            $this->redirect(array('controller' => $this->name, 'action' => 'view', $id));
        }

        if (!$this->request->isPut()) {

            $this->User->contain();
            $this->data = $this->User->findById($id);

        } else {

            $this->User->create($this->request->data);

            if ($this->User->validates()) {

                if ($this->User->save(null, false)) {
                    $user = $this->User->findById($this->User->id);
                    $this->User->set ('uid',uniqid(rand(), true));
                    $this->User->save();
                    $this->send( $this->User->id );
                    $this->setMessage('saveSuccess', 'User');
                    $this->redirect(array('controller' => $this->name, 'action' => 'view', $id));

                } else
                    $this->setMessage('saveError', 'User');

            } else
                $this->setMessage('validateError');
        }

        $this->profilesList();
    }

    public function delete($id = null)
    {

        $this->checkAccess($this->name, __FUNCTION__);

        $this->User->contain();
        $user = $this->User->findById($id);

        if ($user['User']['id'] == $this->Auth->user("id")) {

            $this->Session->setFlash("Você não pode <strong>excluir</strong> seu próprio Usuário.", "default", array('class' => 'danger'));
            $this->redirect(array('controller' => $this->name, 'action' => 'view', $id));
        }

        if (!$this->User->isAdmin() && $this->User->isAdmin($user['User']['profile_id'])) {

            $this->Session->setFlash("Você não pode <strong>excluir</strong> Usuários <strong>Administradores</strong>.", "default", array('class' => 'danger'));
            $this->redirect(array('controller' => $this->name, 'action' => 'view', $id));
        }

        if ($this->User->isAdminUser($user['User']['id'])) {

            $this->Session->setFlash("Você não pode <strong>excluir</strong> o Usuário <strong>Administrador Geral</strong>.", "default", array('class' => 'danger'));
            $this->redirect(array('controller' => $this->name, 'action' => 'view', $id));
        }

        if ($this->User->delete($id))
            $this->setMessage('deleteSuccess', 'User');
        else
            $this->setMessage('saveError', 'User');

        $this->redirect(array('controller' => $this->name, 'action' => 'index'));
    }

    public function login()
    {


        if ($this->request->isPost()) {


            if ($this->Auth->login()){
               if($this->checkValid()){

                   $this->redirect($this->Auth->redirect());

               }
                else{
                    $this->Auth->logout();
                }

            }

            else
                $this->Session->setFlash('<strong>Usuário</strong> ou <strong>senha</strong> inválida.', 'default', array('class' => 'danger'), 'auth');
        }

        $this->layout = "login";
    }


    public function logout()
    {

        $this->redirect($this->Auth->logout());
    }

    public function manageAccount()
    {

        if (!$this->request->isPost()) {

            //	recuperando o usuario logado do BD
            $this->data = $this->User->find('first', array(
                'conditions' => array('id' => $this->Auth->user('id')),
                'fields' => array('name', 'email'),
                'contain' => false
            ));

        } else {

            $this->User->create($this->request->data);
            $this->User->id = $this->Auth->user('id');
            $id =  $this->User->id;

            if ($this->User->validates(array('pass_switched' => $this->Auth->user('pass_switched')))) {

                if ($this->User->save(null, false)) {


                    $this->Session->setFlash("Seus dados foram atualizados com <strong>sucesso</strong>.", "default", array('class' => 'success'));
                    $this->Session->write("Auth.User.name", $this->data["User"]["name"]);
                    $this->Session->write("Auth.User.pass_switched", $this->User->_passSwitched);
                    $this->User->query("UPDATE users SET valid = 1 WHERE id = '$id'");
                    $this->redirect("/");

                } else
                    $this->Session->setFlash("Ocorreu um <strong>erro</strong> ao tentar atualizar seus dados. Por favor tente novamente.", "default", array('class' => 'error'));

            } else
                $this->setMessage('validateError');
        }

        if (!$this->Auth->user('pass_switched') && !$this->Session->check('Message.flash'))
            $this->Session->setFlash('<h4>Bem vindo(a)!</h4>Este é seu primeiro acesso a este Sistema. <strong>Antes</strong> de continuar é necessário <strong>modificar sua senha</strong> de acesso.<br />Confira também seus dados abaixo. Feito isto, <strong>não informe sua senha para terceiros</strong>.','default',['class'=>'warning']);

        $this->submenu = array();
        $this->subtitle = "Meus Dados";
    }

    /*----------------------------------------
     * Methods
     ----------------------------------------*/

    private function profilesList()
    {

        $options = array('order' => 'name ASC');

        if (!$this->User->isAdmin())
            $options['conditions'] = array('Profile.id <>' => Configure::read('AdminProfileId'));

        $this->set("profiles", $this->User->Profile->find("list", $options));
    }




    public function  send($id)
    {

        if (!empty($id)){

            $user = $this->User->findById($id);
            $Email = new CakeEmail('gmail');
            $Email->template('email_tpl')
                ->emailFormat('html')
                ->viewVars(array('id' => $user['User']['id'],'email' => md5($user['User']['email']),'date' => md5($user['User']['created']),'uid' =>  md5($user['User']['uid'])))
                ->from(array('competnotification@gmail.com' => 'PLATAFORMA COMPET'))
                ->to($user['User']['email'])
                ->subject ('Instruções de Confirmação do Login ')
                ->send();
        }


    }



    public function  checkActivate(){

        $id = $this->request->query['id'];
        $emailMd5 = $this->request->query['email'];
        $uidMd5 = $this->request->query['uid'];
        $dataMd5 = $this->request->query['datetime'];
        $valido = true;
        $user = $this->User->findById($id);



        if( $emailMd5 !== md5($user['User']['email'])){
            $valido = false;
        }


        if( $uidMd5 !== md5( $user['User']['uid'])){
            $valido = false;

        }


        if( $dataMd5 !== md5( $user['User']['created'])){
            $valido = false;

        }
        if( $valido === true ){

            $this->User->query("UPDATE users SET valid = 1 WHERE id = '$id'");
            $this->Session->setFlash('<strong>Conta Ativada com Sucesso!</strong> ', 'default', array('class' => 'danger'), 'auth');
        }
        else{
            $this->Session->setFlash('<strong>Conta Ativada sem Sucesso. Por Favor, verifique o link!</strong> ', 'default', array('class' => 'danger'), 'auth');

        }
    }












}