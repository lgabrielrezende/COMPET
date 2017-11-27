<?php

class AreasController extends AppController
{

    /*----------------------------------------
     * Atributtes
     ----------------------------------------*/

    public $name = "Areas";

    public $setMenu = "Areas";

    public $label = 'Áreas';

    public $submenu = array('index', 'add');

    /*----------------------------------------
     * Actions
     ----------------------------------------*/

    public function index()
    {

        $this->checkAccess($this->name, __FUNCTION__);
        $this->paginate['order'] = ['controller ASC'];
        $this->set("areas", $this->paginate("Area"));
    }

    public function view($id = null)
    {

        $this->checkAccess($this->name, __FUNCTION__);

        $area = $this->Area->find('first', [
            'conditions' => ['Area.id' => $id],
        ]);

        $this->checkResult($area, 'area');
        $this->set("area", $area);
    }

    public function add()
    {

        $this->checkAccess($this->name, __FUNCTION__);

        if ($this->request->isPost()) {

            $this->Area->create($this->request->data);

            if ($this->Area->validates()) {

                if ($this->Area->save(null, false)) {

                    $this->setMessage('saveSuccess', 'Area');
                    $this->redirect(array('controller' => $this->name, 'action' => 'view', $this->Area->id));

                } else
                    $this->setMessage('saveError', 'Area');

            } else
                $this->setMessage('validateError');
        }
    }

    public function edit($id = null)
    {

        $this->checkAccess($this->name, __FUNCTION__);


        if (!$this->request->isPost()) {

            $this->data = $this->Area->findById($id);

        } else {

            $this->Area->create($this->request->data);

            if ($this->Area->validates()) {

                if ($this->Area->save(null, false)) {
                    $this->setMessage('saveSuccess', 'Area');
                    $this->redirect(array('controller' => $this->name, 'action' => 'view', $id));
                } else {
                    $this->setMessage('saveError', 'Area');
                }
            } else
                $this->setMessage('validateError');
        }
    }

    public function delete($id = null)
    {

        $this->checkAccess($this->name, __FUNCTION__);


        if ($this->Area->delete($id))
            $this->setMessage('deleteSuccess', 'Area');
        else
            $this->setMessage('deteleError', 'Area');

        $this->redirect(array('controller' => $this->name, 'action' => 'index'));
    }

}