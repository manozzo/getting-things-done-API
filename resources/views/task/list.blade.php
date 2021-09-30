@extends('layouts.app')

@section('content')
    <div class='row'>
    @if(\Session::has('success'))
        <div class='alert alert-success'> {!! \Session::get('success') !!} </div>
    @endif
        <div class='card'>
            <div class='card-header'>
                <h1> Lista de tarefas </h1>
            </div>
            
            <div class='card-body'>
                @if(count($tasks) > 0)
                    <table>
                        <thead></thead>
                            <tr>
                                <th> ID </th>
                                <th> Usuário </th>
                                <th> Descrição </th>
                                <th> Completada </th>
                                <th> Começada em </th>
                                <th> Terminada em </th>
                                <th> Criada em </th>
                                <th> Atualizada em </th>
                                <th> Opções </th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($tasks as $task)
                            <tr>
                                <td> {{ $task->id }} </td>
                                <td> {{ $task->userRelation->name }} </td>
                                <td> {{ $task->description }} </td>
                                <td> 
                                    @if($task->is_complete == 0) 
                                        <div class='btn btn-danger w-100'> 
                                            NOK 
                                        </div> 
                                    @else
                                        <div class='btn btn-success w-100'> 
                                            OK 
                                        </div>
                                    @endif     
                                </td>
                                <td> {{ $task->task_start }} </td>
                                <td> {{ $task->task_end }} </td>
                                <td> {{ $task->created_at->format('d/m/Y h:i') }} </td>
                                <td> {{ $task->updated_at->format('d/m/Y h:i') }} </td>
                                <td>
                                    @if
                                    @else
                                    @endif
                                </td>
                            </tr>
                        @endforeach    
                        </tbody>
                    </table>
                @else
                    <div class='alert alert-danger'> Não existem usuários cadastrados </div>
                @endif
            </div>
            <div class='card-footer'></div>
        </div>
    </div>
@endsection