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

</head>

<body class="white-bg">
<div class="wrapper wrapper-content p-xl">
    <div class="ibox-content p-xl" id="printableArea">
        <div class="row">
            <div class="col-sm-6">
                <h5>From:</h5>
                <address>
                    <h1><strong>SHIV MEDICAL & GENERAL STORE</strong></h1><br>
                    Gala No. 4, Masoli Naka, Dahanu Road<br>
                    Dist. Palghar - 401602, Maharashtra<br>
                    <abbr title="Phone">P:</abbr> 9765393738, 7218079687
                </address>
            </div>

            <div class="col-sm-6 text-right">
                <h4>Invoice No.</h4>
                <h4 class="text-navy">{{$number}}</h4>
                <span>Patient Name & Address:</span>
                <address>
                    <strong>{{$patient_name}}</strong><br>
                    <strong>{{$patient_address}}</strong><br>
                </address>
                <span>Doctor Name & Address:</span>
                <address>
                    <strong>{{$doctor_name}}</strong><br>
                    <strong>{{$doctor_address}}</strong><br>
                </address>
                <p>
                    <span><strong>Invoice Date:</strong> {{\Carbon\Carbon::today()->format('d-m-Y')}}</span><br/>

                </p>
            </div>
        </div>

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
                @for($i=0;$i<count($products);$i++)
                <tr>
                    <td><div><strong>{{$products[$i]->product_name}}</strong></div>
                    <td>{{$quantityarray[$i]}}</td>
                    <td>{{$products[$i]->product_company}}</td>
                    <td>{{$products[$i]->batch}}</td>
                    <td>{{$products[$i]->exp_date}}</td>
                    <td>{{$priceArray[$i]}}</td>
                </tr>
                @endfor

                </tbody>
            </table>
        </div><!-- /table-responsive -->

        <table class="table invoice-total">
            <tbody>
            <tr>
                <td><strong>TOTAL :</strong></td>
                <td>{{$totalprice}}</td>
            </tr>
            <tr>
                <td><strong>Signature:</strong></td>
                <td>____________________</td>
            </tr>
            </tbody>
        </table>


    </div>

</div>
<div>
    <div class="col-lg-4"></div>
    <div class="col-lg-4">
        <a class="btn btn-primary" id="remove" onclick="startprint()">Print </a>
        <a class="btn btn-primary" href="{{route('getbill')}}">Back</a>
    </div>
    <div class="col-lg-4"></div>

</div>

<!-- Mainly scripts -->
<script src="js/jquery-3.1.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/plugins/metisMenu/jquery.metisMenu.js"></script>

<!-- Custom and plugin javascript -->
<script src="js/inspinia.js"></script>

<script type="text/javascript">
  function startprint(){
      var printContents = document.getElementById('printableArea').innerHTML;
      var originalContents = document.body.innerHTML;

      document.body.innerHTML = printContents;

      window.print();

      document.body.innerHTML = originalContents;
      a.setAttribute('href',"{{route('data')}}");
  }
</script>

</body>

</html>
