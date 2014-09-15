
 
<script type="text/javascript">

    $(document).ready(function() {

       
        var table =  $('#datatable').DataTable( {    
        
            data: <?php  echo $clientes ?>,

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


        function actualizarEdit(){

            //agrega etiqueta input para la edición de la celda
            $('#datatable .edit').on( 'dblclick', function () {

                if(!$(this).find('input').length){

                    var w = $(this).width();
                    var h = $(this).height();

                    $(this).html("<input type='text' value='"+$(this).html()+"' >");
                    
                    $(this).find('input').width(w);
                    $(this).find('input').height(h);

                    $(this).find('input').focus();
                }   

            });

        }



        //Quita la caja de texto guardando el valor que tenia en la celda
        $('#datatable tbody').on( 'blur', 'td', function () {
            $(this).html($(this).find('input').val());
            var val = $(this).html();
            var miArray = [];

            var datos = $(this).parent().find('td').each(function() {
                miArray.push($(this).html());
            });



            $.post("update", {data: miArray}, function(data) {
                alert(data);
                // success(data);
            });

        });


        table.on( 'draw', function () {
            page = $('#datatable_paginate').find('.paginate_button.current').html();
            actualizarEdit();
        });
        

        actualizarEdit();


        $('#button').click( function () {
            alert( table.rows('.selected').data().length +' row(s) selected' );
        });

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