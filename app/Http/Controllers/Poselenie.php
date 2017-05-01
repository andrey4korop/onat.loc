<?php

namespace App\Http\Controllers;

use App\Student;
use Illuminate\Http\Request;
use App\Group;
use App\GroupForPoselenie;
class Poselenie extends Controller
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
        $this->data['groupsForPoselenie'] = GroupForPoselenie::all();
        //GroupForPoselenie::find(1)->students()->sync([Student::all()->last()->id]);
        return view('poselenie.index',  $this->data);
    }
    public function getGroup(Request$request){
        $g = GroupForPoselenie::with('students')->find($request->input('id'));
        return $g->toJson();
    }
    public function addGroup(Request $request)
    {
        $group = new GroupForPoselenie(['name' => $request->input('nameGroup')]);
        $group->save();
        return GroupForPoselenie::all()->toJson();
    }
    public function saveGroup(Request $request)
    {
        $arr = $request->input('idStudent');


        $group = GroupForPoselenie::where('id', '=', $request->input('id'))->with('students')->get()->first();
        
        $group->students()->sync($arr);

        return $this->getGroup($request);
    }
}
