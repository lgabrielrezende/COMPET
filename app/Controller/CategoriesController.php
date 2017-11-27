<?php

class CategoriesController extends AppController{
    
    public $name = "Categories";
    
    public $setmenu = "Categories";
    
    public $label = 'Categorias';
    
    public $uses = ['Category','Question'];

    public $hasMany= ['Fase'];
    

    public function index()
    {
        $this->checkAccess($this->name, __FUNCTION__);
        $this->paginate['order'] = ['id ASC'];
        $this->set("categories", $this->paginate("Category"));
    }
    
    public function view($id = null){
        $this->checkAccess($this->name, __FUNCTION__);
        $category = $this->Tips->find('first', [
            'conditions' => ['Categories.id'=>$id],
        ]);
        
        $this->checkResult($category, 'category');
        $this->set("category", $category);
    }
    
    public function add(){
        
        $this->checkAccess($this->name, __FUNCTION__);
            
        if($this->request->isPost()){
            
            $this->Category->create($this->request->data);
            
            if($this->Category->validates()){
                
                if($this->Category->save(null,false)){
                    
                    $this->setMessage('saveSucess', 'Category');
                    $this->redirect(array('controller'=> $this->name, 'action' => 'view' , $this->Category->id));
                
                }else{
                    $this->setMessage('saveError', 'Category');
                }
                
            }else{
                $this->setMessage('validadeError');
            }
        }
    }
    
    public function edit($id = null){
        $this->checkAccess($this->name, __FUNCTION__);
        
        if(!$this->request->isPut()){
            $this->data = $this->Category->findById($id);
        } else {
            $this->Category->create($this->request->data);
            if($this->Category->validates()){
                if($this->Category->save(null,false)){
                    $this->setMessage('saveSucess','Category');
                    $this->redirect(array('controller' => $this->name, 'action'=> 'view', $id));
                }else{
                    $this->setMessage('saveError', 'Category');
                }
            } else{
                $this->setMessage('validateError');
            }
        }
    }
    
    public function delete($id = null){
        
        $this->checkAccess($this->name, __FUNCTION__);
        
        if($this->Category->delete($id)){
            $this->setMessage('deleteSucess', 'Category');
        } else {
           $this->setMessage('deleteError', 'Category');
        }    
        
        $this->redirect(array('controller' => $this->name, 'action' => 'index'));
    }
            
}

