<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

use App\Group;
use App\Day_group_subject;
use App\Poseyshaemost;
use App\TypePoseyshaemost;
use App\Predmet;
use App\Prepod;
class ZurnalController extends Controller
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
        $this->data['poseyshaemost_name'] = TypePoseyshaemost::all();

        return view('zurnal.index',$this->data);






/*
        $g = Group::with('students')->get();

        $g->first()->days(Carbon::now()->startOfWeek());
        $days = $g->first()->days = $g->first()->days->where('nweek', Carbon::now()->year.'-'.Carbon::now()->weekOfYear);
        $dates = [];
        foreach ($days as $day){
            $dates[] = $day->data;
        }

        $g->first()->students[1]->poseysaemosts($dates);
        dump($g->first()->students[1]->poseysaemosts->whereIn('data' , $dates) );
        //dump($g->first()->students->poseysaemosts);
*/
    }
    public function getGroup(Request $request)
    {
        $g = Group::with('students')->find($request->input('id'));
        if ($request->input('date')=='') {
            $g->days(Carbon::now()->toDateString());
            $days = $g->days->where('nweek', Carbon::now()->year . '-' . Carbon::now()->weekOfYear);
            //dd(Carbon::now()->toDateString(), $days, '1');
            $g->date = Carbon::now()->toDateString();
        }
        else{
            //dd($request->input('date'));
           $o = Carbon::createFromFormat('Y-m-d', $request->input('date'));
            $g->days($o->toDateString());
            $days = $g->days->where('nweek', $o->year . '-' . $o->weekOfYear);
            //dd($days, '2');
            $g->date = $o->toDateString();
        }
        $dates = [];
        foreach ($days as $day){
            $dates[] = $day->data;
        }

        foreach( $g->students as $key => $student){
            $student->poseysaemosts($dates);

            $g->students[$key]->poseysaemostss = $student->poseysaemosts->whereIn('data' , $dates);

            //$g->students[$key]->poseysaemostss;
        }
        $g->dayss = $days->all();
        $g->predmet = Predmet::all();
        $g->prepods = Prepod::all();

        return $g->toJson();
    }

    public function saveZurnal(Request $request){
        $data = $request->input('st');

        foreach ($data as $idStudent => $arr){
            foreach ($arr as $date => $item) {
                //dump(Poseyshaemost::where('student_id', '=', $idStudent)->where('data', '=', $date)->get());
                Poseyshaemost::where('student_id', '=', $idStudent)->where('data', '=', $date)->update(['status1' => $item['status1'], 'status2' => $item['status2'], 'status3' => $item['status3'], 'status4' => $item['status4']]);

            }


        }
        $ff = $request->input('ff');
        $id = $request->input('id');
        if($ff){
            foreach ($ff as $data => $arr){
                Day_group_subject::where('data', '=', $data)->where('group_id', '=', $id)->update($arr);
            }
        }


        return '1';
    }


    public function pdf(Request $request){

        $g = Group::with('students')->find($request->input('id'));
        if ($request->input('date')=='') {
            $g->days(Carbon::now()->toDateString());
            $days = $g->days->where('nweek', Carbon::now()->year . '-' . Carbon::now()->weekOfYear);
            //dd(Carbon::now()->toDateString(), $days, '1');
            $g->date = Carbon::now()->toDateString();
        }
        else{
            //dd($request->input('date'));
            $o = Carbon::createFromFormat('Y-m-d', $request->input('date'));
            $g->days($o->toDateString());
            $days = $g->days->where('nweek', $o->year . '-' . $o->weekOfYear);
            //dd($days, '2');
            $g->date = $o->toDateString();
        }
        $dates = [];
        foreach ($days as $day){
            $dates[] = $day->data;
        }

        foreach( $g->students as $key => $student){
            $student->poseysaemosts($dates);

            $g->students[$key]->poseysaemostss = $student->poseysaemosts->whereIn('data' , $dates);

            //$g->students[$key]->poseysaemostss;
        }
        $g->dayss = $days->all();
        $g->predmet = Predmet::all();
        $g->prepods = Prepod::all();
        $g->typ = TypePoseyshaemost::all();

        //return view('zurnal.pdf', $g);
        $pdf = PDF::loadView('zurnal.pdf', $g)->setPaper('a4', 'landscape');

            return $pdf->download('Table.pdf');


        //stream();  //download('invoice.pdf');
    }


}
