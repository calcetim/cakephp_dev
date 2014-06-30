		<?php
		App::uses('AppModel', 'Model');
                
		App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

		class Usuario extends AppModel {
                        public $name = 'Usuario';
                        
                        
                         public  $belongsTo  =  array ('TipoUsuario'  =>  array ( 
                                                            'className'  =>  'TipoUsuario',
                                                            'foreignKey'  =>  'tipo_usuario_id'
                                                            
                                                        ) 
                                                    );
                        //CONCATENA DE FORMA VIRTUAL
                        public $virtualFields = array(
                        'full_name' => 'CONCAT(nombre, " ", apellido_paterno, " ",apellido_materno)'
                        );
                        
			public $validate = array(
				'username' => array(
					'required' => array(
						'rule' => array('notEmpty'),
						'message' => 'A username is required'
						)
					),
				'password' => array(
					'required' => array(
						'rule' => array('notEmpty'),
						'message' => 'A password is required'
						)
					)
				);

			public function beforeSave($options = array()) {
				if (isset($this->data[$this->alias]['password'])) {
					$passwordHasher = new SimplePasswordHasher();
					$this->data[$this->alias]['password'] = $passwordHasher->hash(
						$this->data[$this->alias]['password']
						);
				}
				return true;
			}
                        
                        
                        
		}

