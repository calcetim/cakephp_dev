<?php
class OrdenesController extends AppController {
    

	public function index() {
        //Debugger::dump($this->TipoUsuario->find('list'));
        $this->loadModel('Usuario');
        
        $usuarios = $this->Usuario->find('list',array('fields'=>array('id','full_name'))); 
        $this->set('usuarios', $usuarios);

        $this->loadModel('Estado');
        $estados = $this->Estado->find('list',array('fields'=>array('id','descripcion'))); 
        $this->set('estados', $estados);

        $this->loadModel('Cliente');
        $clientes = $this->Cliente->find('list',array('fields'=>array('id','nombre'))); 
        $this->set('clientes', $clientes);
        
        
        
        		$conditions = array();
		//Transform POST into GET
		if(($this->request->is('post') || $this->request->is('put')) && isset($this->data['Filter'])){
			$filter_url['controller'] = $this->request->params['controller'];
			$filter_url['action'] = $this->request->params['action'];
			// We need to overwrite the page every time we change the parameters
			$filter_url['page'] = 1;

			// for each filter we will add a GET parameter for the generated url
			foreach($this->data['Filter'] as $name => $value){
				if($value){
					// You might want to sanitize the $value here
					// or even do a urlencode to be sure
					$filter_url[$name] = urlencode($value);
				}
			}	
			// now that we have generated an url with GET parameters, 
			// we'll redirect to that page
			return $this->redirect($filter_url);
		} else {
			// Inspect all the named parameters to apply the filters
			foreach($this->params['named'] as $param_name => $value){
				// Don't apply the default named parameters used for pagination
				if(!in_array($param_name, array('page','sort','direction','limit'))){
					// You may use a switch here to make special filters
					// like "between dates", "greater than", etc
                               
					$conditions['Ordene.'.$param_name] = $value;
					
					$this->request->data['Filter'][$param_name] = $value;
				}
			}
		}
                
                //$this->Ordene->recursive = 0;
		$this->paginate = array(
			'limit' => 10,
			'conditions' => $conditions,
                         'order' => array(
                        'Ordene.id' => 'desc'
        )
		);
		//$this->set('ordenes', $this->paginate());

		// get the possible values for the filters and 
		// pass them to the view
		
		
        
        
            
                $this->Ordene->find('all', array('fields' => array('Ordene.id','Usuario.nombre','Usuario.apellido_paterno','Usuario.apellido_materno','Estado.descripcion',
                    'Ordene.descripcion_problema')));
		$this->set('ordenes',$this->paginate());
                $this->set(compact('Estado', 'Cliente'));                
                
	}
        
        public function view($id = null) {
		$this->Ordene->id = $id;
		if (!$this->Ordene->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('ordenes', $this->Ordene->read(null, $id));
	}

        public function edit($id = null) {
            
        $this->loadModel('Usuario');
        $usuarios = $this->Usuario->find('list',array('fields'=>array('id','full_name'))); 
        $this->set('usuarios', $usuarios);

        $this->loadModel('Area');
        $areas = $this->Area->find('list',array('fields'=>array('id','nombre'))); 
        $this->set('areas', $areas);

        $this->loadModel('Estado');
        $estados = $this->Estado->find('list',array('fields'=>array('id','descripcion'))); 
        $this->set('estados', $estados);

        $this->loadModel('Cliente');
        $clientes = $this->Cliente->find('list',array('fields'=>array('id','nombre'))); 
        $this->set('clientes', $clientes);
            
		$this->Ordene->id = $id;
		/*if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Usuario Invalido'));
		}*/
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Ordene->save($this->request->data)) {
				$this->Session->setFlash(__('la orden a sido guardado'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(
				__('The user could not be saved. Please, try again.'));
		} else {
			$this->request->data = $this->Ordene->read(null, $id);
			unset($this->request->data['Ordene']['password']);
		}
	}
        public function add() {
            
        $this->loadModel('Usuario');
        $usuarios = $this->Usuario->find('list',array('fields'=>array('id','full_name'))); 
        $this->set('usuarios', $usuarios);

        $this->loadModel('Area');
        $areas = $this->Area->find('list',array('fields'=>array('id','nombre'))); 
        $this->set('areas', $areas);

        $this->loadModel('Estado');
        $estados = $this->Estado->find('list',array('fields'=>array('id','descripcion'))); 
        $this->set('estados', $estados);

        $this->loadModel('Cliente');
        $clientes = $this->Cliente->find('list',array('fields'=>array('id','nombre'))); 
        $this->set('clientes', $clientes);

        if ($this->request->is('post')) {
                $this->Ordene->create();
                if ($this->Ordene->save($this->request->data)) {
                    $this->Ordene->saveField('fecha_creacion', date("Y-m-d H:i:s"));
                        $this->Session->setFlash(__('La orden a sido guardado con exito'));
                        return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(
                            __('La orden no pudo guardarse. Por favor intentelo nuevamente.')
                );
        }
	}



	

}
