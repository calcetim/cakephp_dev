<div class="usuarios form">

<?php echo $this->Form->create('Usuario'); ?>
<fieldset>
<legend>
<?php echo __('Ingrese Usuario y Contraseña'); ?>
</legend>
<?php echo $this->Form->input('username', array('label' => 'Usuario'));
echo $this->Form->input('password', array('label'=>'Contraseña'));
?>
</fieldset>
<?php echo $this->Form->end(__('Login')); ?>
</div>