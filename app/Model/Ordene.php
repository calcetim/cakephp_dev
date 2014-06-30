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
                                                       


                        
                        
		}

