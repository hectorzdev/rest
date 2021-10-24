@extends('layouts.backend')

@section('content')
<style>
    body{
        background-image: url(<?=('frontend/images/banner.jpg?v=2') ?>);
        background-size: cover;
    }

    button[type=submit]{
        background: linear-gradient( 
270deg
 , rgba(251,240,164,1) 0%, rgba(175,137,48,1) 100%);
    border: 1px solid black;
    color: black;
    }

    .card{
        background-color: #0000007d; border: 1px solid black;
    }

    .card .card-header{
        background: linear-gradient( 
                    270deg
                     , rgba(251,240,164,1) 0%, rgba(175,137,48,1) 100%);"
    }

    .card .card-body{
        background-color: #0000007d;
    }
</style>
<div class="container" style="min-height: 800px;">
    <div class="row justify-content-center mt-5 pt-5">
        <div class="col-md-8">
            <div class="card" style=" ">
                <div class="card-header text-center" >{{ __('Login') }}</div>

                <div class="card-body py-5" style="">
                    <form id="submitForm">
                        @csrf

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right text-white">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right text-white">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('Login') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        $('#submitForm').on('submit' , function(e){
            e.preventDefault()
            var formData = $(this).serialize()
            $.post(`{{url('login' )}}` , formData , function(data){
                if(data.success){
                    window.location = `{{url('admin')}}`
                }else{
                    swal('แจ้งเตือน' , ' '+data.msg , 'error')
                }
            }, 'json')
        })

    </script>
@endsection
