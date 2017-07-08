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
    <!-- Input Mask-->
    <script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>


</head>

<body class="top-navigation">

<div id="wrapper">
    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
            @include('Partials.nav')
        </div>
        <div class="wrapper wrapper-content">
            <div class="container" style="width: 100%">
                <div class="ibox-content m-b-sm border-bottom">
                    <div class="row">

                        <div class="col-lg-12 ">
                            <div class="ibox float-e-margins">
                                <div class="ibox-title">
                                    <h1>Enter Product Name </h1>
                                </div>
                                <form method="get" action="{{route('insert')}}">
                                    <div class="ibox-content">
                                        <div class="row">
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="product_name">First Name</label>
                                                    <input type="text" name="fname" value="" autofocus
                                                           class="form-control" required>
                                                </div>
                                            </div>
                                            <div class="col-lg-4">
                                                <div class="form-group">
                                                    <label class="control-label" for="price">Last Name</label>
                                                    <input type="text" name="lname" value="" class="form-control"
                                                           required>
                                                </div>
                                            </div>
                                        </div>

                                        <br>
                                        <p>
                                            <button type="button" class="btn btn-primary" id="btnAdd">Add Product
                                            </button>
                                        </p>
                                        <div class="form-group">
                                            <div class="m-t-sm" id="TextBoxContainer">
                                                <!--<select data-placeholder="Choose a Country..." class="chosen-select" style="width: 300px;" tabindex="2">-->
                                                <!--<option value="">Select</option>-->
                                                <!--<option value="United States">United States</option>-->
                                                <!--<option value="United Kingdom">United Kingdom</option>-->

                                                <!--</select> &nbsp; <button type="button" class="btn btn-danger btn-xs">Remove</button>-->

                                            </div>
                                        </div>
                                        <input type="hidden" name="data-holder" id="formdata" value="">
                                        <div class="form-group">
                                            <button class="btn btn-sm btn-info" id="btnGet" type="submit">Save</button>
                                        </div>

                                    </div>
                                </form>
                            </div>

                        </div>


                    </div>
                    <hr class="hr-line-solid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="ibox float-e-margins">
                                <div class="m-b-md">
                                    <h2>Added Inventory List</h2>

                                </div>
                                <div class="ibox-content">

                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered table-hover dataTables-example">
                                            <thead>

                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Medicine List</th>


                                            </tr>
                                            </thead>
                                            <tbody>

                                            @for($i=0;$i<$count;$i++)
                                                <tr class="">
                                                    <td>{{$i}}</td>
                                                    <td>{{$products[$i]->first_name}}</td>
                                                    <td>{{$products[$i]->last_name}}</td>
                                                    <td>
                                                        <button type="button" class="btn btn-info btn-xs"
                                                                data-toggle="modal" data-target="#myModal{{$i}}">
                                                            View
                                                        </button>
                                                        <div class="modal inmodal fade" id="myModal{{$i}}" tabindex="-1"
                                                             role="dialog" aria-hidden="true">
                                                            <div class="modal-dialog modal-sm">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <button type="button" class="close"
                                                                                data-dismiss="modal"><span
                                                                                    aria-hidden="true">×</span><span
                                                                                    class="sr-only">Close</span>
                                                                        </button>
                                                                        <h4 class="modal-title pull-left">Medicine
                                                                            List</h4>
                                                                    </div>
                                                                    <div class="modal-body">
                                                                        <?php
                                                                        $arr = explode(',', $productArray[$i]);
                                                                        ?>
                                                                        @foreach($arr as $item)
                                                                            <div class="row">

                                                                                <hr class="hr-line-dashed">
                                                                                <h2>{{$item}}</h2>

                                                                                <!-- <h2>Crocine</h2>
                                                                                 <h2>D-Cold</h2>
                                                                                 <hr class="hr-line-dashed">
                                                                                 <h2>Cough Syrup</h2> -->
                                                                            </div>
                                                                        @endforeach
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endfor
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>First Name</th>
                                                <th>Last Name</th>
                                                <th>Medicine List</th>
                                            </tr>
                                            </tfoot>
                                        </table>
                                    </div>

                                </div>
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

<!-- Input Mask-->
<script src="js/plugins/jasny/jasny-bootstrap.min.js"></script>

<!-- Page-Level Scripts -->
<script>
    $(document).ready(function () {
        $('.dataTables-example').DataTable({
            pageLength: 1000,
            responsive: true,
            dom: '<"html5buttons"B>lTfgitp',
            buttons: [
                {extend: 'copy'},
                {extend: 'csv'},
                {extend: 'excel', title: 'ExampleFile'},
                {extend: 'pdf', title: 'ExampleFile'},

                {
                    extend: 'print',
                    customize: function (win) {
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

<script type="text/javascript">
    $(function () {
        $(document).on("keypress", function (e) {
            if (e.keyCode == 13) {

                var div = $("<div/>");
                div.html(GetDynamicTextBox(""));
                $("#TextBoxContainer").append(div);
                $('.chosen-select').chosen({width: "20%"});
                $('.text-primary').focus();
            }

        });
        $("#btnAdd").on("click", function () {
            var div = $("<div />");
            div.html(GetDynamicTextBox(""));
            $("#TextBoxContainer").append(div);
            $('.chosen-select').chosen({width: "50%"});
            $('.text-primary').focus();
        });
        $("#btnGet").bind("click", function () {
            var values = "";
            $("input[name=DynamicTextBox]").each(function () {
                values += $(this).val() + "\n";
            });
            $("#formdata").val(values);

        });
        $("body").on("click", ".remove", function () {
            $(this).closest("div").remove();
        });
    });
    function GetDynamicTextBox(value) {
        return '<input type="text" name="DynamicTextBox" class ="input-group-sm" required/> &nbsp;' + '<button type="button" class="btn btn-danger btn-xs remove">Remove</button>' + '<hr class="hr-line-dashed">'

    }
</script>

</body>

</html>
