@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Информация о пользователе
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Информация о пользователе</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Имя</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$user->name}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input type="email" class="form-control" id="exampleInputEmail1" placeholder="" value="{{$user->email}}" readonly>
                        </div>
                        <div class="form-group">
                            Аватар
                            <img src="{{$user->getImage()}}" alt="" width="200" class="img-responsive">
                        </div>
                        <div class="form-group">
                            <label for="status">Статус</label>
                            <input type="text" class="form-control" id="status" placeholder="" value="{{$user->fullInfo->status}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="country">Страна</label>
                            <input type="text" class="form-control" id="country" placeholder="" value="{{$user->fullInfo->country}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="city">Город</label>
                            <input type="text" class="form-control" id="city" placeholder="" value="{{$user->fullInfo->city}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="about">О себе</label>
                            <input type="text" class="form-control" id="about" placeholder="" value="{{$user->fullInfo->about}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="hobbies">Увлечения</label>
                            <input type="text" class="form-control" id="hobbies" placeholder="" value="{{$user->fullInfo->hobbies}}" readonly>
                        </div>
                        <div class="form-group">
                            <label for="created_at">Дата создания аккаунта</label>
                            <input type="text" class="form-control" id="created_at" placeholder="" value="{{$user->created_at}}" readonly>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @endsection