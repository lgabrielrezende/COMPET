<?php

class GamesController extends AppController
{

    /*----------------------------------------
     * Atributtes
     ----------------------------------------*/

    public $name = "Games";

    public $setMenu = "Games";

    public $label = 'Jogo';

    public $submenu = ['index', 'add'];

    public $uses = ['Category', 'Question'];

    /*----------------------------------------
     * Actions
     ----------------------------------------*/

    public function index()
    {
      	$this->checkAccess( $this->name, __FUNCTION__ );
		$this->set( "categories", $this->Category->find( 'list' ) );
		if($this->request->isPost()){
			$ids=$this->request->data['Category']['Category'];
			 $options=[
        	'contains'=>['Category'=>['conditions'=>['Category.id'=>$ids[0]]]],
        	'limit'=>5,
       	 	'fields'=>['id','description']
        	];
        	$this->Question->contain(['Category']);
        	$question=$this->Question->find('all',$options);
        	pr($question);die;
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