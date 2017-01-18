<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FirstModel;
use App\TableT;

use Excel;

class FirstController extends Controller
{
    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View вывод на екран главной страницы
     */
    public function main(){
      /*  //return view('app/main');
        $table= TableT::all();
        //dd($table);
        return view('app/table',['view'=>$table]);*/





        /*Excel::create('Filename', function($excel) {

            $excel->sheet('Sheetname', function($sheet) {

                $sheet->mergeCells('A1:E1');
                $sheet->mergeCells('A2:E2');
                $sheet->fromArray(array(
                    array('data1', 'data2','data1', 'data2','data1', 'data2','data1', 'data2'),
                    array('data3', 'data4','data1', 'data2','data1', 'data2','data1', 'data2')
                ));

            });


            // Set the title
            $excel->setTitle('Our new awesome title');

            // Chain the setters
            $excel->setCreator('Maatwebsite')
                ->setCompany('Maatwebsite');

            // Call them separately
            $excel->setDescription('A demonstration to change the file properties');

        })->export('xls');*/



       /* Excel::create('New file', function($excel) {

            $excel->sheet('New sheet', function($sheet) {

                $sheet->loadView('file');

            });

        })->export('xls');
*/
        $html = "<table>
<tr height='20'>
        <td rowspan='2' height='4'  width='8'>#</td>
        <td rowspan='2' width='20' >форма навчання</td>
        <td colspan='2' width='19' >Контингент</td>
        <td rowspan='2' width='6' >Норма</td>
        <td colspan='2' width='12' >Количество</td>
        <td width='3' ></td>
        <td colspan='2' width='12' >Контингент</td>
        <td rowspan='2' width='6' >Норма</td>
        <td colspan='2' width='12' >Количество</td>
        <td colspan='3' width='19' >Всього</td>
    </tr>
    <tr height='20'>
        <td></td>
        <td></td>
        <td>б</td>
        <td></td>
        <td>к</td>
        <td>б</td>
        <td>к</td>
        <td></td>
        <td>б</td>
        <td>к</td>
        <td></td>
        <td>б</td>
        <td>к</td>
        <td>б</td>
        <td>к</td>
        <td>б+к</td>
    </tr>
    <tr height='20'>
        <td ></td>
        <td >&nbsp;</td>
        <td colspan='5' >денна</td>
        <td >&nbsp;</td>
        <td colspan='5' >Заочна</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
    </tr>
</table>";




        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $sectionStyle = $section->getSettings();
        $sectionStyle->setOrientation('landscape');
        \PhpOffice\PhpWord\Shared\Html::addHtml($section, $html);

        $phpWord->save("file.docx",'Word2007',true);
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
