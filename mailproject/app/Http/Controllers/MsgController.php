<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Message;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


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
      public function conversation($userId){
        $users = User::where('id', '!=', Auth::id())->get();
        $friendInfo = User::findOrFail($userId);
        $myInfo = User::find(Auth::id());
        //$groups = MessageGroup::get();

        $this->data['users'] = $users;
        $this->data['friendInfo'] = $friendInfo;
        $this->data['myInfo'] = $myInfo;
        $this->data['users'] = $users;
       // $this->data['groups'] = $groups;

        return view('message\conversation', $this->data);
    }
}
