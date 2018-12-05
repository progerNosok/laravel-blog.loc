@extends('pages.layout')

@section('content')
    <div class="main-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">

                    <div class="leave-comment mr0"><!--leave comment-->
                        @include('admin.errors')
                        <h3 class="text-uppercase">Обо мне</h3>
                        <br>
                        <img src="/images/abc.jpg" alt="" class="profile-image">
                        {!! Form::open() !!}
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="status" name="status"
                                           placeholder="Статус" value="{{\Illuminate\Support\Facades\Auth::user()->fullInfo->status}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="country" name="country"
                                           placeholder="Страна" value="{{\Illuminate\Support\Facades\Auth::user()->fullInfo->country}}">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="city" name="city"
                                           placeholder="Город" value="{{\Illuminate\Support\Facades\Auth::user()->fullInfo->city}}">
                                </div>
                            </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="about" name="about"
                                       placeholder="Расскажите о себе" value="{{\Illuminate\Support\Facades\Auth::user()->fullInfo->about}}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-12">
                                <input type="text" class="form-control" id="hobbies" name="hobbies"
                                       placeholder="Расскажите о ваших увлечениях" value="{{\Illuminate\Support\Facades\Auth::user()->fullInfo->hobbies}}">
                            </div>
                        </div>
                            <button type="submit" name="submit" class="btn send-btn">Сохранить</button>

                        {!! Form::close() !!}
                    </div><!--end leave comment-->
                </div>
                @include('pages.sidebar')
        </div>
    </div>

    </div>


@endsection