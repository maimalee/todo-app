<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        return \view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showUsers(): Factory|View|Application
    {
        $users = User::query()
            ->where('role', null)
            ->get();

        $deletedUsers = User::onlyTrashed()->get();

        return view('admin.users.users', [
            'users' => $users,
            'deletedUsers' => $deletedUsers,
        ]);
    }

    public function softDelete(int $id)
    {
        $user = User::query()->find($id);
        $user->update(['deleted_at' => time()]);

        return to_route('admin.users');
    }

    public function editUser(Request $request)
    {

        if ($request->isMethod('post')) {
            $data = $request->validate([
                'fullname' => ['required', 'string', 'min:2', 'max:250'],
                'username' => ['required', 'string', 'min:2', 'max:250'],
                'email' => ['required', 'email']
            ]);
            $user = User::query()->find($request['user_id']);

            $user->update($data);
            return to_route('admin.users');
        }
        $user = User::query()->find($request['user_id']);
        return \view('admin.users.edit', [
            'user' => $user,
        ]);

    }

    public function recoverUser(int $id)
    {
        $user = User::onlyTrashed()->find($id);
        $user->restore();
        return to_route('admin.users');
    }

    public function todoIndex()
    {
        $todos = Todo::query()
            ->where('deleted_at' ,  null)
            ->get();
        $trashedTodos = Todo::onlyTrashed()->get();

        return \view('admin.todo.index', [
            'todos' => $todos,
            'trashedTodos' => $trashedTodos,
        ]);
    }

    public function addUser(Request $request)
    {
        if ($request->isMethod('post')) {
         $data =   $request->validate([
                'fullname' => ['required', 'string', 'max:255'],
                'username' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'numeric', 'digits:11'],
                'role' => ['required', 'string', 'min:4', 'max:5'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password' => ['required', 'string', 'min:4', 'confirmed'],
            ]);
            User::query()->create([
                'fullname' => $data['fullname'],
                'username' => $data['username'],
                'phone' => $data['phone'],
                'role' => $data['role'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
            ]);

            return to_route('admin.users');

        }

        return \view('admin.users.add');
    }

    public function showTodo(int $id)
    {
        $todo = Todo::query()->find($id);

        return \view('admin.todo.show',[
            'todo' => $todo,
        ]);
    }

    public function editTodo(Request $request)
    {
        if ($request->isMethod('post')){
            $data = $request->validate([
                'title' => ['required', 'string'],
                'todo_body' => ['required', 'string'],
                'timeDate' => ['required'],

            ]);

            $todo = Todo::query()->find($request['id']);
            $todo->update($data);
            return to_route('admin.todo');
        }

        $todo = Todo::query()->find($request['id']);
        return \view('admin.todo.edit',[
            'todo' =>$todo,
        ]);
    }

    public function destroyTodo($id)
    {
        $todo = Todo::query()->find($id);
        $todo->update(['deleted_at' => time()]);
        return to_route('admin.todo');
    }

    public function recoverTodo($id)
    {
        $todo = Todo::onlyTrashed()->find($id);
        $todo->restore();

        return to_route('admin.todo');
    }
}
