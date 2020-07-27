 <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.css"/>
<div class="row">
    <div class="col-sm-12 col-md-12">
        <div class="panel panel-bd lobidrag">
            <div class="panel-heading">
                <div class="panel-title">
                    <h2><?php echo (!empty($title)?$title:null) ?></h2>
                </div>
            </div>
            <div class="panel-body">

                <style type="text/css">

                    td.details-control {
                        background: url('<?php echo base_url('assets/imnages')?>/details_open.png') no-repeat center center;
                        cursor: pointer;
                    }
                    tr.shown td.details-control {
                        background: url('<?php echo base_url('assets/imnages')?>/details_close.png') no-repeat center center;
                    }
                </style>


                <table id="table" class="display" style="width:100%">
                    <thead>
                        <tr>
                            <th></th>
                            <th>User ID</th>
                            <th>User Name</th>
                            <th>Sponsor ID</th>
                        </tr>
                    </thead>
                    
                </table>

              <?php echo json_encode(altgetir($this->session->userdata('user_id'))) ?>
 
<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.20/r-2.2.3/datatables.min.js"></script>

                <script>
                  function format ( d ) {
    // `d` is the original data object for the row
    return '<table id="table" class="display" style="width:100%"><thead><tr><th></th><th>User ID</th><th>User Name</th><th>Sponsor ID</th></tr></thead></table>';
}

$(document).ready(function() {
    var table = $('#table').DataTable( {
        ajax: '<?php echo json_encode(altgetir($this->session->userdata('user_id'))) ?>',
        columns: [
        
        { data: 'user_id' },
        { data: 'username' },
        { data: 'sponsor_id' }
    ]

    });
    table.on( 'order.dt search.dt', function () {
        table.column(0, {search:'applied', order:'applied'}).nodes().each( function (cell, i) {
            cell.innerHTML = i+1;
        } );
    } ).draw();


    // Add event listener for opening and closing details
    $('#table tbody').on('click', 'td.details-control', function () {
        var tr = $(this).closest('tr');
        var row = table.row( tr );

        if ( row.child.isShown() ) {
            // This row is already open - close it
            row.child.hide();
            tr.removeClass('shown');
        }
        else {
            // Open this row
            row.child( format(row.data()) ).show();
            tr.addClass('shown');
        }
    } );
} );
</script>
<?php 

//print_r ($uyeler[0]); ?>
</div>
</div>
</div>
</div>

