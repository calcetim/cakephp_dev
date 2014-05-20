<?php
class OrdenesController extends AppController {
	public $helpers 	= array('Html','Form');
	public $name 		= 'Ordenes';
	public $components 	= array('Session');


	

	public function index() {
		
             Debugger::dump($this->User);
            //$this->set('ordenes', $this->User);
            
            //$this->User->find('list');
            
            
            //$users = $this->User;
            //Debugger::dump($this->->find('list'));
            //exit();
            
	}

	public function view($id = null) {
		//$this->Post->id = $id;
		//$this->set('post', $this->Post->read());
	}

	

}
?>