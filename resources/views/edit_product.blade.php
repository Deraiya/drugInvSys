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
        <div class="container" style="width: 100%">
            <div class="ibox-content m-b-sm border-bottom">.

                <div class="row">
                    <div class="ibox-title" style="border: none">
                        <h2> Update Inventory</h2>
                        <hr>
                    </div>
                    @foreach($result as $d)
                        <form action="{{route('updateproduct')}}" method="post">
                            <input type="hidden" name="product_id" value="{{$id}}"/>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="control-label" for="product_name">Product Name</label>
                                    <input type="text" id="" name="product_name" value="{{$d->product_name}}"
                                           placeholder=" " autofocus class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="control-label" for="price">Product Company</label>
                                    <input type="text" id="" name="product_company" value="{{$d->product_company}}"
                                           placeholder="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group">
                                    <label class="control-label" for="quantity">Quantity</label>
                                    <input type="text" id="" name="quantity" value="{{$d->quantity}}" placeholder=""
                                           class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group">
                                    <label class="control-label" for="quantity">Price</label>
                                    <input type="text" id="" name="price" value="{{$d->price}}" placeholder=""
                                           class="form-control" required>
                                </div>
                            </div>

                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="control-label" for="quantity">Mfg. Date</label>
                                    <div>
                                        <input type="text" class="form-control" data-mask="9999/99/99"
                                               value="{{$d->mfg_date}}" placeholder="" name="mfg_date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="control-label" for="quantity">Exp. Date</label>
                                    <div>
                                        <input type="text" class="form-control" data-mask="9999/99/99" placeholder=""
                                               value="{{$d->exp_date}}" name="efg_date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="control-label" for="quantity">Arrival Date</label>
                                    <div>
                                        <input type="text" class="form-control" data-mask="9999/99/99"
                                               value="{{$d->arrival_date}}" placeholder="" name="arrival_date" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <label class="control-label" for="quantity">Distributor</label>
                                    <input type="text" id="" name="distributor" value="{{$d->distributor}}"
                                           placeholder="" class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-1">
                                <div class="form-group">
                                    <label class="control-label" for="quantity">Batch #</label>
                                    <input type="text" id="" name="batch" value="{{$d->batch}}" placeholder=""
                                           class="form-control" required>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <button type="button" class="btn btn-info inline" data-toggle="modal"
                                            data-target="#opencapture" onclick="startCamera2()">Capture Image
                                    </button>
                                    <div class="inline"  id="imageview">

                                    </div>
                                    @if($d->img != null)
                                        <img src="{{asset('images/'.$d->img.'.png')}}">
                                    @endif
                                    <input type="hidden" id="status" name="hidden" value="">
                                    <input type="hidden" id="hidden_data" name="hidden_data" value="">
                                </div>
                            </div>
                            <div class="col-lg-2">
                                <div class="form-group">
                                    <button type="submit" class="btn btn-danger " onclick="remove()">Remove Image
                                    </button>
                                    <hr class="hr-line-dashed">
                                    <button type="submit" class="btn btn-primary ">Update</button>
                                </div>
                            </div>
                            {{ csrf_field() }}
                        </form>

                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function remove() {
        var hidden = document.getElementById('status');
        hidden.setAttribute("value", "remove");
    }
</script>
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

<div class="modal inmodal fade" id="opencapture" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span
                            class="sr-only">Close</span></button>
                <h4 class="modal-title pull-left">Edit Details</h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <img id="frame">

                    <button id="capture">Capture</button>
                    <select id="videoselect">
                    </select>
                    <video id="player" autoplay></video>


                    <canvas id="snapshot" width=320 height=240></canvas>

                    <script>
                        var videoTracks;
                        function startCamera2() {
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
                        function startCamera() {
                            var player = document.getElementById('player');
                            var snapshotCanvas = document.getElementById('snapshot');
                            var captureButton = document.getElementById('capture');

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
</body>
</html>




