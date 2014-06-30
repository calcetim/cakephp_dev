<?php

class AreasController extends AppController {
    
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
   		$this->Area->recursive = 0;
		$this->set('areas', $this->paginate());
	}

	public function view($id = null) {
		$this->Area->id = $id;
		if (!$this->Area->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('area', $this->Area->read(null, $id));
	}

	public function add() {

        if ($this->request->is('post')) {
                $this->Area->create();
                if ($this->Area->save($this->request->data)) {
                        $this->Session->setFlash(__('El Area a sido guardado con exito'));
                        return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(
                            __('El Area no pudo guardarse. Por favor intentelo nuevamente.')
                );
        }
	}

	public function edit($id = null) {
		$this->Area->id = $id;
		/*if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Usuario Invalido'));
		}*/
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Area->save($this->request->data)) {
				$this->Session->setFlash(__('El Area a sido guardado'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(
				__('The user could not be saved. Please, try again.'));
		} else {
			$this->request->data = $this->Area->read(null, $id);
			unset($this->request->data['Area']['password']);
		}
	}

	public function delete($id = null) {
		$this->request->onlyAllow('post');
		$this->Area->id = $id;
		
//		if (!$this->Usuario->exists()) {
//			throw new NotFoundException(__('Invalid user'));
//		}
		if ($this->Area->delete()) {
			$this->Session->setFlash(__('Area Borrado'));
			return $this->redirect(array('action' => 'index'));
		}

		$this->Session->setFlash(__('Area no pudo ser eliminado'));
		return $this->redirect(array('action' => 'index'));
	}




}