<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
class BookkeepingController extends Controller
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
        $this->data['groups'] = Group::all();
        return view('Bookkeeping.index',$this->data);
    }
    public function getGroupBookkeeping(Request $request){
        $group = Group::where('id', '=', $request->input('id'))->with('students.oplata')->get();
        //dd($group->students()->first());
        return $group->toJSON();
    }
}
