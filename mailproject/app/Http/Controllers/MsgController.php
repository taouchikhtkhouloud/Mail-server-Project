<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MsgController extends Controller
{
    //
    public function index(){
        $msg = [
            ['nom' => 'khouloud', 'message' => 'hi how are you'],
            ['nom' => 'aymane', 'message' => 'ok :)) hhhh'],
            ['nom' => 'ayoub', 'message' => 'let s get it ']
          ];
      
          return view('msg', [
            'msg' => $msg,
          ]);
    }
    public function show($id) {
        // use the $id variable to query the db for a record
        return view('details', ['id' => $id]);
      }
}
