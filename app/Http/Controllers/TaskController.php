<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    // index
    public function index(){
        $user = Auth::user()->id;
        $tasks = DB::table('todo')->select('*')
            ->where('user_id', '=', $user)
            ->where('completed', '=', false)
            ->orderBy('id', 'desc')->paginate(5);
        return view('tasks.index', ['tasks' => $tasks]);
    }
    // completed
    public function completed(){
        $userid = Auth::user()->id;
        $tasks = DB::table('todo')->where('user_id', $userid)
            ->where('completed', true)
            ->orderBy('created_at', 'desc')
            ->paginate(5);
        return view('tasks.completed', ['tasks' => $tasks]);
    }
    // show - edit
    public function show($id){
        $task = DB::table('todo')->where('id', $id)->first();
        return view('tasks.show', ['task' => $task]);
    }
    // store
    public function store(Request $request){
        $id = Auth::user()->id;
        $data = $request->validate([
           'name' => ['required']
        ]);
        $data['user_id'] = $id;
        $data['created_at'] = now();
        $data['updated_at'] = now();
        DB::table('todo')->insert($data);
        return redirect('/tasks');
    }
    // task complete
    public function complete($id){
        $todo = DB::table('todo')->where('id', $id)->first();
        if($todo){
            $status = !$todo->completed;
            DB::table('todo')->where('id', $id)->update(['completed' => $status, 'created_at' => now()]);
            if($status == true){
                return redirect()->route('tasks');
            }
            else{
                return redirect()->route('completed');
            }
        }
        return redirect()->route('tasks');
    }
    // update
    public function update(Request $request,$id){
        $data = $request->validate([
            'name' => ['required']
        ]);
        $data['updated_at'] = now(); // Manually set 'updated_at'
        DB::table('todo')
            ->where('id', $id)
            ->update($data);

        return redirect()->route('tasks');
    }
    // task delete
    public function destroy($id){
        DB::table('todo')->where('id', $id)->delete();
        return redirect()->back();
    }



}
