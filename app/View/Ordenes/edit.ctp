<!-- app/View/Users/add.ctp -->
<div class="ordenes form">
<?php echo $this->Form->create('Ordene'); 
echo $this->Form->input('id', array('type' => 'hidden'));
?>
    <div style="text-align: center;font-weight:bold; padding:0px;margin: 0px; ">
        <h2>Editar Orden de Trabajo</h2>
    </div>
<table border="0px">
<?php
echo "<tr>";
    echo "<td colspan=\"2\">";
    echo $this->Form->input('id', array('label' => 'N° OT :','readonly'=> 'readonly', 'type' => 'text' ));
    echo "</td>";
echo "</tr>";    
echo "<tr>";
    echo "<td>";
    echo $this->Form->input('usuario_asignado_id', array('label' => 'Asignar OT :', 'options' => $usuarios,'style' => 'text-transform: uppercase'));
    echo "</td>";
    echo "<td>";
    echo $this->Form->input('estado_id'   , array('label' => 'Estado :', 'options' => $estados,'style' => 'text-transform: uppercase'));
    echo "</td>";
echo "</tr>";
echo "<tr>";
    echo "<td>";
    echo $this->Form->input('area_id'   , array('label' => 'Area :', 'options' => $areas, 'style' => 'text-transform: uppercase'));
    echo "</td>";
    echo "<td>";
    echo $this->Form->input('cliente_id'   , array('label' => 'Cliente :', 'options' => $clientes, 'style' => 'text-transform: uppercase'));
    echo "</td>";
echo "</tr>";
echo "<tr>";
    echo "<td colspan=\"2\">";
    echo $this->Form->input('descripcion_problema', array('label' => 'Descripcion del Problema :' ,'size'=>'1' ,'type' => 'textarea' ));
    echo "</td>";
echo "</tr>"; 
echo "<tr>";
    echo "<td colspan=\"2\">";
    echo $this->Form->input('desctipcion_solucion', array('label' => 'Solución del Problema :' ,'size'=>'1','type' => 'textarea' ));
    echo "</td>";
echo "</tr>";
echo "<tr>";
    echo "<td colspan=\"2\">";
    echo $this->Form->end(__('Guardar'));
    echo "</td>";
echo "</tr>";
?>
</table>

</div>