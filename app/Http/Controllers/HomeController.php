<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Table;

use Excel;

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
        $subjects=Subject::all()->where('other','');
        $aspirantura=Subject::all()->where('other','2');
       // dd($aspirantura);
        return view('table',['subjects' => $subjects, 'aspirantura' => $aspirantura]);
    }

    public function excel(Request $request){
        $user = $request->user();
        //->table=$data;

        $data = $user->table->last()->table;
        Excel::create('New file', function($excel) use ($data){

            $excel->sheet('New sheet', function($sheet) use ($data) {

                $sheet->loadView('file', $data);

            });


        })->export('xls');
    }



    public function saveTable(Request $request)
    {
        $subjects=Subject::with('norm')->get();

        $subject=$request->input('subject');
        $table=$request->input('table');
        $asp=$request->input('other');
        $doc=$request->input('doctor');



        if(!$request->input('table')){
            return back();
        }


        $subjectRows=[];
        $aspRow=[];
        $tableAsp=[];
        $docRow=[];
        $allSubject=[];

        $all=[];
        $all['freeD']=0;
        $all['payD']=0;
        $all['stavkaFD']=0;
        $all['stavkaPD']=0;
        $all['freeZ']=0;
        $all['payZ']=0;
        $all['stavkaFZ']=0;
        $all['stavkaPZ']=0;
        $all['allF']=0;
        $all['allP']=0;
        $all['all']=0;

        $superAll=[];
        $superAll['stavkaFD'] = 0;
        $superAll['stavkaPD'] = 0;
        $superAll['stavkaFZ'] = 0;
        $superAll['stavkaPZ'] = 0;
        $superAll['allF']     = 0;
        $superAll['allP']     = 0;
        $superAll['all']      = 0;


        foreach($subjects->first()->norm as $i) {
            $allSubject[$i->name]['freeD']=0;
            $allSubject[$i->name]['payD']=0;
            $allSubject[$i->name]['freeZ']=0;
            $allSubject[$i->name]['payZ']=0;
            $allSubject[$i->name]['stavkaFD']=0;
            $allSubject[$i->name]['stavkaPD']=0;
            $allSubject[$i->name]['stavkaFZ']=0;
            $allSubject[$i->name]['stavkaPZ']=0;
            $allSubject[$i->name]['allF']=0;
            $allSubject[$i->name]['allP']=0;
            $allSubject[$i->name]['all']=0;
        }





        $i=1;
        if(!empty($subject)) {
            foreach ($subject as $keySub => $s) {

                $subjectRows[$s]['num'] = '1.' . $i++;
                $subjectRows[$s]['name'] = $subjects->where('id', $s)->first()->subject;
                $subjectRows[$s]['freeD'] = 0;
                $subjectRows[$s]['payD'] = 0;
                $subjectRows[$s]['stavkaFD'] = 0;
                $subjectRows[$s]['stavkaPD'] = 0;
                $subjectRows[$s]['freeZ'] = 0;
                $subjectRows[$s]['payZ'] = 0;
                $subjectRows[$s]['stavkaFZ'] = 0;
                $subjectRows[$s]['stavkaPZ'] = 0;
                $subjectRows[$s]['allF'] = 0;
                $subjectRows[$s]['allP'] = 0;
                $subjectRows[$s]['all'] = 0;
                foreach ($table[$s] as $key => $row) {

                    /**
                     * Нужно зделать так чтоб оно бралось с базы данных и сюда вставлялось
                     * но покашто для примера будет число 10
                     */

                    $table[$s][$key]['normD'] = $subjects->find($s)->norm->where('name',$table[$s][$key]['qualification'])->first()->normD; //Норма пост
                    $table[$s][$key]['normZ'] = $subjects->find($s)->norm->where('name',$table[$s][$key]['qualification'])->first()->normZ; //Норма пост

                    $table[$s][$key]['stavkaFD'] = $row['freeD'] / $table[$s][$key]['normD'];
                    $table[$s][$key]['stavkaPD'] = $row['payD'] / $table[$s][$key]['normD'];
                    $table[$s][$key]['stavkaFZ'] = $row['freeZ'] / $table[$s][$key]['normZ'];
                    $table[$s][$key]['stavkaPZ'] = $row['payZ'] / $table[$s][$key]['normZ'];

                    $table[$s][$key]['allF'] = $table[$s][$key]['stavkaFD'] + $table[$s][$key]['stavkaFZ'];
                    $table[$s][$key]['allP'] = $table[$s][$key]['stavkaPD'] + $table[$s][$key]['stavkaPZ'];
                    $table[$s][$key]['all'] = $table[$s][$key]['allF'] + $table[$s][$key]['allP'];


                    /**
                     * строка для ...
                     */
                    $subjectRows[$s]['freeD'] += $row['freeD'];
                    $subjectRows[$s]['payD'] += $row['payD'];
                    $subjectRows[$s]['stavkaFD'] += $table[$s][$key]['stavkaFD'];
                    $subjectRows[$s]['stavkaPD'] += $table[$s][$key]['stavkaPD'];
                    $subjectRows[$s]['freeZ'] += $row['freeZ'];
                    $subjectRows[$s]['payZ'] += $row['payZ'];
                    $subjectRows[$s]['stavkaFZ'] += $table[$s][$key]['stavkaFZ'];
                    $subjectRows[$s]['stavkaPZ'] += $table[$s][$key]['stavkaPZ'];
                    $subjectRows[$s]['allF'] += $table[$s][$key]['allF'];
                    $subjectRows[$s]['allP'] += $table[$s][$key]['allP'];
                    $subjectRows[$s]['all'] += $table[$s][$key]['all'];

                    $allSubject[$table[$s][$key]['qualification']]['freeD']+=$row['freeD'];
                    $allSubject[$table[$s][$key]['qualification']]['payD']+=$row['payD'];
                    $allSubject[$table[$s][$key]['qualification']]['freeZ']+=$row['freeZ'];
                    $allSubject[$table[$s][$key]['qualification']]['payZ']+=$row['payZ'];

                    $allSubject[$table[$s][$key]['qualification']]['stavkaFD']+=$table[$s][$key]['stavkaFD'];
                    $allSubject[$table[$s][$key]['qualification']]['stavkaPD']+=$table[$s][$key]['stavkaPD'];
                    $allSubject[$table[$s][$key]['qualification']]['stavkaFZ']+=$table[$s][$key]['stavkaFZ'];
                    $allSubject[$table[$s][$key]['qualification']]['stavkaPZ']+=$table[$s][$key]['stavkaPZ'];

                    $allSubject[$table[$s][$key]['qualification']]['allF']+=$table[$s][$key]['allF'];
                    $allSubject[$table[$s][$key]['qualification']]['allP']+=$table[$s][$key]['allP'];
                    $allSubject[$table[$s][$key]['qualification']]['all']+=$table[$s][$key]['all'];

                    $all['freeD']+=$row['freeD'];
                    $all['payD']+=$row['payD'];
                    $all['freeZ']+=$row['freeZ'];
                    $all['payZ']+=$row['payZ'];
                    $all['stavkaFD']+=$table[$s][$key]['stavkaFD'];
                    $all['stavkaPD']+=$table[$s][$key]['stavkaPD'];
                    $all['stavkaFZ']+=$table[$s][$key]['stavkaFZ'];
                    $all['stavkaPZ']+=$table[$s][$key]['stavkaPZ'];
                    $all['allF']+=$table[$s][$key]['allF'];
                    $all['allP']+=$table[$s][$key]['allP'];
                    $all['all']+=$table[$s][$key]['all'];

                    $superAll['stavkaFD']+=$all['stavkaFD'];
                    $superAll['stavkaPD']+=$all['stavkaPD'];
                    $superAll['stavkaFZ']+=$all['stavkaFZ'];
                    $superAll['stavkaPZ']+=$all['stavkaPZ'];
                    $superAll['allF']    +=$all['allF'];
                    $superAll['allP']    +=$all['allP'];
                    $superAll['all']     +=$all['all'];
;

                }
            }
        }
        
        if(!empty($asp)) {
            foreach ($asp as $as) {
                $aspRow['other']['num'] = '2';
                $aspRow['other']['name'] = 'Аспірантура';
                $aspRow['other']['freeD'] = 0;
                $aspRow['other']['payD'] = 0;
                $aspRow['other']['stavkaFD'] = 0;
                $aspRow['other']['stavkaPD'] = 0;
                $aspRow['other']['freeZ'] = 0;
                $aspRow['other']['payZ'] = 0;
                $aspRow['other']['stavkaFZ'] = 0;
                $aspRow['other']['stavkaPZ'] = 0;
                $aspRow['other']['allF'] = 0;
                $aspRow['other']['allP'] = 0;
                $aspRow['other']['all'] = 0;

                foreach ($as as $key => $row) {

                    /**
                     * Нужно зделать так чтоб оно бралось с базы данных и сюда вставлялось
                     * но покашто для примера будет число 10
                     */
                    $tableAsp[$key]['normD'] = $subjects->find($row['qualification'])->norm->first()->normD; //Норма пост
                    $tableAsp[$key]['normZ'] = $subjects->find($row['qualification'])->norm->first()->normZ; //Норма пост

                    $tableAsp[$key]['qualification']=$subjects->where('id', $row['qualification'])->first()->subject;
                    $tableAsp[$key]['freeD'] = $row['freeD'];
                    $tableAsp[$key]['payD'] = $row['payD'];
                    $tableAsp[$key]['freeZ'] = $row['freeZ'];
                    $tableAsp[$key]['payZ'] = $row['payZ'];

                    $tableAsp[$key]['stavkaFZ'] = $row['freeZ'] / $tableAsp[$key]['normZ'];
                    $tableAsp[$key]['stavkaPZ'] = $row['payZ'] / $tableAsp[$key]['normZ'];
                    $tableAsp[$key]['stavkaFD'] = $row['freeD'] / $tableAsp[$key]['normD'];
                    $tableAsp[$key]['stavkaPD'] = $row['payD'] / $tableAsp[$key]['normD'];

                    $tableAsp[$key]['allF'] = $tableAsp[$key]['stavkaFD'] + $tableAsp[$key]['stavkaFZ'];
                    $tableAsp[$key]['allP'] = $tableAsp[$key]['stavkaPD'] + $tableAsp[$key]['stavkaPZ'];
                    $tableAsp[$key]['all'] = $tableAsp[$key]['allF'] + $tableAsp[$key]['allP'];


                    /**
                     * строка для ...
                     */
                    $aspRow['other']['freeD'] += $row['freeD'];
                    $aspRow['other']['payD'] += $row['payD'];
                    $aspRow['other']['stavkaFD'] += $tableAsp[$key]['stavkaFD'];
                    $aspRow['other']['stavkaPD'] += $tableAsp[$key]['stavkaPD'];
                    $aspRow['other']['freeZ'] += $row['freeZ'];
                    $aspRow['other']['payZ'] += $row['payZ'];
                    $aspRow['other']['stavkaFZ'] += $tableAsp[$key]['stavkaFZ'];
                    $aspRow['other']['stavkaPZ'] += $tableAsp[$key]['stavkaPZ'];
                    $aspRow['other']['allF'] += $tableAsp[$key]['allF'];
                    $aspRow['other']['allP'] += $tableAsp[$key]['allP'];
                    $aspRow['other']['all'] += $tableAsp[$key]['all'];

                    $superAll['stavkaFD']+=$aspRow['other']['stavkaFD'];
                    $superAll['stavkaPD']+=$aspRow['other']['stavkaPD'];
                    $superAll['stavkaFZ']+=$aspRow['other']['stavkaFZ'];
                    $superAll['stavkaPZ']+=$aspRow['other']['stavkaPZ'];
                    $superAll['allF']    +=$aspRow['other']['allF'];
                    $superAll['allP']    +=$aspRow['other']['allP'];
                    $superAll['all']     +=$aspRow['other']['all'];
                }

            }
        }

        if(!empty($doc)){

            /**
             * Нужно зделать так чтоб оно бралось с базы данных и сюда вставлялось
             * но покашто для примера будет число 10
             */
            $docRow['normD'] = 12; //Норма пост
            $docRow['normZ'] = 12; //Норма пост

            $docRow['qualification']= 'Докторнатура';
            $docRow['num'] = '3';
            $docRow['freeD'] = $doc['freeD'];
            $docRow['payD'] = $doc['payD'];
            $docRow['freeZ'] = $doc['freeZ'];
            $docRow['payZ'] = $doc['payZ'];

            $docRow['stavkaFD'] =  $docRow['freeD']/$docRow['normD'];
            $docRow['stavkaPD'] =  $docRow['payD']/$docRow['normD'];
            $docRow['stavkaFZ'] =  $docRow['freeZ']/$docRow['normZ'];
            $docRow['stavkaPZ'] =  $docRow['payZ']/$docRow['normZ'] ;

            $docRow['allF'] = $docRow['stavkaFD']+$docRow['stavkaFZ'];
            $docRow['allP'] = $docRow['stavkaPD']+$docRow['stavkaPZ'];
            $docRow['all'] = $docRow['allF']+$docRow['allP'];

            $superAll['stavkaFD']+=$docRow['stavkaFD'];
            $superAll['stavkaPD']+=$docRow['stavkaPD'];
            $superAll['stavkaFZ']+=$docRow['stavkaFZ'];
            $superAll['stavkaPZ']+=$docRow['stavkaPZ'];
            $superAll['allF']    +=$docRow['allF'];
            $superAll['allP']    +=$docRow['allP'];
            $superAll['all']     +=$docRow['all'];
        }





        $data['subject'] = $subject;
        $data['table'] = $table;
        $data['subjectRows'] = $subjectRows;
        $data['allSubject'] = $allSubject;
        $data['all'] = $all;
        $data['aspRow'] = $aspRow;

        $data['tableAsp'] = $tableAsp;
        $data['docRow'] = $docRow;

        $data['superAll'] = $superAll;

        $user = $request->user();
        //->table=$data;
        $tt=new Table();
        $tt->table = $data;
        $user->table()->save($tt);




       // $input['has'] = Request::all();
        return view('tt',$data);
    }
}
