<?php

namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;

class NoteController extends Controller
{

// index function : 
public function index(){
    $notes = Note::all(); // select * from table(notes)
    return view('index' , ["notes"=>$notes]);
}


// create function:
public function create(){
    return view('create');
}


// store function
public function store(){

    $note = request()->note;
   
    Note::create([
        'Note' => $note,
    ]);
    return to_route('notes.index');
}


// edit function :
public function edit(Note $note){
    return view('edit' , ['note'=>$note]);
}



// update function :
public function update($id){
   
    $note = request()->note; // -> note(name in the input form)
    $findNote = Note::find($id); 
    $findNote->update([
        'Note' => $note,
    ]);
    return to_route('notes.index' , $id);
}


// destroy function :
public function destroy($id){
    $findId = Note::find($id);
    $findId -> delete();
    return to_route('notes.index');
}
}