<?php

class AchievementsController extends AppController
{

    /*----------------------------------------
     * Atributtes
     ----------------------------------------*/

    public $name = "Achievements";

    public $setMenu = "Achievements";

    public $label = 'Achievements';

    public $submenu = array('index', 'add');

   public $uses = ['Category', 'Level', 'Achievements','Question','Profile','User'];

    /*----------------------------------------
     * Actions
     ----------------------------------------*/

    public function index()
    {
        $this->checkAccess($this->name, __FUNCTION__);
        $this->paginate['order'] = ['id ASC'];
       $this->set("Achievements", $this->paginate());
    }

    public function view($id = null)
    {

        $this->checkAccess($this->name, __FUNCTION__);
       // $this->Achievements->contain(['Level','Category']);
        $Achievements = $this->Achievements->find('list');

        $this->checkResult($Achievements, 'Achievements');
        $this->set("Achievements", $Achievements);
    }

    public function add()
    {
       
       $this->checkAccess($this->name, __FUNCTION__);

        if ($this->request->isPost()) {

            $this->Achievements->create($this->request->data);

            if ($this->Achievements->validates()) {

                if ($this->Achievements->save(null, false)) {

                    $this->setMessage('saveSuccess', 'Achievements');
                    $this->redirect(array('controller' => $this->name, 'action' => 'view', $this->Achievements->id));

                } else {
                    $this->setMessage('saveError', 'Achievements');
                }
            } else{
                $this->setMessage('validateError');
            }
        }
    }
  


    public function edit($id = null)
    {
        $this->checkAccess($this->name, __FUNCTION__);

        if (!$this->request->isPut()) {
            $this->data = $this->Question->findById($id);
        } else {
            $this->Question->create($this->request->data);
            if ($this->Question->validates()) {
                if ($this->Question->save(null, false)) {
                    $this->setMessage('saveSuccess', 'Question');
                    $this->redirect(array('controller' => $this->name, 'action' => 'view', $id));
                } else {
                    $this->setMessage('saveError', 'Question');
                }
            } else {
                $this->setMessage('validateError');
            }
        }
        $this->set('levels', $this->Level->find('list'));
        $this->set('answers', $this->Question->answers);
        $this->set('categories', $this->Category->find('list'));

    }

    public function delete($id = null)
    {
        $this->checkAccess($this->name, __FUNCTION__);

        if ($this->Question->delete($id))
            $this->setMessage('deleteSuccess', 'Question');
        else
            $this->setMessage('deteleError', 'Question');

        $this->redirect(array('controller' => $this->name, 'action' => 'index'));
    }

}

//um teste