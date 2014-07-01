		<?php
		App::uses('AppModel', 'Model');
		App::uses('SimplePasswordHasher', 'Controller/Component/Auth');

		class Ordene extends AppModel {
                        public $name = 'Ordene';
                        //public $hasOne  =  'TipoUsuario' ;
                        
                     
                                                      
                                                       var $belongsTo = array (
                                                                                'Usuario' => array (
                                                                                    'className'  =>  'Usuario',
                                                                                    'foreignKey' => 'usuario_asignado_id'
                                                                                ),
                                                                                'Estado' => array (
                                                                                    'className'  =>  'Estado',
                                                                                    'foreignKey' => 'estado_id'
                                                                                )   
                                                                            );
                                                       
                                                       
                                                       			public $validate = array(
				'usuario_asignado_id' => array(
					'required' => array(
						'rule' => array('notEmpty'),
						'message' => 'A username is required'
						)
					),
				'estado_id' => array(
					'required' => array(
						'rule' => array('notEmpty'),
						'message' => 'A password is required'
						)
					),
				'area_id' => array(
					'required' => array(
						'rule' => array('notEmpty'),
						'message' => 'A password is required'
						)
					),
				'cliente_id' => array(
					'required' => array(
						'rule' => array('notEmpty'),
						'message' => 'A password is required'
						)
					),
				'descripcion_problema' => array(
					'required' => array(
						'rule' => array('notEmpty'),
						'message' => 'A password is required'
						)
					)
				
				);
                                                                        
                                                       


                        
                        
		}

