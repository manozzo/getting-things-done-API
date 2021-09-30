@extends('layouts.app')

@section('content')
    <div class='row'>
        <div class='card'>
            <div class='card-header'>
                <h1> Lista de usuarios </h1>
            </div>
            
            <div class='card-body'>
                @if(count($users) > 0)
                    <table>
                        <thead></thead>
                            <tr>
                                <th> ID </th>
                                <th> Name </th>
                                <th> Opções </th>
                            </tr>
                        </thead>

                        <tbody>
                        @foreach($users as $user)
                            <tr>
                                <td> {{ $user->id }} </td>
                                <td> {{ $user->name }} </td>
                                <td> {{ $user->email }} </td>
                                <td></td>
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