<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shiv Medical</title>

    <link href="{{URL::asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/style.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/plugins/chosen/bootstrap-chosen.css')}}" rel="stylesheet">
    <link href="{{URL::asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">


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
                <div class="col-lg-4 col-lg-offset-2">
                    <div class="widget red-bg p-lg text-center">
                        <div class="m-b-md">
                            <i class="fa fa-warning fa-4x"></i>
                            <h1 class="m-xs">{{$expiryCount}}</h1>
                            <h3 class="font-bold no-margins">
                                Medicine About To Expire

                                    <button type="button" class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal6">
                                        Click Me
                                    </button>
                                    <div class="modal inmodal fade" id="myModal6" tabindex="-1" role="dialog" aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content animated flipInY">
                                                <div class="modal-header">
                                                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                                                    <h4 class="modal-title pull-left text-danger">About To Expire</h4>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover dataTables-example1" >
                                                            <thead>
                                                            <tr>
                                                                <th class="text-muted">Prod Name</th>
                                                                <th class="text-muted">Exp. Date</th>
                                                                <th class="text-muted">Delete</th>

                                                            </tr>
                                                            </thead>
                                                            <tbody>
                                                            @if($expiryids!=null)
                                                                @foreach($expiryids as $product)
                                                                    <tr class="">
                                                                        <td class="text-muted">{{$product->product_name}}</td>
                                                                        <td class="text-muted">{{$product->exp_date}}</td>
                                                                        <td><a href='{{url("delete/product/$product->id") }}'
                                                                               button type="button"
                                                                               class="btn btn-danger btn-xs">Delete</a>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>

                            </h3>
                            <small></small>
                        </div>
                    </div>
                </div>
                    <div class="col-lg-4">
                        <div class="widget yellow-bg p-lg text-center">
                            <div class="m-b-md">
                                <i class="fa fa-plus-square fa-4x"></i>
                                <h1 class="m-xs">{{$count}}</h1>
                                <h3 class="font-bold no-margins">
                                   Total Medicine's
                                </h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">

                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h1>Inventory List</h1>

                        </div>
                        <div class="ibox-content">

                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover dataTables-example" >
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Prod Name</th>
                                        <th>Prod Company</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Mfg. Date</th>
                                        <th>Exp. Date</th>
                                        <th>Date Of Arrival</th>
                                        <th>Distributor</th>
                                        <th>Batch #</th>
                                        <th>Image</th>

                                    </tr>
                                    </thead>

                                        <tbody>
                                        @foreach($products as $product)
                                        <tr class="">
                                            <td>{{ $product->id}}</td>
                                            <td>{{ $product->product_name}}</td>
                                            <td>{{ $product->product_company}}</td>
                                            <td>{{ $product->quantity}}</td>
                                            <td>{{ $product->price}}</td>
                                            <td>{{ $product->mfg_date}}</td>
                                            <td>{{ $product->exp_date}}</td>
                                            <td>{{ $product->arrival_date}}</td>
                                            <td>{{ $product->distributor}}</td>
                                            <td>{{ $product->batch}}</td>
                                            <td>
                                                <button type="button" class="btn btn-info btn-xs" data-toggle="modal"
                                                        data-target="#showImage" onclick="viewImage({{$product->img}})">
                                                    View Image
                                                </button>

                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>

                                    <tfoot>
                                    <tr>
                                        <th>#</th>
                                        <th>Prod Name</th>
                                        <th>Prod Company</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Mfg. Date</th>
                                        <th>Exp. Date</th>
                                        <th>Date Of Arrival</th>
                                        <th>Distributor</th>
                                        <th>Batch #</th>
                                        <th>Image</th>
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
<script src="{{URL::asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{URL::asset('js/bootstrap.min.js')}}"></script>
<script src="{{URL::asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{URL::asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>

<!-- Custom and plugin javascript -->
<script src="{{URL::asset('js/inspinia.js')}}"></script>
<script src="{{URL::asset('js/plugins/pace/pace.min.js')}}"></script>

<!-- Flot -->
<script src="{{URL::asset('js/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{URL::asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{URL::asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>

<!-- ChartJS-->
<script src="{{URL::asset('js/plugins/chartJs/Chart.min.js')}}"></script>

<!-- Peity -->
<script src="{{URL::asset('js/plugins/peity/jquery.peity.min.js')}}"></script>
<!-- Peity demo -->
<script src="{{URL::asset('js/demo/peity-demo.js')}}"></script>


<!-- Chosen -->
<script src="{{URL::asset('js/plugins/chosen/chosen.jquery.js')}}"></script>

<script src="{{URL::asset('js/plugins/dataTables/datatables.min.js')}}"></script>

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
