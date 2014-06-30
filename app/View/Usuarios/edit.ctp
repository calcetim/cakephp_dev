<div class="usuarios form">
<?php echo $this->Form->create('Usuario', array('action' => 'edit')); ?>
<fieldset>
<legend><?php echo __('Editar Usuario'); ?></legend>
<?php 
echo $this->Form->input('rut'               , array('label' => 'Rut'));
echo $this->Form->input('nombre'            , array('label' => 'Nombre'));
echo $this->Form->input('apellido_paterno'  , array('label' => 'Apellido Paterno'));
echo $this->Form->input('apellido_materno'  , array('label' => 'Apellido Paterno'));
echo $this->Form->input('username'          , array('label' => 'Usuario'));
echo $this->Form->input('password'          , array('label' => 'Contraseña'));
echo $this->Form->input('tipo_usuario_id'   , array('label' => 'Cargo', 'options' => $perfiles));
echo $this->Form->input('id', array('type' => 'hidden'));
?>
</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>