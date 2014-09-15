<?php
/* @var $this InvheaderController */
?>
<!DOCTYPE html>

<html>
 	
 
<script type="text/javascript">

$(document).ready(function() {


   
    var table =  $('#datatable').DataTable( {    
    
    data: <?php  
    
    echo $clientes ?>,

    bLengthChange: true,
  
  columns: 
       [
       { "data": "id", "class": "center" },
       { "data": "invdate", "class": "center"},
       { "data": "client_id", "class": "center" },
       { "data": "amount", "class": "center" },
       { "data": "tax", "class": "center edit" },
       { "data": "total", "class": "center edit" },
       { "data": "note", "class": "center edit" },
       { "data": "created_at", "class": "center edit" },
       { "data": "updated_at", "class": "center edit" }
       ] 
    }); 



 	$('#datatable tbody').on( 'click', 'tr', function () {

  		 $(this).toggleClass('selected');

	});


$('#button').click( function () {
    alert( table.rows('.selected').data().length +' row(s) selected' );
});

});


</script>

    
</head>

<body>
<div id='content' class='content' style='margin:20px'>
    
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
                <th>created_at</th>
                <th>updated_at</th>

                
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
                <th>created_at</th>
                <th>updated_at</th>

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
</div>

</body>


</html>