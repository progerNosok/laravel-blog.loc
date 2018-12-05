@extends('pages.layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="leave-comment mr0"><!--leave comment-->
                        @include('admin.errors')
                        @if(session('status'))
                            <div class="alert alert-danger">
                            {{session('status')}}
                            </div>
                            @endif
                        <h3 class="text-uppercase">Вход</h3>
                        <br>
                        {!! Form::open() !!}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="Email" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="password">
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn send-btn">Войти</button>

                        {!! Form::close() !!}
                    </div><!--end leave comment-->
                </div>

                    @include('pages.sidebar')
    @endsection