<?php

namespace App\Http\Controllers;

use App\Http\Resources\TodoResources;
use App\Models\Todo;
use App\Traits\HttpResponses;
use Illuminate\Http\Request;
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
            ->where('deleted_at', null)
            ->get();
        $totalTodos = $todos->count();
        return view('todo.index', [
            'todos' => $todos,
            'totalTodo' => $totalTodos,
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
        return view('todo.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return string
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => ['required', 'string'],
            'todo_body' => ['required', 'string'],
            'timeDate' => ['required'],
        ]);

        Todo::query()->create([
            'user_id' => Auth::user()['user_id'],
            'title' => $data['title'],
            'todo_body' => $data['todo_body'],
            'time' => $data['timeDate'],
        ]);

        return redirect()->route('todo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show($id)
    {
        $todo =  Todo::query()->find($id);

        return view('todo.show',[
            'todo' => $todo,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function edit(Request $request, $id)
    {
        if ($request->isMethod('post')){
            $data = $request->validate([
                'title' => ['required', 'string', 'min:3', 'max:100'],
                'todo_body' => ['required', 'string', 'min:3', 'max:1000'],
                'timeDate' => ['required'],
            ]);

            $todo = Todo::query()->find($id);
            $todo->update($data);
            return to_route('todo.show', $id);
        }
        $todo = Todo::query()->find($id);
        return view('todo.edit',[
            'todo' =>$todo,
        ]);
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
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
       $todo  = Todo::query()->find($id);
       $todo->update(['deleted_at'=> time()]);
       return to_route('todo.index');

    }

    private function isNotAuthorize($todo)
    {
        if (Auth::user()['user_id'] !== $todo->user_id) {
            return $this->error('', 'You are not authorize to access this method', 403);
        }
    }
}
