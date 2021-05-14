@extends('layouts.app')

@section('content')
<style>
    .title{
        color: green;
        font-size: 20px;
        font-family: Orbitron; 
    }
    .clock {
        /*position: absolute;*/
        top: 50%;
        left: 63%;
        /*transform: translateX(-50%) translateY(-50%);*/
        color: green;
        font-size: 20px;
        font-family: Orbitron;
        /*letter-spacing: 3px;*/ 



    }
</style>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="email"
                                   class="col-md-4 col-form-label text-md-right">{{ __('E Code') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password"
                                   class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror" name="password"
                                       required autocomplete="current-password">

                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember"
                                           {{ old('remember') ? 'checked' : '' }}>

                                           <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
                function showTime() { var date = new Date(); var h = date.getHours(); // 0 - 23
                var m = date.getMinutes(); // 0 - 59
                var s = date.getSeconds(); // 0 - 59
                var d=date.getDate();
                var m=date.getMonth()+1;
                 var y=date.getFullYear();
                var session = "AM"; if (h == 0) { h = 12; } if (h > 12) { h = h - 12; session = "PM"; } h = (h < 10) ? "0" + h : h; m = (m < 10) ? "0" + m : m;
                s = (s < 10) ? "0" + s : s;
        var time =  d+"-"+m+"-"+y+" "+h + ":" + m + ":" + s + " " + session;<!--document.getElementById("MyClockDisplay").innerText = time;-->
                document.getElementById("MyClockDisplay").innerText = time;
                document.getElementById("MyClockDisplay").textContent =time;
        
        setTimeout(showTime                , 1000);

       }                

                showTime();

                setTimeout(function () {
                                                                                                                                                                   $(".alert-success").fadeOut("slow")
                                                                                                                                                               }, 5000);


                                                </script>
@endsection
