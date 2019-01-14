@extends('layouts.app')

@section('content')
    <div class="container">
         <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                <!-- <div class="panel-heading">
                    New Task
                </div> -->

                <!-- <div class="panel-body"> -->
                    <!-- Отображение ошибок ввода  Validation Errors -->
                    <!-- @include('errors') -->

                    <!-- new task  -->
                    <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                        @csrf

                        <!-- Task name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Задача</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- Кнопка добавления задачи  -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Добавить задачу
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Текущие задачи -->
            @if (count($tasks) > 0)
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Текущая задача
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">

                            <!-- <thead>
                                <th>Задача</th>                                
                            </thead>
                            -->
                            <tbody>
                                @foreach ($tasks as $task)
                                    <tr>
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>
 
                                        <!-- Task Delete Button -->
                                        <td>
                                            <form action="{{ url('task/'.$task->id) }}" method="POST">
                                            <!-- <form action="/task/{{ $task->id }}" method="POST"> -->  
                                                @csrf
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>Удалить
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection