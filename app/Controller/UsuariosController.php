<?php

class UsuariosController extends AppController {
    
	/*public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('add', 'logout');
	}*/

//    public $paginate = array(
//        //'fields' => array('User.id', 'User.created','User.username','User.modified'),
//        'limit' => 5,
//        'prevPage' => true,
//        'order' => array(
//            'Usuarios.nombre' => 'asc'
//        )
//    );

	public function index() {
                //Debugger::dump($this->TipoUsuario->find('list'));
   		//$this->Usuario->recursive = 0;
                $this->Usuario->find('all', array('fields' => array('Usuario.id','Usuario.rut','Usuario.nombre',
                    'Usuario.apellido_paterno','Usuario.apellido_materno','Usuario.username','TipoUsuario.descripcion')));
		$this->set('usuarios', $this->paginate());
                //$this->set('usuarios',);
	}

	public function view($id = null) {
		$this->Usuario->id = $id;
		if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		$this->set('usuario', $this->Usuario->read(null, $id));
	}

	public function add() {

        $this->loadModel('TipoUsuario');
        $perfiles = $this->TipoUsuario->find('list',array('fields'=>array('id','descripcion'))); 
        $this->set('perfiles', $perfiles);

        if ($this->request->is('post')) {
                $this->Usuario->create();
                if ($this->Usuario->save($this->request->data)) {
                        $this->Session->setFlash(__('El Usuario a sido guardado con exito'));
                        return $this->redirect(array('action' => 'index'));
                }
                $this->Session->setFlash(
                            __('El Usuario no pudo guardarse. Por favor intentelo nuevamente.')
                );
        }
	}

	public function edit($id = null) {
            
        $this->loadModel('TipoUsuario');
        $perfiles = $this->TipoUsuario->find('list',array('fields'=>array('id','descripcion'))); 
        $this->set('perfiles', $perfiles);
		$this->Usuario->id = $id;
		/*if (!$this->Usuario->exists()) {
			throw new NotFoundException(__('Usuario Invalido'));
		}*/
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Usuario->save($this->request->data)) {
				$this->Session->setFlash(__('El usuario a sido guardado'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(
				__('The user could not be saved. Please, try again.'));
		} else {
			$this->request->data = $this->Usuario->read(null, $id);
			unset($this->request->data['Usuario']['password']);
		}
	}

	public function delete($id = null) {
		$this->request->onlyAllow('post');
		$this->Usuario->id = $id;
		
//		if (!$this->Usuario->exists()) {
//			throw new NotFoundException(__('Invalid user'));
//		}
		if ($this->Usuario->delete()) {
			$this->Session->setFlash(__('Usuario Borrado'));
			return $this->redirect(array('action' => 'index'));
		}

		$this->Session->setFlash(__('Usuario no pudo ser eliminado'));
		return $this->redirect(array('action' => 'index'));
	}
        
          public$components=array('Session');
 
    public function login(){
        // Aunque los campos username y password tienen validación para que no estén vacíos,
// volvemos a asegurarnos con el condicional que el campo username del formulario tiene
        //algún valor
        if(empty($this->data['Usuario']['username'])==false)
        {
    	 //Consulta SQL para buscar al usuario con sus credenciales en la BD
                $user=$this->Usuario->find('all',array('conditions'=>array(
                'Usuario.username'=>$this->data['Usuario']['username'],
                'Usuario.password'=>$this->data['Usuario']['password'])));
         //Si se ha encontrado al usuario en la consulta
         if($user!=false)
         {
          //Si existe se redirecciona al usuario a la aplicación creando una variable de sesión 
          $this->Session->setFlash(__('Gracias por loguearse!'));
          $this->Session->write('Usuario',$user);
          $this->Redirect(array('controller'=>'ordenes','action'=>'index'));
          exit();
         }
         else
         {
//Si los datos no son correctos se comunica al usuario y se le devuelve al mismo
          //formulario de login
          $this->Session->setFlash(__('Nombre de usuario y/o password incorrectos'));
          $this->Redirect(array('action'=>'login'));
          exit();
         }
        }
    }

//	public function login() {
//            
//            		//if already logged-in, redirect
//		if($this->Session->check('Auth.Usuario')){
//			$this->redirect(array('action' => 'index'));		
//		}
//		
//		// if we get the post information, try to authenticate
//		if ($this->request->is('post')) {
//			if ($this->Auth->login()) {
//				$this->Session->setFlash(__('Welcome, '. $this->Auth->Usuario('username')));
//				$this->redirect($this->Auth->redirectUrl());
//			} else {
//				$this->Session->setFlash(__('Invalid username or password'));
//			}
//		} 
//            
            
//            Debugger::dump($this->request->is('post'));
//		if ($this->request->is('post')) {
//                    
//			if ($this->Auth->login()) {
//				return $this->redirect($this->Auth->redirect());
//			}
//			$this->Session->setFlash(__('El usuario o contraseña es invalido, Intentelo nuevamente'));
//		}
	//}

function logout()
{

    $this->Session->delete('Usuario');
    $this->Redirect(array('controller'=>'usuarios','action'=>'login'));
}
        
        
}