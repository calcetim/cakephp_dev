<!-- File: /app/View/Posts/index.ctp -->
<h1>Mantenedor de Areas</h1>
<p><?php echo $this->Html->link('Agregar Areas', array('controller' => 'areas', 'action' => 'add')); ?></p>
<table>
	<tr>
		<th>Id</th>
                <th>Nombre</th>
		<th>Descripcion</th>
                <th>Acciones</th>
	</tr>
	<?php foreach ($areas as $area): ?>
	<tr>
		<td><?php echo $area['Area']['id']; ?></td>
                <td>
                        <?php echo $this->Html->link($area['Area']['nombre'], array('controller' => 'areas', 'action' => 'view', $area['Area']['nombre'])); ?>
                </td>
                <td>
                        <?php echo $this->Html->link($area['Area']['descripcion'], array('controller' => 'areas', 'action' => 'view', $area['Area']['descripcion'])); ?>
                </td>
                <td>
			<?php echo $this->Form->postlink('Eliminar', array('controller' => 'areas','action' => 'delete', $area['Area']['id']), array('confirm' => '¿Esta seguro que quiere eliminar este registro?'))?>
				&nbsp;
                        <?php echo $this->Html->link('Editar ', array('controller' => 'areas', 'action' => 'edit', $area['Area']['id'])); ?>
		</td>
	</tr>
	<?php endforeach; ?>
</table>
<p style="text-align:center;">
	<?php 


	echo $this->Paginator->prev(
		' << ' . __('Anterior'),
		array(),
		null,
		array('class' => 'prev disabled')
		);


		?>

		<?php	echo $this->Paginator->numbers(array('first' => 'First page')); ?>

		<?php 


		echo $this->Paginator->next(
			('siguiente') . ' >> ',
			array(),
			null,
			array('class' => 'prev disabled')
			);


			?>

		</p>