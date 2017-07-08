<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Shiv Medical</title>
 <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <link href="{{asset('css/plugins/dataTables/datatables.min.css')}}" rel="stylesheet">
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
                @if (count($errors) > 0)
          <div class="alert alert-danger">
              <ul>
                  @foreach ($errors->all() as $error)
                      <li>{{ $error }}</li>
                  @endforeach
              </ul>
          </div>
      @endif
            <div class="container" style="width: 100%">
                <div class="ibox-content m-b-sm border-bottom">
                    <div class="row">
                        <div class="ibox-title" style="border: none">
                            <h2>  Add Inventory</h2>
                            <hr>
                        </div>
                         <form  action="{{route('product_post')}}" method="post">


                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="control-label" for="product_name">Product Name</label>
                                <input type="text" id="" name="product_name" value="" placeholder=" "  autofocus class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="control-label" for="price">Product Company</label>
                                <input type="text" id="" name="product_company" value="" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label class="control-label" for="quantity">Quantity</label>
                                <input type="text" id="" name="quantity" value="" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label class="control-label" for="quantity">Price</label>
                                <input type="text" id="" name="price" value="" placeholder="" class="form-control">
                            </div>
                        </div>

                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="control-label" for="quantity">Mfg. Date</label>
                                <div>
                                    <input type="text" class="form-control" data-mask="9999/99/99" placeholder="" name="mfg_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="control-label" for="quantity">Exp. Date</label>
                                <div>
                                    <input type="text" class="form-control" data-mask="9999/99/99" placeholder="" name="exp_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="control-label" for="quantity">Arrival Date</label>
                                <div>
                                    <input type="text" class="form-control" data-mask="9999/99/99" placeholder="" name="arrival_date">
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <label class="control-label" for="quantity">Distributor</label>
                                <input type="text" id="" name="distributor" value="" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-1">
                            <div class="form-group">
                                <label class="control-label" for="quantity">Batch #</label>
                                <input type="text" id="" name="batch" value="" placeholder="" class="form-control">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <button type="button" class="btn btn-info inline " data-toggle="modal" data-target="#opencapture" onclick="camStart2()">Capture Image</button>
                                <div class="inline" id="imageview">
                                </div>
                                <input name ="hidden" type="hidden" id="hidden_data" value="">
                            </div>

                        </div>
                        <div class="col-lg-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-danger ">Submit</button>
                            </div>
                        </div>

                         {{ csrf_field() }}
                        </form>


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
                                        <table class="table table-striped table-bordered table-hover dataTables-example" >
                                            <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Prod Name</th>
                                                <th>Prod Company</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Mfg. Date</th>
                                                <th>Exp. Date</th>
                                                <th>Date Of Arrival</th>
                                                <th>Distributor</th>
                                                <th>Batch #</th>
                                                <th>Image</th>
                                                <th>Edit</th>
                                                <th>Delete</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                               @foreach ($products as $product)
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
                                                <td><button type="button" class="btn btn-info btn-xs" data-toggle="modal" data-target="#showImage" onclick="viewImage({{$product->img}})">View Image</button>
                                                    <input name ="hidden" type="hidden" id="hidden_data" value="{{$product->img}}">
                                                </td>
                                                <td>
                                                    <a href='{{url("edit/$product->id")}}' button type="button" class="btn btn-primary btn-xs" data-toggle="modal" >
                                                        Edit
                                                    </a>

                                                </td>
                                                <td><a href ='{{url("delete/product/$product->id") }}' button type="button" class="btn btn-danger btn-xs">Delete</a></td>
                                            </tr>

                                            @endforeach
                                            </tbody>
                                            <tfoot>
                                            <tr>
                                                <th>#</th>
                                                <th>Prod Name</th>
                                                <th>Prod Company</th>
                                                <th>Qty</th>
                                                <th>Price</th>
                                                <th>Mfg. Date</th>
                                                <th>Exp. Date</th>
                                                <th>Date Of Arrival</th>
                                                <th>Distributor</th>
                                                <th>Batch #</th>
                                                <th>Image</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
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
<script src="{{asset('js/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
<script src="{{asset('js/plugins/metisMenu/jquery.metisMenu.js')}}"></script>
<script src="{{asset('js/plugins/slimscroll/jquery.slimscroll.min.js')}}"></script>



<!-- Flot -->
<script src="{{asset('js/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.tooltip.min.js')}}"></script>
<script src="{{asset('js/plugins/flot/jquery.flot.resize.js')}}"></script>

<!-- ChartJS-->
<script src="{{asset('js/plugins/chartJs/Chart.min.js')}}"></script>

<!-- Peity -->
<script src="{{asset('js/plugins/peity/jquery.peity.min.js')}}"></script>
<!-- Peity demo -->
<script src="{{asset('js/demo/peity-demo.js')}}"></script>


<!-- Chosen -->
<script src="{{asset('js/plugins/chosen/chosen.jquery.js')}}"></script>

<script src="{{asset('js/plugins/dataTables/datatables.min.js')}}"></script>

<!-- Input Mask-->
<script src="{{asset('js/plugins/jasny/jasny-bootstrap.min.js')}}"></script>

<script src="{{asset('js/ImageCapture.js')}}"></script>
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
    function viewImage(no) {
        var imagepath = "images/"+no+".png";
        var modal = document.getElementById('imagehere');
        var img = document.createElement("IMG");
        if(modal.hasChildNodes()) {
            modal.removeChild(modal.childNodes[0]);
        }

        img.setAttribute('src', imagepath);
        modal.appendChild(img);
    };


</script>
<div class="modal inmodal fade" id="opencapture" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">

            <div class="modal-body">
                <div class="row">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <img id="frame">
                    <button id="capture" class="m-b-md btn-default">Capture</button>
                    <select id="videoselect">
                    </select>
                    <video id="player" autoplay></video>


                    <canvas id="snapshot" width=320 height=240></canvas>

                    <script>
                        var  modalIsOpen = null ;
                        var videoTracks = null;
                        function camStart2() {
                            var player = document.getElementById('player');
                            var snapshotCanvas = document.getElementById('snapshot');
                            var captureButton = document.getElementById('capture');
                            var modal = document.getElementById("camera_model");
                            startProcess();
                            captureButton.addEventListener('click', function () {
                                var context = snapshot.getContext('2d');
                                // Draw the video frame to the canvas.
                                context.drawImage(player, 0, 0, snapshotCanvas.width,
                                    snapshotCanvas.height);
                                var canvas = document.getElementById("snapshot");
                                var dataURL = canvas.toDataURL("image/png");
                                document.getElementById('hidden_data').value = dataURL;

                                var parent = document.getElementById("imageview");
                                if(parent.hasChildNodes()){
                                    parent.removeChild(parent.childNodes[0]);
                                }
                                var image = document.createElement("IMG");
                                image.setAttribute("src", dataURL);
                                image.setAttribute("width", 133);
                                image.setAttribute("height", 100);
                                parent.appendChild(image);
                                $('.modal').modal('hide');
                                setTimeout(closeCamera,100);
                            });
                        }
                        $('body').click(function(){

                            if(!($('.modal').data('bs.modal') || {}).isShown) {
                                closeCamera();
                            }

                        });
                        function closeCamera() {
                            if (window.stream) {
                                window.stream.getTracks().forEach(function(track) {
                                    track.stop();
                                });
                            }

                            if (videoTracks !== null) {
                                videoTracks.forEach(function (track) {
                                    track.stop();
                                });
                                videoTracks=null;
                            }
                        }
                        function cameraStart() {
                            var player = document.getElementById('player');
                            var snapshotCanvas = document.getElementById('snapshot');
                            var captureButton = document.getElementById('capture');
                            var modal = document.getElementById("camera_model");

                            var handleSuccess = function (stream) {
                                // Attach the video stream to the video element and autoplay.
                                player.srcObject = stream;
                                videoTracks = stream.getVideoTracks();
                            };
                            captureButton.addEventListener('click', function () {
                                var context = snapshot.getContext('2d');
                                // Draw the video frame to the canvas.
                                context.drawImage(player, 0, 0, snapshotCanvas.width,
                                    snapshotCanvas.height);
                                var canvas = document.getElementById("snapshot");
                                var dataURL = canvas.toDataURL("image/png");
                                document.getElementById('hidden_data').value = dataURL;

                                var parent = document.getElementById("imageview");
                                if(parent.hasChildNodes()){
                                    parent.removeChild(parent.childNodes[0]);
                                }
                                var image = document.createElement("IMG");
                                image.setAttribute("src", dataURL);
                                image.setAttribute("width", 133);
                                image.setAttribute("height", 100);
                                parent.appendChild(image);
                                $('.modal').modal('hide');
                                setTimeout(closeCamera,100);
                            });
                            navigator.mediaDevices.getUserMedia({video: true})
                                .then(handleSuccess);
                        }
                        $('body').click(function(){

                              if(!($('.modal').data('bs.modal') || {}).isShown) {
                                  closeCamera();
                                  }

                        });
                    function closeCamera() {
                        console.log(videoTracks);
                        if (videoTracks !== null) {
                            videoTracks.forEach(function (track) {
                                track.stop();
                            });
                            videoTracks=null;
                        }
                    }

                    </script>
                </div>
            </div>

                </div>
            </div>

        </div>
    </div>
</div>

<div class="modal inmodal fade" id="showImage" tabindex="-1" id="camera_model" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title pull-left">Image</h4>
            </div>
            <div class="modal-body">
                <div class="row" id = "imagehere">


                </div>
            </div>

        </div>
    </div>
</div>

</body>

</html>
