<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Spravki;

class SpravkiController extends Controller
{
    public $data = [];
    public function __construct(Request $request)
    {
        $roles = $request->user()->roles;
        $menu = [];
        foreach ($roles as $role){

            foreach ($role->leftMenu as $menuForRole){
                $menu[] = $menuForRole;
            }
        }
        $this->data['menus'] = $menu;
    }

    public function index(Request $request){
        $this->data['spravka'] = Spravki::where('id', '=', $request->route('id') )->with('type', 'student')->get()->first();

        return view('spravki.spravki',$this->data);
    }
    public function setStatus(Request $request){
        $sp = Spravki::find($request->route('id'));

        $sp->status = $request->input('status').date('Y-m-d H:i:s', strtotime ($request->input('time')));
        $sp->save();
        return redirect(route('spravki'));
    }
    public function personal(){
        $this->data['spravki'] = Spravki::with('type', 'student')->get();
//dd($data['spravki']);
        return view('spravki.personal', $this->data);
    }
    public function student(Request $request){
        $this->data['spravki'] = Spravki::where('id_student', $request->route('id'))->get();
        $this->data['id'] = $request->route('id');

        return view('spravki.student', $this->data);
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
        $this->data['spravki'] = Spravki::where('id_student', $request->route('id'));
        $this->data['id'] = $request->route('id');
        return redirect(route('student',['id'=>$request->input('id_student')] ));
    }
}
