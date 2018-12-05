@extends('pages.layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="leave-comment mr0"><!--leave comment-->
                            @include('admin.errors')
                        <h3 class="text-uppercase">Регистрация</h3>
                        <br>
                        {!! Form::open(['files' => true]) !!}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="name" name="name"
                                           placeholder="Имя" value="{{old('name')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="email" class="form-control" id="email" name="email"
                                           placeholder="Email" value="{{old('email')}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password" name="password"
                                           placeholder="Пароль">
                                </div>
                                <div class="col-md-12">
                                    <input type="password" class="form-control" id="password" name="password_confirmation"
                                           placeholder="Пароль еще раз">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputFile">Лицевая картинка</label>
                                    <input type="file" id="exampleInputFile" name="image">

                                    <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                                </div>
                            </div>
                            <button type="submit" name="submit" class="btn send-btn">Зарегестрироваться</button>

                        {!! Form::close() !!}
                    </div><!--end leave comment-->
                </div>
    @include('pages.sidebar')

    @endsection