@extends('layouts.app')

@section('content')
   <form action="{{ url('tasks/save') }}" method='POST' > 
        @csrf
        <div class='row'>
            <div class='col-2'></div>
            <div class='col-8 col-offset-2'>
                <div class='card'>
                    <div class='card-header'>

                    </div>
                    <div class='card-body'>
                        <div class='form-group'>
                            <label> Descrição </label>
                            <textarea name='description' class='form-control w-100'> {{ old('description') }} </textarea>
                        </div>
                        @error('description')
                            <div class='alert alert-danger'> {{ $message }} </div>
                        @enderror

                        <div class='form-group'>
                            <label> Começa em </label>
                            <input type='datetime-local' name='task_start' class='form-control' value="{{ old('task_start') }}"></input>
                        </div>
                        @error('task_start')
                            <div class='alert alert-danger'> {{ $message }} </div>
                        @enderror

                        <div class='form-group'> 
                            <label> Termina em </label>
                            <input type='datetime-local' name='task_end' class='form-control' value="{{ old('task_end') }}"></input>
                        </div>
                        @error('task_end')
                            <div class='alert alert-danger'> {{ $message }} </div>
                        @enderror
                    </div>
                    <div class='card-footer'>
                        <button type='submit' class='btn btn-lg btn-success'> Cadastrar Tarefa </button>
                    </div>
                </div>
            </div>
        </div>
    </form>
@endsection