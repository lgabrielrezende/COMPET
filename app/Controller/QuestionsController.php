<?php

class QuestionsController extends AppController
{

    /*----------------------------------------
     * Atributtes
     ----------------------------------------*/

    public $name = "Questions";

    public $setMenu = "Questions";

    public $label = 'Questões';

    public $submenu = array('index', 'add');

    public $uses = ['Question', 'Category', 'Level'];

    /*----------------------------------------
     * Actions
     ----------------------------------------*/

    public function index()
    {
        $this->checkAccess($this->name, __FUNCTION__);
        
        $this->set("questions", $this->paginate("Question"));
    }

    public function view($id = null)
    {

        $this->checkAccess($this->name, __FUNCTION__);
        $this->Question->contain(['Level']);
        $question = $this->Question->find('first', [
            'conditions' => ['Question.id' => $id],
        ]);

        $this->checkResult($question, 'area');
        $this->set("question", $question);
    }

    public function add()
    {

        $this->checkAccess($this->name, __FUNCTION__);

        if ($this->request->isPost()) {

            $this->Question->create($this->request->data);

            if ($this->Question->validates()) {

                if ($this->Question->save(null, false)) {

                    $this->setMessage('saveSuccess', 'Question');
                    $this->redirect(array('controller' => $this->name, 'action' => 'index', $this->Question->id));

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

    public function edit($id = null)
    {
        $this->checkAccess($this->name, __FUNCTION__);

        if (!$this->request->isPut()) {
            
            $this->data = $this->Question->findById($id);
            //pr($this->Question->findById($id));die;
        } else {

            $this->Question->create($this->request->data);
            
            if ($this->Question->validates()) {
                if ($this->Question->save(null, false)) {

                    $this->setMessage('saveSuccess', 'Question');
                    $this->redirect(array('controller' => $this->name, 'action' => 'index', $this->Question->id));

                } else {
                    $this->setMessage('saveError', 'Question');
                }
                if($this->Question->cancel('')){
                    $this->redirect(array('controller' => $this->name, 'action' => 'view'));
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