<div class="usuarios form">
<?php echo $this->Form->create('Usuario'); ?>
<fieldset>
<legend><?php echo __('Agregar Usuario'); ?></legend>
<?php 
echo $this->Form->input('rut'               , array('label' => 'Rut'));
echo $this->Form->input('nombre'            , array('label' => 'Nombre'));
echo $this->Form->input('apellido_paterno'  , array('label' => 'Apellido Paterno'));
echo $this->Form->input('apellido_materno'  , array('label' => 'Apellido Paterno'));
echo $this->Form->input('username'          , array('label' => 'Usuario'));
echo $this->Form->input('password'          , array('label' => 'Contraseña'));
echo $this->Form->input('tipo_usuario_id'   , array('label' => 'Cargo', 'options' => $perfiles));
?>
</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>