<?php

class LevelsController extends AppController
{

    /*----------------------------------------
     * Atributtes
     ----------------------------------------*/

    public $name = "Levels";

    public $setMenu = "Levels";

    public $label = 'Níveis';

    public $submenu = ['index', 'add'];

    public $uses = ['Level'];

    public $hasMany = ['Fase'];

    /*----------------------------------------
     * Actions
     ----------------------------------------*/

    public function index()
    {
        $this->checkAccess($this->name, __FUNCTION__);
        $this->paginate['order'] = ['id ASC'];
        $this->set("levels", $this->paginate("Level"));
    }

    public function view($id = null)
    {

        $this->checkAccess($this->name, __FUNCTION__);

        $level = $this->Level->find('first', [
            'conditions' => ['Level.id' => $id],
        ]);

        $this->checkResult($level, 'level');
        $this->set("level", $level);
    }

    public function add()
    {

        $this->checkAccess($this->name, __FUNCTION__);

        if ($this->request->isPost()) {

            $this->Level->create($this->request->data);

            if ($this->Level->validates()) {

                if ($this->Level->save(null, false)) {

                    $this->setMessage('saveSuccess', 'Level');
                    $this->redirect(array('controller' => $this->name, 'action' => 'view', $this->Level->id));

                } else
                    $this->setMessage('saveError', 'Level');

            } else
                $this->setMessage('validateError');
        }
    }

    public function edit($id = null)
    {
        $this->checkAccess($this->name, __FUNCTION__);

        if (!$this->request->isPut()) {
            $this->data = $this->Level->findById($id);
        } else {
//            pr($this->request->data);die;
            $this->Level->create($this->request->data);
            if ($this->Level->validates()) {
                if ($this->Level->save(null, false)) {
                    $this->setMessage('saveSuccess', 'Level');
                    $this->redirect(array('controller' => $this->name, 'action' => 'view', $id));
                } else {
                    $this->setMessage('saveError', 'Level');
                }
            } else {
                $this->setMessage('validateError');
            }
        }
    }

    public function delete($id = null)
    {
        $this->checkAccess($this->name, __FUNCTION__);

        if ($this->Level->delete($id))
            $this->setMessage('deleteSuccess', 'Level');
        else
            $this->setMessage('deteleError', 'Level');

        $this->redirect(array('controller' => $this->name, 'action' => 'index'));
    }

}