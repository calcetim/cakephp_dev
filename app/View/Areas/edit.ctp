<div class="areas form">
<?php echo $this->Form->create('Area', array('action' => 'edit')); ?>
<fieldset>
<legend><?php echo __('Editar Area'); ?></legend>
<?php 
echo $this->Form->input('nombre'            , array('label' => 'Nombre'));
echo $this->Form->input('descripcion'  , array('label' => 'Descripcion'));
echo $this->Form->input('id', array('type' => 'hidden'));
?>
</fieldset>
<?php echo $this->Form->end(__('Guardar')); ?>
</div>