<div class="areas form">
<?php echo $this->Form->create('Area'); ?>
<fieldset>
<legend><?php echo __('Agregar Area'); ?></legend>
<?php 
echo $this->Form->input('nombre'            , array('label' => 'Nombre'));
echo $this->Form->input('descripcion'       , array('label' => 'Descripción'));
?>
</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>