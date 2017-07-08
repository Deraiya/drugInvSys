@extends('layouts.app')

@section('content')

    <div class="middle-box text-center loginscreen animated fadeInDown no-magin">
        <div>
            <div>

              <h1 class="logo-name no-margin" style="margin-top: 0px;">Shiv</h1>

            </div>
            <h3>Welcome </h3>
            <p>Login in. To see it in action.</p>
            <form class="m-t" role="form" method="post" action="{{ route('login') }}">

                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input type="email" id="email" class="form-control" placeholder="Username" required="" name="email" value="{{ old('email') }}" required autofocus/>
                    @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                </div>
                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                    <input type="password" id="password" class="form-control" placeholder="Password" required="" name="password" required>
                    @if ($errors->has('password'))
                                   <span class="help-block">
                                       <strong>{{ $errors->first('password') }}</strong>
                                   </span>
                               @endif
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Login</button>
                {{ csrf_field() }}
            </form>
            <p class="m-t"> <small>Crafted at <b>Déraiya Consultancy Services</b></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>


@endsection
