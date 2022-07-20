<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;

class MsgController extends Controller
{
    //
    public function __construct(){
      $this->middleware('auth');
    }
    public function index(){
        //$msg = Message::all();
        $msg= Message::orderBy('name')->get();
        return view('index', [
            'msg' => $msg,
          ]);
    }
    public function show($id) {
        // use the $id variable to query the db for a record\
        $msg = Message::findOrfail($id);
        return view('show', ['msg' => $msg]);
      }
    public function create(){
      return view('create');
    }
    public function store(){
      $msg= new Message();
      $msg->name = request('name');
      $msg->message = request('message');
      $msg->save();
      
      return redirect('/msg')->with("mssg",'message sent!!!');    }
      public function destroy($id){
        $msg = Message::findOrFail($id);
        $msg->delete();
        return redirect('/msg');

      }
}
