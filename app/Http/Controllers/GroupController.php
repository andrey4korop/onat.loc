<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Student;
class GroupController extends Controller
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
    public function index(Request $request)
    {
        $this->data['groups'] = Group::all();
        return view('group.index',$this->data);
    }
    public function getGroup(Request $request)
    {
        $group = Group::where('id', '=', $request->input('id'))->with('students')->get();
        return $group->toJson() ;
    }
    public function saveGroup(Request $request)
    {
        $arr = $request->input('FIO');
        $newStudents = [];
        foreach ($arr as $FIO){
            $newStudents[] = new Student(['FIO' => $FIO]);
        }

        $group = Group::where('id', '=', $request->input('id'))->with('students')->get()->first();
        $group->students()->saveMany($newStudents);
        return $this->getGroup($request);
    }
    public function addGroup(Request $request)
    {
        $group = new Group(['group_name' => $request->input('nameGroup')]);
        $group->save();
        return Group::all()->toJson();
    }
}
