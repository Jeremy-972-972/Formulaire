<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tasks = Task::all();
        //  dd($tasks);
        
    
    return view ('tasks.index' , compact('tasks'));
  }

  public function create()
  {
      return view('task.create');
  }

    

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //controle les champs saisis
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
          ]);
          //enregistrment des données en base
          Task::create($request->all());
          return redirect()->route('home')
            ->with('success','Task created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $task = Task::find($id);
    return view('task.show', compact('task'));
    }


    public function state($id){
        $task = Task::where('id',$id)->first();
        if($task->state == 'à faire'){
            $task->state = 'fait';
        }else{
            $task->state = 'à faire';
        }
        $task->save();
        return back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Task $task)
    {

        return view('task.update',compact('task'));
        $request->validate([
            'title' => 'required|max:255',
            'description' => 'required',
          ]);
          //enregistrment des données en base
          Task::create($request->all());
          return redirect()->route('task.update')
            ->with('success','Task created successfully.');

        
      
       
        

}


public function edit(Task $task, Request $request){
    $task->update([
        'title'=>$request->title,
        'description'=>$request->description,
    ]);
    return redirect()->route('task.index');
}

    /**
     * Remove the specified resource from storage.
     */
    public function delete(Task $task)
    {
        $task->delete();
        return redirect()->route('home');
  

}

}
