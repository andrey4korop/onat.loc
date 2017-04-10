<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Spravki;
use App\TypeSpravki;
class StudentController extends Controller
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
    public function index(){
        return view('main', $this->data);
    }

    public function getSpravka(Request $request){

        $this->data['types'] = TypeSpravki::all();
        $this->data['id'] = $request->user()->id;

        return view('student.spravki', $this->data);
    }

    public function myArhive(Request $request){
        $this->data['spravki'] = $request->user()->spravki;
        $this->data['id'] = $request->user()->id;

        return view('student.myArhive', $this->data);
    }

    public function send(Request $request){
        $spravki = new Spravki();
        $spravki->id_type = $request->input('id_type');
        $spravki->info = $request->input('info');
        $is_fast = $request->input('is_fast', '0');
        if($is_fast=='on'){
            $is_fast='1';
        }
        $spravki->is_fast = $is_fast;
        $spravki->id_student = $request->user()->id;
        $spravki->status = 'Не перегляно';
        $spravki->save();

        return redirect(route('studentHome'));
    }
}
