<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function table()
    {
        return view('table');
    }

    public function saveTable(Request $request)
    {
        $t=$request->input();
        //var_dump($t);
        $subject=$request->input('subject');
        $table=$request->input('table');

        $subjectRows=[];
        $i=1;
        foreach ($subject as $keySub => $s)
        {
            $subjectRows[$s]['num']='1.'.$i++;
            $subjectRows[$s]['freeD']=0;
            $subjectRows[$s]['payD']=0;
            $subjectRows[$s]['stavkaFD']=0;
            $subjectRows[$s]['stavkaPD']=0;
            $subjectRows[$s]['freeZ']=0;
            $subjectRows[$s]['payZ']=0;
            $subjectRows[$s]['stavkaFZ']=0;
            $subjectRows[$s]['stavkaPZ']=0;
            $subjectRows[$s]['allF']=0;
            $subjectRows[$s]['allP']=0;
            $subjectRows[$s]['all']=0;
            foreach ($table[$s] as $key => $row)
            {

                /**
                 * Нужно зделать так чтоб оно бралось с базы данных и сюда вставлялось
                 * но покашто для примера будет число 10
                 */
                $table[$s][$key]['normD']=10; //Норма пост
                $table[$s][$key]['normZ']=10; //Норма пост

                $table[$s][$key]['stavkaFD']=$row['freeD']/$table[$s][$key]['normD'];
                $table[$s][$key]['stavkaPD']=$row['payD']/$table[$s][$key]['normD'];
                $table[$s][$key]['stavkaFZ']=$row['freeZ']/$table[$s][$key]['normZ'];
                $table[$s][$key]['stavkaPZ']=$row['payZ']/$table[$s][$key]['normZ'];

                $table[$s][$key]['allF'] = $table[$s][$key]['stavkaFD'] + $table[$s][$key]['stavkaFZ'];
                $table[$s][$key]['allP'] = $table[$s][$key]['stavkaPD'] + $table[$s][$key]['stavkaPZ'];
                $table[$s][$key]['all']= $table[$s][$key]['allF'] + $table[$s][$key]['allP'];


                /**
                 * строка для ...
                 */
                $subjectRows[$s]['freeD']+=$row['freeD'];
                $subjectRows[$s]['payD']+=$row['payD'];
                $subjectRows[$s]['stavkaFD']+=$table[$s][$key]['stavkaFD'];
                $subjectRows[$s]['stavkaPD']+= $table[$s][$key]['stavkaPD'];
                $subjectRows[$s]['freeZ']+=$row['freeZ'];
                $subjectRows[$s]['payZ']+=$row['payZ'];
                $subjectRows[$s]['stavkaFZ']+= $table[$s][$key]['stavkaFZ'];
                $subjectRows[$s]['stavkaPZ']+= $table[$s][$key]['stavkaPZ'];
                $subjectRows[$s]['allF']+= $table[$s][$key]['allF'];
                $subjectRows[$s]['allP']+= $table[$s][$key]['allP'];
                $subjectRows[$s]['all']+= $table[$s][$key]['all'];
            }
        }

        $data['subject'] = $subject;
        $data['table'] = $table;
        $data['subjectRows'] = $subjectRows;

       // $input['has'] = Request::all();
        return view('tt',$data);
    }
}
