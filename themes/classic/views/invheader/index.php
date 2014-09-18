
<script type="text/javascript">

$(document).ready(function() {

    var datos = <?php echo $clientes; ?>;
    var atributos = ["id","invdate","client_id","amount","tax","total","note"];
    customDataTable(datos, atributos); 
});


</script>


<table id="datatable" class="table table-striped table-bordered" width="100%" cellspacing="0">
    <thead>
        <tr>
            <th>id</th>
            <th>invdate</th>
            <th>client_id</th>
            <th>amount</th>
            <th>tax</th>
            <th>total</th>
            <th>note</th>
           
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th>id</th>
            <th>invdate</th>
            <th>client_id</th>
            <th>amount</th>
            <th>tax</th>
            <th>total</th>
            <th>note</th>
            
        </tr>
    </tfoot>
    <tbody>
        <?php
        $this->breadcrumbs=array(
            'Invheader',
            );
            ?>
        </tbody>
    </table>