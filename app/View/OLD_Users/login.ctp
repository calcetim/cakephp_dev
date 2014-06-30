<div class="users form">
<?php echo $this->Session->flash('auth'); ?>
<?php echo $this->Form->create('User'); ?>
<fieldset>
<legend>
<?php echo __('Ingrese Usuario y Contraseña'); ?>
</legend>
<?php echo $this->Form->input('username', array('label' => 'Usuario'));
echo $this->Form->input('password', array('label'=>'Contraseña','type'=>'password'));
?>
</fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>