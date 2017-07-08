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


</head>

<body class="top-navigation">
<div id="wrapper">
    @if ($quantity > 0)
        <div class="alert alert-danger">
            <h3 >
                {{$product_name}} does not have quantity {{$quantity}} in System
            </h3>

        </div>
    @endif
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom white-bg">
@include('Partials.nav')
        </div>
        <form method="post" action="{{route('postbill')}}">
            {{csrf_field()}}
            <input type="hidden" name="data-holder" class="form-group" id="data-holder" value="">
            <input type="hidden" name="Qty-holder" class="form-group" id="Qty-holder" value="">
        <div class="wrapper wrapper-content">
            <div class="container">
                <div class="">
                    <div class="col-lg-8 col-lg-offset-2">
                        <div class="ibox-title">
                            <h1>Enter Name And Address</h1>
                        </div>
                        <div class="ibox-content border-bottom">
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="product_name">Patients' Name</label>
                                        <input type="text" id="product_name" name="p_name" value="" placeholder="Patients' Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="price">Patients' Address</label>
                                        <input type="text" id="price" name="p_address" value="Dahanu Road" class="form-control">
                                    </div>
                                </div>
                                <hr class="hr-line-dashed">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="product_name">Doctors' Name</label>
                                        <input type="text" id="product_name" name="d_name" value="" placeholder="Doctors' Name" class="form-control">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="control-label" for="price">Doctors' Address</label>
                                        <input type="text" id="price" name="d_address" value="Dahanu Road" class="form-control">
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-lg-offset-2">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h1>Enter Product Name </h1>
                        </div>
                        <div class="ibox-content">
                            <p>
                                <button type="button" class="btn btn-primary" id="btnAdd">Add Product</button>
                            </p>
                            <div class="form-group">
                                <div class="m-t-sm" id="TextBoxContainer"></div>
                            </div>

                            <div class="form-group">
                                <input type="submit" value="Print Invoice" class="btn btn-sm btn-info" id="btnGet" />


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
        </form>
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
<!--<script>-->
    <!--$(document).ready(function(){-->
    <!--$('.chosen-select').chosen({width: "80%"});-->
    <!--});-->
<!--</script>-->

<script type="text/javascript">
    $(function () {

        $("#btnAdd").on("click", function () {
            var div = $("<div />");
            div.html(GetDynamicTextBox(""));
            $("#TextBoxContainer").append(div);
            $('.chosen-select').chosen({width: "40%"});
        });

        $("#btnGet").bind("click", function () {
            var values = "";
            $(".chosen-select").each(function () {
                values += $(this).val() + "\n";
            });
            $("#data-holder").val(values);

            var totalqty = "";
            $(".quantity").each(function () {
                totalqty += $(this).val() + "\n";
            });
            $("#Qty-holder").val(totalqty);

        });

        $("body").on("click", ".remove", function () {
            $(this).closest("div").remove();
        });
    });


    function GetDynamicTextBox(value) {

        return '<select data-placeholder="Choose a Medicine..." class="chosen-select text-primary" id ="select" name="DynamicTextBox" style="width: 300px;" value = "' + value + '"  tabindex="2">' +
            '<option value="">Select</option>' +
                @foreach($products as $product)
                    '<option value="{{$product->id}}" > {{$product->product_name}} </option> ' +
                @endforeach
                    '</select> &nbsp;' + '<input type="text" id="QTY" class="quantity" style="width: 10%" value="1">&nbsp;' + '<button type="button" class="btn btn-danger btn-xs remove" id ="Remove"+id>Remove</button>' + '<hr class="hr-line-dashed">'
    }
</script>


</body>

</html>
