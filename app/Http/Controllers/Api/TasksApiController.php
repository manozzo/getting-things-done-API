<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Task;
use App\User;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class TasksApiController extends Controller
{
    public function listById(int $taskId)
    {
        if (!$taskId) {
            return response()->json('Parâmetro ID não encontrado', Response::HTTP_NOT_ACCEPTABLE);
        }

        
        $tasks = Task::query();
        
        $tasks = $tasks->orWhere('id', $taskId);
        
        $tasks = $tasks->get();

        return response()->json($tasks);
    }

    public function listByCreatedDate($createdDate)
    {

        $tasks = Task::query();

        if ($createdDate) {
            $tasks = $tasks->whereDate('date', $createdDate);
        }

        $tasks = $tasks->get();

        return response()->json($tasks);
    }


    public function createTask(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string:30',
                'description' => 'required|string:250',
                'date' => 'required|date',
                'task_start' => 'required|date',
                'task_end' => 'required|date',
            ]);

            $newTask = $request->post();

            $task = Task::create($newTask);
            
        } catch (Exception $e) {
            return response()->json($e->getMessage(), Response::HTTP_NOT_ACCEPTABLE);
        }

        return response()->json('Mais um usuário feliz!');
    }

    public function editTask(Request $request)
    {
        try {
            $this->validate($request, [
                'title' => 'required|string:30',
                'description' => 'required|string:250',
                'date' => 'required|date',
                'task_start' => 'required|date',
                'task_end' => 'required|date',
            ]);

            $newTask = $request->post();
            dd($newTask);

            $task = Task::create($newTask);
            
        } catch (Exception $e) {
            return response()->json($e->getMessage(), Response::HTTP_NOT_ACCEPTABLE);
        }

        return response()->json('Task editada com sucesso!');
    }

    public function delete(int $taskId)
    {
        $task = Task::where('id', $taskId)->first();

        if (is_null($task)) {
            return response()->json('Nenhuma task encontrado com esse ID', Response::HTTP_NOT_ACCEPTABLE);
        }

        $task->delete();
        $task->save();

        return response()->json('task excluída com sucesso!!!');
    }
}
