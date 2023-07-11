<?php

namespace App\Http\Controllers;

use App\Models\Todo;
use Illuminate\Http\Request;

class TodoController extends Controller
{
    public function todo()
    {   $data = Todo::all();
        return view('todo', compact('data'));
    }
    public function insert(Request $request)
    {   
       $data = $request->validate([
        'title' => 'required'
       ]);
       Todo::create($data);
        
        return back();
    }
    public function destroy($id)
    {
        $data = Todo::findorfail($id);

        $data->delete($id);

        return back();
    }
}