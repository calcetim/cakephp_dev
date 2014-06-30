<!-- File: /app/View/Posts/index.ctp -->

	<div class="filters">
		
		<?php
		// The base url is the url where we'll pass the filter parameters
		$base_url = array('controller' => 'ordenes', 'action' => 'index');
		echo $this->Form->create("Filter",array('url' => $base_url, 'class' => 'filter'));
		// add a select input for each filter. It's a good idea to add a empty value and set
		// the default option to that.
                echo $this->Form->input("id", array('label' => 'N ° OT', 'placeholder' => ""));
                echo $this->Form->input("usuario_asignado_id", array('label' => 'Usuario Asignado', 'options' => $usuarios, 'empty' => 'Seleccione', 'default' => '',  'style' => 'text-transform: uppercase'));
		echo $this->Form->input("estado_id", array('label' => 'Estado', 'options' => $estados, 'empty' => 'Seleccione', 'default' => '','style' => 'text-transform: uppercase'));
		echo $this->Form->input("cliente_id", array('label' => 'Cliente', 'options' => $clientes, 'empty' => 'Seleccione', 'default' => '','style' => 'text-transform: uppercase'));
		// Add a basic search 
		
		echo $this->Form->submit("Buscar");

		// To reset all the filters we only need to redirect to the base_url
		echo "<div class='submit actions'>";
		//echo $this->Html->link("Reset",$base_url);
		echo "</div>";
		echo $this->Form->end();
		?>
	</div>

<table width="100%">
	<tr>
		<th width="3%">N° OT</th>
		<th width="10%">USUARIO ASIGNADO</th>
                <th width="8%">ESTADO</th>
		<th width="50%">PROBLEMA</th>
                <th width="5%">ACCION</th>
	</tr>
	<?php foreach ($ordenes as $orden): ?>
	<tr>
		<td width="3%"><?php echo $orden['Ordene']['id']; ?></td>
		<td width="10%">
			<?php echo $this->Html->link(strtoupper($orden['Usuario']['nombre']), array('controller' => 'ordenes', 'action' => 'edit', $orden['Ordene']['id'])); ?>
                        <?php echo $this->Html->link(strtoupper($orden['Usuario']['apellido_paterno']), array('controller' => 'ordenes', 'action' => 'edit', $orden['Ordene']['id'])); ?>
                        <?php echo $this->Html->link(strtoupper($orden['Usuario']['apellido_materno']), array('controller' => 'ordenes', 'action' => 'edit', $orden['Ordene']['id'])); ?>
		</td>
                <td width="8%">
                        <?php echo $this->Html->link(strtoupper($orden['Estado']['descripcion']), array('controller' => 'ordenes', 'action' => 'edit', $orden['Ordene']['id'])); ?>
                </td>
                <td width="50%">
                        <?php echo $this->Html->link(strtoupper($orden['Ordene']['descripcion_problema']), array('controller' => 'ordenes', 'action' => 'edit', $orden['Ordene']['id'])); ?>
                </td>
 		<td width="5%">
			<?php echo $this->Form->postlink('Eliminar', array('controller' => 'ordenes','action' => 'delete', $orden['Ordene']['id']), array('confirm' => '¿Esta seguro que quiere eliminar este registro?'))?>
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