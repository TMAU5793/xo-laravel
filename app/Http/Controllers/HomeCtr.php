<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeCtr extends Controller
{
    function index() {
        $data['rows'] = 3;
        $data['cols'] = 3;

        if(session('rows') != null){
            $data['rows'] = session('rows');
            $data['cols'] = session('cols');
        };

        return view('index',$data);
    }

    function boxsize(Request $request) {
        $post = $request->all();

        session()->put(['rows' => $post['rows'], 'cols' => $post['cols']]);

        return redirect()->back();
    }
}
