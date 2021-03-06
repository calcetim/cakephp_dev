<?php
class PostsController extends AppController {
	public $helpers 	= array('Html','Form');
	public $name 		= 'Posts';
	public $components 	= array('Session');

	public function isAuthorized($usuario) {
// All registered users can add posts
		if ($this->action === 'add') {
			return true;
		}
		
// The owner of a post can edit and delete it
		if (in_array($this->action, array('edit', 'delete'))) {
			$postId = (int) $this->request->params['pass'][0];
			if ($this->Post->isOwnedBy($postId, $usuario['id'])) {
				return true;
			}
		}
		return parent::isAuthorized($usuario);
	}
	

	function index() {
                $this->loadModel('Usuario');
		$this->set('posts', $this->Post->find('all'));
                $usuarios = $this->Usuario->find('list',
                                            array(
                                                'fields'=>array('id','username')
                                                )); //we get the authors from the database
                $this->set('usuarios', $usuarios);
                
                
                 //Debugger::dump($this->User->find('list'));
                            
	}

	public function view($id = null) {
		$this->Post->id = $id;
		$this->set('post', $this->Post->read());
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->request->data['Post']['user_id'] = $this->Auth->usfier('id');
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash('Your post has been saved.');
				$this->redirect(array('action' => 'index'));
			}
		}
	}


	public function edit($id = null) {
		if (!$id) {
			throw new NotFoundException(__('Invalid post'));
		}
		$post = $this->Post->findById($id);
		if (!$post) {
			throw new NotFoundException(__('Invalid post'));
		}
		if ($this->request->is(array('post', 'put'))) {
			$this->Post->id = $id;
			if ($this->Post->save($this->request->data)) {
				$this->Session->setFlash(__('Your post has been updated.'));
				return $this->redirect(array('action' => 'index'));
			}
			$this->Session->setFlash(__('Unable to update your post.'));
		}
		if (!$this->request->data) {
			$this->request->data = $post;
		}
	}

	function delete($id) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		if ($this->Post->delete($id)) {
			$this->Session->setFlash('The post with id: ' . $id . ' has been deleted.');
			$this->redirect(array('action' => 'index'));
		}
	}



}
