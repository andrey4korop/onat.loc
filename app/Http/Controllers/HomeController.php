<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Subject;
use App\Table;
use Mail;
use PDF;
use Excel;
use App\Norm;

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
    public function index(Request $request)
    {
        return view('home');
    }

    public function arhive(Request $request)
    {
        $user = $request->user();
        $arhive = $user->table;
        //dump($arhive);
        $data['arhive'] = $arhive;
        return view('arhive', $data);
    }
    public function open(Request $request){
        $user = $request->user();
        //->table=$data;

        $data = $user->table->find($request->id)->table;
        $data['id'] = $request->id;
        return view('tt', $data);
    }
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */

    public function table(Request $request)
    {
        $subjects=Subject::all()->where('other','');
        $aspirantura=Subject::all()->where('other','2');
        // dd($aspirantura);
        return view('table',['subjects' => $subjects, 'aspirantura' => $aspirantura]);
    }
    public function tableedit(Request $request){
        $user = $request->user();
        if(isset($request->id)){
            $data['table'] = $user->table->find($request->id)->table;
        }
        else{
            $data['table'] = $user->table->last()->table;
        }
        $data['subjects'] = Subject::all()->where('other','');
        $data['aspirantura'] = Subject::all()->where('other','2');
        $data['id'] = $request->id;
        //dump($data);
        return view('tableedit', $data);
    }

    public function excel(Request $request, $export = 'brouser'){
        $user = $request->user();
        //->table=$data;

        if(isset($request->id)){
            $data = $user->table->find($request->id)->table;
        }
        else{
            $data = $user->table->last()->table;
        }

        if($export == 'file') {
            $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
            $numChars = strlen($chars);
            $string = '';
            for ($i = 0; $i < 10; $i++) {
                $string .= substr($chars, rand(1, $numChars) - 1, 1);
            }
            $table = Excel::create($string, function($excel) use ($data){
                $excel->sheet('New sheet', function($sheet) use ($data) {
                    $sheet->loadView('file', $data);
                });
            });

            return $table->store('xls', storage_path('excel\exports') , true);
        }
        else{
            $table = Excel::create('Table', function($excel) use ($data){
                $excel->sheet('New sheet', function($sheet) use ($data) {
                    $sheet->loadView('file', $data);
                });
            });
            $table->export('xls');
        }
    }

    public function pdf(Request $request, $export = 'brouser'){
        $user = $request->user();
        //->table=$data;

        if(isset($request->id)){
            $data = $user->table->find($request->id)->table;
        }
        else{
            $data = $user->table->last()->table;
        }
        $pdf = PDF::loadView('pdf', $data)->setPaper('a4', 'landscape');
        if($export == 'file') {
            $chars = 'abdefhiknrstyzABDEFGHKNQRSTYZ23456789';
            $numChars = strlen($chars);
            $string = '';
            for ($i = 0; $i < 10; $i++) {
                $string .= substr($chars, rand(1, $numChars) - 1, 1);
            }

            $pdf->save(storage_path('excel/') . $string.'.pdf');
            return storage_path('excel/') . $string.'.pdf';
        }else{
            return $pdf->download('Table.pdf');
        }

         //stream();  //download('invoice.pdf');
    }

    public function editnorms(Request $request){
        $subjects=Subject::with('norm')->orderBy('other', 'asc')->get();

        foreach ($subjects as $subject) {
            $data['subjects'][$subject->id] = $subject;
            foreach ($subject->norm as $norm){
                $data['table'][$norm->id_subject][] = $norm;
            }
        }
       // dump($data);
        return view('editnorm',$data);
    }
    public function savenorm(Request $request){
        $table = $request->input('table');
        $norms = Norm::all();
        foreach ($table as $key => $norm) {
            $new = $norms->where('id', $key)->first();
            $new->normD=$norm['normD'];
            $new->normZ=$norm['normZ'];
            $new->save();
        }
        return view('success');

    }


    public function saveTable(Request $request)
    {
        $subjects=Subject::with('norm')->get();

        $subject=$request->input('subject');
        $subjectInozem=$request->input('subjectInozem');
        $table=$request->input('table');
        $inozem=$request->input('inozem');
        $asp=$request->input('other');
        $doc=$request->input('doctor');



        if(!$request->input('table')){
            return back();
        }


        $subjectRows=[];
        $subjectInozemRows=[];
        $aspRow=[];
        $tableAsp=[];
        $docRow=[];
        $allSubject=[];
        $allInozemSubject=[];

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

        $allInozem=[];
        $allInozem['freeD']=0;
        $allInozem['payD']=0;
        $allInozem['stavkaFD']=0;
        $allInozem['stavkaPD']=0;
        $allInozem['freeZ']=0;
        $allInozem['payZ']=0;
        $allInozem['stavkaFZ']=0;
        $allInozem['stavkaPZ']=0;
        $allInozem['allF']=0;
        $allInozem['allP']=0;
        $allInozem['all']=0;

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

            $allInozemSubject[$i->name]['freeD']=0;
            $allInozemSubject[$i->name]['payD']=0;
            $allInozemSubject[$i->name]['freeZ']=0;
            $allInozemSubject[$i->name]['payZ']=0;
            $allInozemSubject[$i->name]['stavkaFD']=0;
            $allInozemSubject[$i->name]['stavkaPD']=0;
            $allInozemSubject[$i->name]['stavkaFZ']=0;
            $allInozemSubject[$i->name]['stavkaPZ']=0;
            $allInozemSubject[$i->name]['allF']=0;
            $allInozemSubject[$i->name]['allP']=0;
            $allInozemSubject[$i->name]['all']=0;
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
                    if($row['qualification']!='магістри VI') {
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
                    }

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


                }
            }
        }





        $i=1;
        if(!empty($subjectInozem)) {
            foreach ($subjectInozem as $keySub => $s) {

                $subjectInozemRows[$s]['num']   = '2.' . $i++;
                $subjectInozemRows[$s]['name']  = $subjects->where('id', $s)->first()->subject;
                $subjectInozemRows[$s]['freeD'] = 0;
                $subjectInozemRows[$s]['payD']  = 0;
                $subjectInozemRows[$s]['stavkaFD'] = 0;
                $subjectInozemRows[$s]['stavkaPD'] = 0;
                $subjectInozemRows[$s]['freeZ'] = 0;
                $subjectInozemRows[$s]['payZ']  = 0;
                $subjectInozemRows[$s]['stavkaFZ'] = 0;
                $subjectInozemRows[$s]['stavkaPZ'] = 0;
                $subjectInozemRows[$s]['allF']  = 0;
                $subjectInozemRows[$s]['allP']  = 0;
                $subjectInozemRows[$s]['all']   = 0;
                foreach ($inozem[$s] as $key => $row) {

                    $inozem[$s][$key]['normD']    = $subjects->find($s)->norm->where('name',$inozem[$s][$key]['qualification'])->first()->normD; //Норма пост
                    $inozem[$s][$key]['normZ']    = $subjects->find($s)->norm->where('name',$inozem[$s][$key]['qualification'])->first()->normZ; //Норма пост

                    $inozem[$s][$key]['stavkaFD'] = $row['freeD'] / $inozem[$s][$key]['normD'];
                    $inozem[$s][$key]['stavkaPD'] = $row['payD'] / $inozem[$s][$key]['normD'];
                    $inozem[$s][$key]['stavkaFZ'] = $row['freeZ'] / $inozem[$s][$key]['normZ'];
                    $inozem[$s][$key]['stavkaPZ'] = $row['payZ'] / $inozem[$s][$key]['normZ'];

                    $inozem[$s][$key]['allF']     = $inozem[$s][$key]['stavkaFD'] + $inozem[$s][$key]['stavkaFZ'];
                    $inozem[$s][$key]['allP']     = $inozem[$s][$key]['stavkaPD'] + $inozem[$s][$key]['stavkaPZ'];
                    $inozem[$s][$key]['all']      = $inozem[$s][$key]['allF'] + $inozem[$s][$key]['allP'];


                    /**
                     * строка для ...
                     */
                    if($row['qualification']!='магістри VI') {
                        $subjectInozemRows[$s]['freeD']     += $row['freeD'];
                        $subjectInozemRows[$s]['payD']      += $row['payD'];
                        $subjectInozemRows[$s]['stavkaFD']  += $inozem[$s][$key]['stavkaFD'];
                        $subjectInozemRows[$s]['stavkaPD']  += $inozem[$s][$key]['stavkaPD'];
                        $subjectInozemRows[$s]['freeZ']     += $row['freeZ'];
                        $subjectInozemRows[$s]['payZ']      += $row['payZ'];
                        $subjectInozemRows[$s]['stavkaFZ']  += $inozem[$s][$key]['stavkaFZ'];
                        $subjectInozemRows[$s]['stavkaPZ']  += $inozem[$s][$key]['stavkaPZ'];
                        $subjectInozemRows[$s]['allF']      += $inozem[$s][$key]['allF'];
                        $subjectInozemRows[$s]['allP']      += $inozem[$s][$key]['allP'];
                        $subjectInozemRows[$s]['all']       += $inozem[$s][$key]['all'];
                    }

                    $allInozemSubject[$inozem[$s][$key]['qualification']]['freeD']  += $row['freeD'];
                    $allInozemSubject[$inozem[$s][$key]['qualification']]['payD']   += $row['payD'];
                    $allInozemSubject[$inozem[$s][$key]['qualification']]['freeZ']  += $row['freeZ'];
                    $allInozemSubject[$inozem[$s][$key]['qualification']]['payZ']   += $row['payZ'];

                    $allInozemSubject[$inozem[$s][$key]['qualification']]['stavkaFD']+=$inozem[$s][$key]['stavkaFD'];
                    $allInozemSubject[$inozem[$s][$key]['qualification']]['stavkaPD']+=$inozem[$s][$key]['stavkaPD'];
                    $allInozemSubject[$inozem[$s][$key]['qualification']]['stavkaFZ']+=$inozem[$s][$key]['stavkaFZ'];
                    $allInozemSubject[$inozem[$s][$key]['qualification']]['stavkaPZ']+=$inozem[$s][$key]['stavkaPZ'];

                    $allInozemSubject[$inozem[$s][$key]['qualification']]['allF']   += $inozem[$s][$key]['allF'];
                    $allInozemSubject[$inozem[$s][$key]['qualification']]['allP']   += $inozem[$s][$key]['allP'];
                    $allInozemSubject[$inozem[$s][$key]['qualification']]['all']    += $inozem[$s][$key]['all'];

                    $allInozem['freeD']     += $row['freeD'];
                    $allInozem['payD']      += $row['payD'];
                    $allInozem['freeZ']     += $row['freeZ'];
                    $allInozem['payZ']      += $row['payZ'];
                    $allInozem['stavkaFD']  += $inozem[$s][$key]['stavkaFD'];
                    $allInozem['stavkaPD']  += $inozem[$s][$key]['stavkaPD'];
                    $allInozem['stavkaFZ']  += $inozem[$s][$key]['stavkaFZ'];
                    $allInozem['stavkaPZ']  += $inozem[$s][$key]['stavkaPZ'];
                    $allInozem['allF']      += $inozem[$s][$key]['allF'];
                    $allInozem['allP']      += $inozem[$s][$key]['allP'];
                    $allInozem['all']       += $inozem[$s][$key]['all'];

                    $superAll['stavkaFD']+= $all['stavkaFD'];
                    $superAll['stavkaPD']+= $all['stavkaPD'];
                    $superAll['stavkaFZ']+= $all['stavkaFZ'];
                    $superAll['stavkaPZ']+= $all['stavkaPZ'];
                    $superAll['allF']    += $all['allF'];
                    $superAll['allP']    += $all['allP'];
                    $superAll['all']     += $all['all'];
                }
            }
        }












        if(!empty($asp)) {
            foreach ($asp as $as) {
                $aspRow['other']['num'] = '3';
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
            $docRow['normD'] = $subjects->where('other','3')->first()->norm->first()->normD; //Норма пост
            $docRow['normZ'] = $subjects->where('other','3')->first()->norm->first()->normZ; //Норма пост

            $docRow['qualification']= 'Докторнатура';
            $docRow['num'] = '4';
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

        $data['subjectInozem'] = $subjectInozem;
        $data['inozem'] = $inozem;
        $data['subjectInozemRows'] = $subjectInozemRows;
        $data['allInozemSubject'] = $allInozemSubject;
        $data['allInozem'] = $allInozem;

        $data['aspRow'] = $aspRow;

        $data['tableAsp'] = $tableAsp;
        $data['docRow'] = $docRow;

        $data['superAll'] = $superAll;

        $user = $request->user();
        //->table=$data;
        if(isset($request->id)){
            $tt = $user->table->find($request->id);
        }
        else{
            $tt = new Table();
        }


        $tt->table = $data;
        $user->table()->save($tt);




       // $input['has'] = Request::all();
        return view('tt',$data);
    }

    public function mail(Request $request){
        $user = $request->user();
        if(isset($request->id)){
            $data = $user->table->find($request->id)->table;
        }
        else{
            $data = $user->table->last()->table;
        }
        $from='ОНАС'; //$request->input('name');
        $to=$request->input('email');
        $subject = 'Тема'; //$request->input('subject');
        $fileExcel = $this->excel($request, 'file');
        $filePDF = $this->pdf($request, 'file');
//dd($file);

        Mail::send("email", $data, function ($message) use ($from, $to, $subject, $fileExcel, $filePDF) {
            $message->from('andrey999@i.ua', $from );
            $message->to($to);
            $message->subject($subject);
            $message->attach($fileExcel['full'],
                ['as' => 'Table.xls',
                    'mime' => 'application/excel'
                ]);
            $message->attach($filePDF,
                ['as' => 'Table.pdf',
                    'mime' => 'application/pdf'
                ]);

        });

        return   redirect()->route('home');

    }

    public function help(Request $request)
    {
        $user = $request->user();
        $from = $user->name; //$request->input('name');
        $to = 'andrey999@i.ua';
        $data['content'] = $request->text;
        $subject= 'ERROR FROM USER'; //$request->input('subject');
        Mail::send('emailhelp', $data, function ($message) use ($from, $to, $subject) {
            $message->from('andrey999@i.ua', $from );
            $message->to($to);
            $message->subject($subject);

        });

    }

    public function del(Request $request){
        $user = $request->user();
        if(isset($request->id)){
           $user->table->find($request->id)->delete();
        }
        else{
            $user->table->last()->delete();
        }
        return 'ok';
    }

}
