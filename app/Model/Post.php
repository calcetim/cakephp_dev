<?php
App::uses('AppModel', 'Model');
class Post extends AppModel 
{

	public $name = 'Post';


	public $validate = array(
		'title' => array(
			'rule' => 'notEmpty'
			),
		'body' => array(
			'rule' => 'notEmpty'
			)
		);

	public function isOwnedBy($post, $user) {
return $this->field('id', array('id' => $post, 'user_id' => $user)) !== false;
}

}

?>