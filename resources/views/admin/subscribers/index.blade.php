@extends('admin.layout')

@section('content')
    <!-- Content Wrapper. Contains page content -->
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
                    <div class="form-group">
                        <a href="{{route('subscribers.add')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Email потвержден</th>
                            <th>Время подписки</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($subs as $sub)
                        <tr>
                            <td>{{$sub->id}}</td>
                            <td>{{$sub->email}}
                            </td>
                            <td>
                                {{$sub->token ? 'Нет' : 'Да'}}
                            </td>
                            <td>{{$sub->created_at}}</td>
                            {!! Form::open(['route' => ['subscribers.delete', $sub->id], 'method' => 'DELETE']) !!}
                            <td><button class="fa fa-remove"
                                onclick="confirm('Ты уверен что хочешь отменить подписку этого юзера?')"></button></td>
                            {!! Form::close() !!}
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
    <!-- /.content-wrapper -->
    @endsection