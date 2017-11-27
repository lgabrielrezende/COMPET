<?php

class FaseController extends AppController
{

    /*----------------------------------------
     * Atributtes
     ----------------------------------------*/

    public $name = "Fase";

    public $setMenu = "Fase";

    public $label = 'Fase';

    public $submenu = array('index', 'add');

    public $uses = ['Category', 'Level', 'Fase'];
    /*----------------------------------------
     * Actions
     ----------------------------------------*/

    public function index()
    {
        $this->checkAccess($this->name, __FUNCTION__);
        $this->paginate['order'] = ['id ASC'];
        $this->set("fases", $this->paginate("Fase"));
    }

    public function view($id = null)
    {

        $this->checkAccess($this->name, __FUNCTION__);
        $this->Fase->contain(['Level','Category']);
        $Fase = $this->Fase->find('first', [
            'conditions' => ['Fase.id' => $id],
        ]);
        $this->checkResult($Fase, 'area');
        $this->set("Fase", $Fase);
    }

    public function add()
    {

        $this->checkAccess($this->name, __FUNCTION__);

        if ($this->request->isPost()) {

            $this->Fase->create($this->request->data);

            if ($this->Fase->validates()) {
                if ($this->Fase->save(null, false)){
                    $this->setMessage('saveSuccess', 'Fase');
                    $this->redirect(array('controller' => $this->name, 'action' => 'index', $this->Fase->id));

                } else
                    $this->setMessage('saveError', 'Fase');

            } else
                $this->setMessage('validateError');
        }
        $this->set('level', $this->Level->find('list'));
        $this->set('category', $this->Category->find('list'));
    }

    public function edit($id = null)
    {
        $this->checkAccess($this->name, __FUNCTION__);

        if (!$this->request->isPut()) {
        
            $this->data = $this->Fase->findById($id);
        } else {
            $this->Fase->create($this->request->data);
            if ($this->Fase->validates()) {
                if ($this->Fase->save(null, false)) {
                    $this->setMessage('saveSuccess', 'Fase');
                    $this->redirect(array('controller' => $this->name, 'action' => 'index', $this->Fase->id));
                } else {
                    $this->setMessage('saveError', 'Stage');
                }
            } else {
                $this->setMessage('validateError');
            }
            if($this->Fase->cancel('')){
                $this->redirect(array('controller' => $this->name, 'action' => 'index'));
            }
        }
        $this->set('levels', $this->Level->find('list'));
        //$this->set('answers', $this->Fase->answers);
        $this->set('categories', $this->Category->find('list'));

    }

    public function delete($id = null)
    {
        $this->checkAccess($this->name, __FUNCTION__);

        if ($this->Fase->delete($id))
            $this->setMessage('deleteSuccess', 'Fase');
        else
            $this->setMessage('deteleError', 'Fase');

        $this->redirect(array('controller' => $this->name, 'action' => 'index'));
    }

}
