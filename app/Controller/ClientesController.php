<?php

class ClientesController extends AppController {
    
	/*public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add', 'logout');
	}*/

//    public $paginate = array(
//        'fields' => array('User.id', 'User.created','User.username','User.modified'),
//        'limit' => 5,
//        'prevPage' => true,
//        'order' => array(
//            'Usuarios.nombre' => 'asc'
//        )
//    );

	public function index() {
                //Debugger::dump($this->TipoUsuario->find('list'));
   		$this->Cliente->recursive = 0;
		$this->set('clientes', $this->paginate());
	}

	public function view($id = null) {
		$this->Cliente->id = $id;
		if (!$this->Cliente->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('clientes', $this->Cliente->read(null, $id));
	}

	public function add() {

        if ($this->request->is('post')) {
                $this->Cliente->create();
                if ($this->Cliente->save($this->request->data)) {
                        $this->Session->setFlash(__('El Cliente a sido guardado con exito'));
                        return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(
                            __('El Cliente no pudo guardarse. Por favor intentelo nuevamente.')
                );
        }
	}

	public function edit($id = null) {
		$this->Cliente->id = $id;
		/*if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Usuario Invalido'));
		}*/
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Cliente->save($this->request->data)) {
				$this->Session->setFlash(__('El cliente a sido guardado'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(
				__('The user could not be saved. Please, try again.'));
		} else {
			$this->request->data = $this->Cliente->read(null, $id);
			unset($this->request->data['Cliente']['password']);
		}
	}

	public function delete($id = null) {
		$this->request->onlyAllow('post');
		$this->Cliente->id = $id;
		
//		if (!$this->Usuario->exists()) {
//			throw new NotFoundException(__('Invalid user'));
//		}
		if ($this->Cliente->delete()) {
			$this->Session->setFlash(__('Cliente Borrado'));
			return $this->redirect(array('action' => 'index'));
		}

		$this->Session->setFlash(__('Cliente no pudo ser eliminado'));
		return $this->redirect(array('action' => 'index'));
	}




}