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
                        <a href="create.html" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Пост</th>
                            <th>Юзер</th>
                            <th>Текст</th>
                            <th>Статус</th>
                            <th>Добавлен</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($comments as $comment)
                        <tr>
                            <td>{{$comment->id}}</td>
                            <td>{{$comment->post->title}}</td>
                            <td>{{$comment->user->name}}({{$comment->user->email}})</td>
                            <td>{!! $comment->text !!}
                            </td>
                            <td>{{$comment->status ? 'Разрешен' : 'Не разрешен'}}</td>
                            <td>{{$comment->created_at}}</td>
                            <td>
                                @if($comment->status)
                                <a href="{{route('comment.disallow', $comment->id)}}" class="fa fa-lock"></a>
                                @else
                                    <a href="{{route('comment.allow', $comment->id)}}" class="fa fa-thumbs-o-up"></a>
                                @endif
                                {!! Form::open(['route' => ['comment.delete', $comment->id], 'method' => 'delete']) !!}
                                    <button onclick="confirm('Уверен что хочешь удалить комментарий?')" class="fa fa-remove"> </button></td>
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