@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Blank page
                <small>it all starts here</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг сущности</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Имя</th>
                            <th>E-mail</th>
                            <th>E-mail потвержден</th>
                            <th>Статус</th>
                            <th>Привелегии</th>
                            <th>Дата регистрации</th>
                            <th>Аватар</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->token ? 'Нет' : 'Да'}}</td>
                            <td>{{$user->status ? 'Забанен' : 'Активен'}}</td>
                            <td>{{$user->isAdmin() ? 'Админ' : 'Обычный пользователь'}}</td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <img src="{{$user->getImage()}}" alt="" class="img-responsive" width="100" height="100">
                            </td>
                            @if(!$user->status)
                                {!! Form::open(['route' => ['users.ban', $user->id] ]) !!}
                                <td><button class="fa fa-lock" onclick="confirm('Ты уверен что хочешь забанить этого пользователя?')"></button>
                                {!! Form::close() !!}

                                @else
                                {!! Form::open(['route' => ['users.unban', $user->id] ]) !!}
                                <td><button class="fa fa-thumbs-o-up" onclick="confirm('Ты уверен что хочешь разбанить этого пользователя?')"></button>
                                    {!! Form::close() !!}
                                    @endif
                                <a href="{{route('users.info', $user->id)}}">Подробнее</a>
                                    {!! Form::open(['route' => ['users.delete', $user->id], 'method' => 'DELETE']) !!}
                                    <button onclick="confirm('Уверен что хочешь полностью удалить этого пользователя?')" class="fa fa-remove"></button>
                                </td>
                        </tr>
                        @endforeach
                        </tfoot>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
    @endsection