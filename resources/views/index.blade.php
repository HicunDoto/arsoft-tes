@extends('layout.login')

@section('title','Login')

@section('container')
    <div class="container">
        <div class="card card-container">
        @if (session('status'))
          <div class="alert alert-danger">
              {{ session('status') }}
          </div>
         @endif
            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
            <p id="profile-name" class="profile-name-card">Log-In</p>
            <form class="form-signin" method="post" action="{{url('/')}}">
              {{csrf_field()}}
                <span id="reauth-email" class="reauth-email"></span>
                <input type="email" value="{{ old('email') }}" id="inputEmail" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email address" autofocus>
                @error('email')
    	            <div class="alert alert-danger">{{ $message }}</div>
	            @enderror
                <input type="password" value="{{old('password')}}" id="inputPassword" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" >
                @error('password')
    	            <div class="alert alert-danger">{{ $message }}</div>
	            @enderror
                <button name="masuk" class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Masuk</button>
            </form><!-- /form -->
            <p>hicun@gmail.com:12345
            </p>
            <div style="text-align: center;">Created By <b>HicunDoto<b></div>
        </div><!-- /card-container -->
    </div><!-- /container -->
@endsection
