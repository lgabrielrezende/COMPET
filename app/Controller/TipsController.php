<?php

class TipsController extends AppController {

    public $name = "Tips";
    public $setmenu = "Tips";
    public $label = 'Dicas';
    public $submenu = ['index', 'add'];
    public $uses = ['Tip', 'Question'];

    public function index() {
        $this->checkAccess($this->name, __FUNCTION__);
        $this->paginate['order'] = ['id ASC'];
        $this->set("tips", $this->paginate("Tip"));
    }

    public function view($id = null) {
        $this->checkAccess($this->name, __FUNCTION__);

        $tip = $this->Tip->find('first', [
            'conditions' => ['Tip.id' => $id],
        ]);

        $this->checkResult($tip, 'tip');
        $this->set("tip", $tip);
    }

    public function add() {

        $this->checkAccess($this->name, __FUNCTION__);

        if ($this->request->isPost()) {
//            pr($this->request->data);die;
            $tips = [];
            $question_id = $this->request->data['Tip']['question_id'];
            unset($this->request->data['Tip']['question_id']); // limpa o array

            foreach ($this->request->data['Tip'] as $val) {
                $tips[]['Tip'] = [
                    'question_id' => $question_id,
                    'description' => $val['description']
                ];
            }

                if ($this->Tip->saveAll($tips)) {
                    $this->setMessage('saveSucess', 'Tip');
                    $this->redirect(array('controller' => $this->name, 'action' => 'view', $this->Tip->id));
                } else {
                    $this->setMessage('saveError', 'Tip');
                }

        }

        $this->set('questions', $this->Question->find('list'));
    }

    public function edit($id = null) {
        $this->checkAccess($this->name, __FUNCTION__);

        if (!$this->request->isPut()) {
            $this->data = $this->Tip->findById($id);
        } else {
            $this->Tip->create($this->request->data);
            if ($this->Tip->validates()) {
                if ($this->Tip->save(null, false)) {
                    $this->setMessage('saveSucess', 'Tip');
                    $this->redirect(array('controller' => $this->name, 'action' => 'view', $id));
                } else {
                    $this->setMessage('saveError', 'Tip');
                }
            } else {
                $this->setMessage('validateError');
            }
        }

        $this->set('questions', $this->Question->find('list'));
    }

    public function delete($id = null) {

        $this->checkAccess($this->name, __FUNCTION__);

        if ($this->Tip->delete($id)) {
            $this->setMessage('deleteSucess', 'Tip');
        } else {
            $this->setMessage('deleteError', 'Tip');
        }

        $this->redirect(array('controller' => $this->name, 'action' => 'index'));
    }

}
