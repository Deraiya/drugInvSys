<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shiv Medical</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <link href="css/plugins/chosen/bootstrap-chosen.css" rel="stylesheet">
    <link href="css/plugins/dataTables/datatables.min.css" rel="stylesheet">


</head>

<body class="top-navigation">

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
            @include('Partials.nav')
        </div>
        <div class="wrapper wrapper-content">
            <div class="container" style="width: 100%">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h1>Transaction History</h1>

                        </div>
                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                    <tr>
                                        <th>Invoice #</th>
                                        <th>Customer Name</th>
                                        <th>Customer Address</th>
                                        <th>Dr. Name</th>
                                        <th>Dr. Address</th>
                                        <th>Medicine's List</th>
                                        <th>Total</th>


                                    </tr>
                                    </thead>
                                    <tbody>
                                @for($i=0;$i<count($invoices);$i++)
                                    <tr class="">
                                        <td>{{$invoices[$i]-> Invoice_id}}</td>
                                        <td>{{$invoices[$i]-> p_name}}</td>
                                        <td>{{$invoices[$i]-> p_address}}</td>
                                        <td>{{$invoices[$i]-> d_name}}</td>
                                        <td>{{$invoices[$i]-> d_address}}</td>
                                        <td>

                                            <button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#myModal{{$i}}">
                                                View
                                            </button>



                                            <div class="modal inmodal fade" id="myModal{{$i}}" tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog modal-lg">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                            <h4 class="modal-title pull-left">Medicine List</h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row">

                                                                <div class="table-responsive m-t">
                                                                    <table class="table invoice-table">
                                                                        <thead>
                                                                        <tr>
                                                                            <th>Item List</th>
                                                                            <th>Quantity</th>
                                                                            <th>Mfg. Name</th>
                                                                            <th>Batch Number</th>
                                                                            <th>Exp. date</th>

                                                                            <th>Price</th>
                                                                        </tr>
                                                                        </thead>
                                                                        <tbody>
                                                                        @foreach($productsArray[$i] as $product)
                                                                        <tr>

                                                                            <td><div><strong>{{$product->getProducts()->product_name}} </strong></div>
                                                                            <td>{{$product->quantity}}</td>
                                                                            <td>{{$product->getProducts()->product_company}}</td>
                                                                            <td>{{$product->getProducts()->batch}}</td>
                                                                            <td>{{$product->getProducts()->exp_date}}</td>
                                                                            <td>{{$product->getProducts()->price}}</td>
                                                                        </tr>
                                                                        @endforeach

                                                                        </tbody>
                                                                    </table>
                                                                </div><!-- /table-responsive -->
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>

                                        </td>

                                        <td>${{$invoices[$i]->totalprice}}</td>
                                    </tr>
                                    @endfor
                                    <tfoot>
                                    <tr>
                                        <th>Invoice #</th>
                                        <th>Customer Name</th>
                                        <th>Customer Address</th>
                                        <th>Dr. Name</th>
                                        <th>Dr. Address</th>
                                        <th>Medicine's List</th>
                                        <th>Total</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="footer">
            <div class="pull-right">
                <a href="">Terms & Conditions <sup>*</sup></a>
            </div>
            <div>
                Made By <strong> Déraiya Consultancy Services</strong>
            </div>
        </div>

    </div>
</div>



<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>
<script src="js/plugins/slimscroll/jquery.slimscroll.min.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>
<script src="js/plugins/pace/pace.min.js"></script>

<!-- Flot -->
<script src="js/plugins/flot/jquery.flot.js"></script>
<script src="js/plugins/flot/jquery.flot.tooltip.min.js"></script>
<script src="js/plugins/flot/jquery.flot.resize.js"></script>

<!-- ChartJS-->
<script src="js/plugins/chartJs/Chart.min.js"></script>

<!-- Peity -->
<script src="js/plugins/peity/jquery.peity.min.js"></script>
<!-- Peity demo -->
<script src="js/demo/peity-demo.js"></script>


<!-- Chosen -->
<script src="js/plugins/chosen/chosen.jquery.js"></script>

<script src="js/plugins/dataTables/datatables.min.js"></script>

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function(){
        $('.dataTables-example').DataTable({
            pageLength: 1000,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                { extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {extend: 'print',
                    customize: function (win){
                        $(win.document.body).addClass('white-bg');
                        $(win.document.body).css('font-size', '10px');

                        $(win.document.body).find('table')
                            .addClass('compact')
                            .css('font-size', 'inherit');
                    }
                }
            ]

        });

    });

</script>
<script>
    $(document).ready(function(){
        $('.dataTables-example1').DataTable({
            pageLength: 1000,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
        });

    });

</script>

</body>

</html>
