@extends('layouts.app')

@section('content')
    <div class="container">
         <div class="col-sm-offset-2 col-sm-8">
            <div class="panel panel-default">
                
               <div class="panel-body">
                    <!-- validation errors -->
                    @include('errors')

                    <!--new task-->
                    <form action="{{ url('task')}}" method="POST" class="form-horizontal">
                        @csrf

                        <!-- Task name -->
                        <div class="form-group">
                            <label for="task-name" class="col-sm-3 control-label">Задача</label>

                            <div class="col-sm-6">
                                <input type="text" name="name" id="task-name" class="form-control" value="{{ old('task') }}">
                            </div>
                        </div>

                        <!-- button "add task" -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-secondary">
                                    <i class="fa fa-btn fa-plus"></i> Добавить задачу
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Current task -->
            @if (count($tasks) > 0)            
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Текущие задачи
                    </div>

                    <div class="panel-body">
                        <table class="table table-striped task-table">

                            <tbody>
                                @foreach ($tasks as $task)
                                    @if ($task->status !== 'completed')
                                    <tr>
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $task->status }}</div>
                                        </td>
                                        <td>
                                            
                                            <form action="/task/{{ $task->id }}" method="POST">  
                                                @csrf
                                                
                                                <!-- button "Completed" -->
                                                <button type="submit" class="btn btn-primary">
                                                    <i class="fa fa-btn fa-check-circle"></i>  Исполнено
                                                </button>
                                            </form>
                                        </td>

                                            <!-- button "Delete" -->
                                        <td>
                                            
                                            <form action="/task/{{ $task->id }}" method="POST">  
                                                @csrf
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>  Удалить
                                                </button>
                                            </form>
                                        </td>

                                    </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                </div>
                
            @endif

            <!-- Completed task -->
                <div class="panel panel-default  toggle-btn">
                    <div class="panel-heading">
                        <button class="btn btn-secondary  compl-task-btn"> Выполненные задачи : </button>
                    </div>
                    
                    <div class="panel-body">
                        <table class="table table-striped task-table">
                            <tbody> 
                            @foreach ($tasks as $task)
                            @if ($task->status === 'completed')                               
                                @if ($task->status !== 'new')
                                    <tr>
                                        <td class="table-text">
                                            <div>{{ $task->name }}</div>
                                        </td>
                                        <td class="table-text">
                                            <div>{{ $task->status }}</div>
                                        </td>

                                        <td>
                                          <!-- button "Delete" -->  
                                            <form action="/task/{{ $task->id }}" method="POST">  
                                                @csrf
                                                {{ method_field('DELETE') }}

                                                <button type="submit" class="btn btn-danger">
                                                    <i class="fa fa-btn fa-trash"></i>  Удалить
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endif
                                @endif
                                @endforeach 
                            </tbody>
                        </table>
                        
                    </div>
                </div>
                        
        </div>
    </div>
@endsection