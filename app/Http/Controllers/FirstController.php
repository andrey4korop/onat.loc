<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FirstModel;
use App\TableT;

class FirstController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View вывод на екран главной страницы
     */
    public function main(){
        //return view('app/main');
        $table= TableT::all();
        //dd($table);
        return view('app/table',['view'=>$table]);
    }
    public function autorization(Request $request){
        //dd($request->input('pass'));
        //return view('app/main');
        //FirstModel::all()->where('login',$request->input('login'))->where('pass',$request->input('pass'));
        $table = new TableT();
        $t=['ak'=>'nuj','nng'=>'gyy','ii'=>'o,ooukkiykyi','hh'=>'yhukj9ko'];
        $table->tableg = [ $request->input('hh'), $request->input('hh1')];
        $table->save();


        $table1['view']= TableT::all();
        return view('app/table',$table1);


        //$request->input(['hh','hh1']);
    }
}
