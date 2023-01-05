<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTodoRequest;
use App\Http\Resources\TodoResources;
use App\Models\Todo;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;

class TodoController extends Controller
{
    use HttpResponses;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(): \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
    {
//        return TodoResources::collection(
//            Todo::query()
//                ->where('user_id', Auth::user()['user_id'])->get()
//      );

//        return view('todo.index',[
//            'todos' => $todos,
//        ]);

        $todos = Todo::query()
            ->where('user_id', Auth::user()['user_id'])
            ->get();

        return view('todo.index',[
            'todos' => $todos,
            'showFooter' => true,
            'showTopBar' => true,
            'showSideBar' => true,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function create()
    {
        return view('todo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return TodoResources
     */
    public function store(StoreTodoRequest $request)
    {
        $request->validated($request->all());

        $todo = Todo::query()->create([
            'user_id' => Auth::user()['user_id'],
//            'title' => $request['title']
            'todo_body' => $request['todo_body'],
            'time' => $request['timeDate']
        ]);

        return new TodoResources($todo);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return TodoResources
     */
    public function show(Todo $todo)
    {
        return $this->isNotAuthorize($todo) ? $this->isNotAuthorize($todo) : new TodoResources($todo);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function edit($id)
    {
        return view('todo.edit');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function update(Request $request, Todo $todo)
    {
        $todo->update($request->all());
        return $this->isNotAuthorize($todo) ? $this->isNotAuthorize($todo) : new TodoResources($todo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy(Todo $todo)
    {

        $todo->delete();
        return response(null, 204);

    }

    private function isNotAuthorize($todo)
    {
        if (Auth::user()['user_id'] !== $todo->user_id) {
            return $this->error('', 'You are not authorize to access this method', 403);
        }
    }
}
