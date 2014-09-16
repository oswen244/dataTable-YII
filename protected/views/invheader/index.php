<script type="text/javascript">

    $(document).ready(function() {
        var papa;
        var valBefore;
        var valAfter;
        var alt;
        $("#campo").hide();
        var table = $('#datatable').DataTable( {
        
            data: <?php echo $clientes ?>,

            bLengthChange: true,
          
             columns:
               [
                   { "data": "invid", "class": "center" },
                   { "data": "invdate", "class": "center"},
                   { "data": "client_id", "class": "center edit" },
                   { "data": "amount", "class": "center edit" },
                   { "data": "tax", "class": "name center edit"},
                   { "data": "total", "class": "center edit"},
                   { "data": "note", "class": "center edit" }
               ]
        });


        $('#addForm').bootstrapValidator({
            message: 'This value is not valid',
            feedbackIcons: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                name: {
                    validators: {
                        notEmpty: {
                            message: 'The name is required'
                        },
                        stringLength: {
                            min: 1,
                            max: 6,
                            message: 'The name must be more than 6 and less than 10 characters'
                        }
                    }
                }
            }
        });


     	$('#datatable tbody').on( 'click', 'tr', function () {

      		 $(this).toggleClass('selected');

    	});


        function actualizarEdit(){

            //agrega etiqueta input para la edición de la celda
            $('#datatable .edit').on( 'dblclick', function () {

                if(!$(this).find('input').length){
                    valBefore = $(this).html();
                    alt = $(this).attr('class');
                    var clas = alt.split(" ");
                    var w = $(this).width()+parseInt($(this).css('padding'))*2;
                    var h = $(this).height()+parseInt($(this).css('padding'))*2;
                    // alert(w +" "+h)
                    $(this).css('padding','0px');
                    // $(this).html("<input name='"+clas[1]+"' class='form-control text-center' style='width:"+w+"px ; height:"+h+"px' type='text' value='"+$(this).html()+"' >");
                    // $(this).html("<div class='col-xs-8'><input name='"+clas[1]+"' type='text' class='form-control text-center' style='width:"+w+"px ; height:"+h+"px' value='"+$(this).html()+"'/></div>");
                    $(this).html("");
                    $("#campo").css({width:w, height:h});
                    $("#campo").val(valBefore);
                    papa = $("#campo").parent();
                    papa.detach().appendTo(this);
                    $("#campo").show('400', function() {});
                    $(this).find('input').focus();
                }   

            });

        }

        function success(mensaje){

            toastr.options = {
                "closeButton": false,
                "debug": false,
                "positionClass": "toast-top-left",
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "5000",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "slideDown",
                "hideMethod": "slideUp"
            }

            toastr.success(mensaje)
        }



        //Quita la caja de texto guardando el valor que tenia en la celda
        $('#datatable tbody').on( 'blur', 'td', function () {
            valAfter = $("#campo").val();
            $("#campo").hide('slow', function() {});
            papa = $("#campo").parent();
            papa.detach().appendTo($("#pos-ini"));

            $(this).html(valAfter);
            // $(this).html($(this).find('input').val());
            // valAfter = $(this).html();
            $(this).css('padding','8px');
            var miArray = [];
            var datos = $(this).parent().find('td').each(function() {
                miArray.push($(this).html());
            });
            if(valAfter==""){
                alert("es vacío");
            }
            if((valBefore != valAfter) && valAfter != ""){
                // $.post("invheader/update", {data: miArray}, function(data) {
                //     success(data);
                // });
            }

        });


        table.on( 'draw', function () {
            // page = $('#datatable_paginate').find('.paginate_button.current').html();
            page = $('#datatable_paginate').find('.paginate_button.active a').html();
            // alert(page);
            actualizarEdit();
        });
        

        actualizarEdit();


        $('#button').click( function () {
            alert( table.rows('.selected').data().length +' row(s) selected' );
        });

    });

</script>

    <form id="addForm" role="form">

    
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
            <div id="pos-ini">
                <div class="col-xs-8"><input width="160px" id="campo" type="text" class="form-control" name="name"/></div>
            </div>
        </tbody>
    </table>
    </form>