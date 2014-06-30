<?php
	App::uses('AppModel', 'Model');
	App::uses('SimplePasswordHasher', 'Controller/Component/Auth');
class TipoUsuario extends AppModel 
{
	public $name = 'TipoUsuario';
        public $useTable = 'tipos_usuarios';


}

