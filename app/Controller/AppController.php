<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    
    	public $components = array(
		'DebugKit.Toolbar',
		'Session'
            );
        
        public $helpers = array(

    'Session'
);
        
//           public $components = array(
//        'Auth' => array(
//            'authorize' => 'actions',
//            'actionPath' => 'controllers/',
//            'loginAction' => array(
//                'controller' => 'usuarios',
//                'action' => 'login',
//                'plugin' => false,
//               'admin' => false,
//                ),
//             ),
//         );
    
   // public$components=array('Session');

    // Comprobar si el usuario está logueado
    function authenticate()
    {
        // Comprobamos si la variable de sesión existe. Si es así quiere decir que el usuario se ha logueado
       //correctamente y se le redirecciona a la aplicación.
      //Si no existe se le devuelve al login.
        if(!$this->Session->check('Usuario'))
        {
            $this->redirect(array('controller'=>'usuarios','action'=>'login'));
            exit();
        }

    }
 
    //Autenticación obligatoria si se quiere entrar a cualquier parte de la aplicación
    function afterFilter()
    {
        if($this->action!='login')
        {
            $this->authenticate();
        }
    }
        
        
        	// only allow the login controllers only
//	public function beforeFilter() {
//        //$this->Auth->allow('login');
//        $this->Auth->allow('index', 'view');
//    }
//	
//	public function isAuthorized($usuarios) {
//		// Here is where we should verify the role and give access based on role
//		
//		return true;
//	}
    
    
//	public $components = array('DebugKit.Toolbar','Session',
//		'Auth' 			=> array(
//                            'authenticate' => array(
//            'Form' => array(
//                'userModel' => 'Usuario',
//                'fields' => array(
//                    'username' => 'username',
//                    'password' => 'password'
//                )
//                
//            )
//        ),
//                        'loginAction' => array(
//                                'controller' => 'usuarios',
//                                'action' => 'login'
//                                ),
//			'loginRedirect' => array(
//				'controller' 	=> 'posts',
//				'action' 	=> 'index'
//				),
//			'logoutRedirect'=> array(
//				'controller' 	=> 'pages',
//				'action' 	=> 'display',
//				'home'
//                                ),'authorize' => array('Controller'))
//			);

//		public function beforeFilter() {
//			//$this->Auth->allow('index', 'view');
//                        $this->Auth->allow();
//		}

		/*public function isAuthorized($usuario) {
                        // Admin can access every action
			if (isset($usuario['role']) && $usuario['role'] === 'admin') {
				return true;
			}
                        // Default deny
			return false;
		}*/

	//array('DebugKit.Toolbar');
	}
