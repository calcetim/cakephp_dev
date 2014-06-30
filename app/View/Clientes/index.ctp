<!-- File: /app/View/Posts/index.ctp -->
<h1>Mantenedor de Clientes</h1>
<p><?php echo $this->Html->link('Agregar Cliente', array('controller' => 'clientes', 'action' => 'add')); ?></p>
<table>
	<tr>
		<th>Id</th>
                <th>Nombre</th>
		<th>Descripcion</th>
                <th>Acciones</th>
	</tr>
	<?php foreach ($clientes as $cliente): ?>
	<tr>
		<td><?php echo $cliente['Cliente']['id']; ?></td>
                <td>
                        <?php echo $this->Html->link($cliente['Cliente']['nombre'], array('controller' => 'clientes', 'action' => 'view', $cliente['Cliente']['nombre'])); ?>
                </td>
                <td>
                        <?php echo $this->Html->link($cliente['Cliente']['descripcion'], array('controller' => 'clientes', 'action' => 'view', $cliente['Cliente']['descripcion'])); ?>
                </td>
                <td>
			<?php echo $this->Form->postlink('Eliminar', array('controller' => 'clientes','action' => 'delete', $cliente['Cliente']['id']), array('confirm' => '¿Esta seguro que quiere eliminar este registro?'))?>
				&nbsp;
                        <?php echo $this->Html->link('Editar ', array('controller' => 'clientes', 'action' => 'edit', $cliente['Cliente']['id'])); ?>
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