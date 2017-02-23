<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Spravki;
class SpravkiController extends Controller
{
    public function index(){
        return view('spravki.index');
    }
    public function personal(){
        $data['spravki'] = Spravki::all();
        return view('spravki.personal', $data);
    }
    public function student(Request $request){
        $data['spravki'] = Spravki::where('id_student', $request->route('id'))->get();
        $data['id'] = $request->route('id');

        return view('spravki.student', $data);
    }
    public function students(){

        return view('spravki.st');
    }
    public function send(Request $request){
        $spravki = new Spravki();
        $spravki->id_type = $request->input('id_type');
        $is_fast = $request->input('is_fast', '0');
        if($is_fast=='on'){
            $is_fast='1';
        }
        $spravki->is_fast = $is_fast;
        $spravki->id_student = $request->input('id_student');
        $spravki->status = 'no read';
        $spravki->save();
        $data['spravki'] = Spravki::where('id_student', $request->route('id'));
        $data['id'] = $request->route('id');
        return redirect(route('student',['id'=>$request->input('id_student')] ));
    }
}
