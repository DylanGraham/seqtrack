@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-offset-1">

                <div>
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <img class="center-block" src="/images/logo.png" alt="SeqTrack Logo"
                         style="width:60%;height:60%;padding:30px;">
                </div>
                <div class="col-md-offset-2">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/auth/login') }}">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">

                        <!--						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail Address</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div> -->

                        <div class="form-group ">

                            <div class="col-md-3">
                                {!! Form::label('user_id', 'User ID') !!}
                            </div>

                            <div class="col-md-6">
                                <input type="user_id" class="form-control" name="user_id" value="{{ old('user_id') }}">
                            </div>
                            <br/>
                            <br/>

                            <div class="col-md-3">
                                {!! Form::label('password', 'Password') !!}
                            </div>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password">
                            </div>

                            <div class="col-md-6 col-md-offset-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                    <a class="" href="{{ url('/password/email') }}">Forgot Your Password?</a>
                                </div>

                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">Login</button>


                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
