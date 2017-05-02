<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\GroupForPoselenie;
class PoselenieController extends Controller
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
        $this->data['groups'] = GroupForPoselenie::all();
//dd($this->data);

        return view('poselenie2.index',  $this->data);
    }
    public function getGroup(Request$request){
        $g = GroupForPoselenie::with('students')->find($request->input('id'));
        return $g->toJson();
    }
}
