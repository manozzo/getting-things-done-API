<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use App\User;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserApiController extends Controller
{
    public function list(Request $request) {

        $userId = $request->get('id');
        $nameComplete = $request->get('name_complete');
        $namePartial = $request->get('name_partial');
        $createDateAbove = $request->get('created_date_above');
        $createDateBelow = $request->get('created_date_below');

        $users = User::query();

        if ($userId) {
            $users = $users->orWhere('id', $userId);
        }

        if ($nameComplete) {
            $users = $users->orWhere('name', $nameComplete);
        }

        if ($namePartial) {
            $users = $users->orWhere('name', 'like', '%' .$namePartial . '%');
        }

        if ($createDateAbove) {
            $users = $users->where('created_at', '>' ,$createDateAbove);
        }

        if ($createDateBelow) {
            $users = $users->where('created_at', '<' ,$createDateBelow);
        }

        $users = $users->get();

        return response()->json($users);
    }

    public function create(Request $request) {
        
        try {
            $this->validate($request, [
                'name' => 'required|string:250',
                'email' => 'required|string:250|unique:users',
                'password' => 'required|string:250',

            ]);

            $newUser = $request->post();
            $newUser['password'] = Hash::make($newUser['password']);

        
            $user = User::create($newUser);

        } catch (Exception $e){
            return response()->json($e->getMessage(), Response::HTTP_NOT_ACCEPTABLE);
        }

        return response()->json('Mais um usuário feliz!');

    }

    public function delete(int $userId) {
        

        $user = User::where('id', $userId)->first();

        if(is_null($user)) {
            return response()->json('Nenhum usuário encontrado com esse ID', Response::HTTP_NOT_ACCEPTABLE);
        }


        $userHasTasks = Task::where('user_id', $userId)->first();
        if($userHasTasks) {
            return response()->json('Esse usuário possui uma task e não pode ser deletado', Response::HTTP_NOT_ACCEPTABLE);
        }
        
        $user->delete();
        $user->save();

        return response()->json('Usuário excluído com sucesso!!!');

    }
}
