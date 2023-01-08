<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function showUsers(): Factory|View|Application
    {
        $users  = User::all();

        $deletedUsers =  User::onlyTrashed()->get();

        return view('admin.users',[
            'users' => $users,
            'deletedUsers' => $deletedUsers,
        ]);
    }

    public function softDelete(int $id)
    {
        $user = User::query()->find($id);
        $user->update(['deleted_at' => time() ]);

        return to_route('admin.users');
    }

    public function editUser(Request $request)
    {

        if ($request->isMethod('post')){
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
        return \view('admin.edit',[
            'user' => $user,
        ]);

    }

    public function recoverUser(int $user_id)
    {
        $user = User::onlyTrashed()->find($user_id);
        $user->restore();
        return to_route('admin.users');
    }
}
