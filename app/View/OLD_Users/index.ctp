<!-- File: /app/View/Posts/index.ctp -->
<h1>Mantenedor de Usuarios</h1>
<p><?php echo $this->Html->link('Agregar Usuario', array('controller' => 'users', 'action' => 'add')); ?></p>
<table>
	<tr>
		<th>Id</th>
		<th>Usuario</th>
		<th>Acciones</th>
		<th>Fecha Creaci&oacute;n</th>
		<th>Fecha Modificaci&oacute;n</th>
	</tr>
	<!-- Here is where we loop through our $posts array, printing out post info -->
	<?php foreach ($users as $user): ?>
	<tr>
		<td><?php echo $user['User']['id']; ?></td>
		<td>
			<?php echo $this->Html->link($user['User']['username'],
			array('controller' => 'users', 'action' => 'view', $user['User']['id'])); ?>
		</td>
		<td>
			<?php 
			echo $this->Form->postlink('Eliminar',
				array('action' => 'delete', $user['User']['id']),
				array('confirm' => 'Are you sure?'))?>
				&nbsp;
				<?php echo $this->Html->link('Editar', array('action' => 'edit', $user['User']['id'])); ?>
			</td>
			<td><?php echo $user['User']['created']; ?></td>
			<td><?php echo $user['User']['modified']; ?></td>
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