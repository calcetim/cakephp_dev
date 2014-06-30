<!-- File: /app/View/Posts/index.ctp -->
<h1>Mantenedor de Usuarios</h1>
<p><?php echo $this->Html->link('Agregar Usuario', array('controller' => 'usuarios', 'action' => 'add')); ?></p>
<table>
	<tr>
		<th>Id</th>
		<th>Rut</th>
                <th>Nombre</th>
		<th>Apellido Pat</th>
                <th>Apellido Mat</th>
		<th>Username</th>
		<th>Cargo</th>
                <th>Acciones</th>
	</tr>
	<?php foreach ($usuarios as $usuario): ?>
	<tr>
		<td><?php echo $usuario['Usuario']['id']; ?></td>
		<td>
			<?php echo $this->Html->link($usuario['Usuario']['rut'], array('controller' => 'usuarios', 'action' => 'view', $usuario['Usuario']['rut'])); ?>
		</td>
                <td>
                        <?php echo $this->Html->link($usuario['Usuario']['nombre'], array('controller' => 'usuarios', 'action' => 'view', $usuario['Usuario']['nombre'])); ?>
                </td>
                <td>
                        <?php echo $this->Html->link($usuario['Usuario']['apellido_paterno'], array('controller' => 'usuarios', 'action' => 'view', $usuario['Usuario']['apellido_paterno'])); ?>
                </td>
                <td>
                        <?php echo $this->Html->link($usuario['Usuario']['apellido_materno'], array('controller' => 'usuarios', 'action' => 'view', $usuario['Usuario']['apellido_materno'])); ?>
                </td>
                <td>
                        <?php echo $this->Html->link($usuario['Usuario']['username'], array('controller' => 'usuarios', 'action' => 'view', $usuario['Usuario']['username'])); ?>
                </td>
                <td>
                        <?php echo $this->Html->link($usuario['TipoUsuario']['descripcion'], array('controller' => 'usuarios', 'action' => 'view', $usuario['TipoUsuario']['descripcion'])); ?>
                </td>
 		<td>
			<?php echo $this->Form->postlink('Eliminar', array('controller' => 'usuarios','action' => 'delete', $usuario['Usuario']['id']), array('confirm' => '¿Esta seguro que quiere eliminar este registro?'))?>
				&nbsp;
                        <?php echo $this->Html->link('Editar ', array('controller' => 'usuarios', 'action' => 'edit', $usuario['Usuario']['id'])); ?>
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