		<?php
		App::uses('AppModel', 'Model');
		App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

		class Area extends AppModel {
                        public $name = 'Area';
                        
			public $validate = array(
				'nombre' => array(
					'required' => array(
						'rule' => array('notEmpty'),
						'message' => 'campo requerido'
						)
					),
				'descripcion' => array(
					'required' => array(
						'rule' => array('notEmpty'),
						'message' => 'campo requerido'
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

