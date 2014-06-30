<div class="clientes form">
<?php echo $this->Form->create('Cliente'); ?>
<fieldset>
<legend><?php echo __('Agregar Cliente'); ?></legend>
<?php 
echo $this->Form->input('nombre'            , array('label' => 'Nombre'));
echo $this->Form->input('descripcion'       , array('label' => 'Descripción'));
?>
</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>