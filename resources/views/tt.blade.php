<table  class="table table-bordered">
    <thead>
    <tr>
        <td rowspan="2">№<br>п/п</td>
        <td rowspan="2">форма навчання</td>
        <td colspan="2">контингент</td>
        <td rowspan="2">норматив<br>пост</td>
        <td colspan="2">кількість ставок</td>
        <td></td>
        <td colspan="2">контингент</td>
        <td rowspan="2">норматив<br>пост</td>
        <td colspan="2">кількість ставок</td>
        <td colspan="3">всього ставок пвп</td>
    </tr>
    <tr>
        <td>б</td>
        <td>к</td>
        <td>б</td>
        <td>к</td>
        <td></td>
        <td>б</td>
        <td>к</td>
        <td>б</td>
        <td>к</td>
        <td>б</td>
        <td>к</td>
        <td>б+к</td>
    </tr>
    <tr>
        <td></td>
        <td></td>
        <td colspan="5">денна форма навчання</td>
        <td></td>
        <td colspan="5">заочна форма навчання</td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </thead>
    <tbody>
    @foreach($subject as $s)
        <tr>
            <td>{{$subjectRows[$s]['num']}}</td>
            <td>!!!!!! предмет №{{$s}}</td>
            <td>{{$subjectRows[$s]['freeD']}}</td>
            <td>{{$subjectRows[$s]['payD']}}</td>
            <td></td>
            <td>{{$subjectRows[$s]['stavkaFD']}}</td>
            <td>{{$subjectRows[$s]['stavkaPD']}}</td>
            <td></td>
            <td>{{$subjectRows[$s]['freeZ']}}</td>
            <td>{{$subjectRows[$s]['payZ']}}</td>
            <td></td>
            <td>{{$subjectRows[$s]['stavkaFZ']}}</td>
            <td>{{$subjectRows[$s]['stavkaPZ']}}</td>
            <td>{{$subjectRows[$s]['allF']}}</td>
            <td>{{$subjectRows[$s]['allP']}}</td>
            <td>{{$subjectRows[$s]['all']}}</td>
        </tr>
        @foreach($table[$s] as $row)
            <tr>
                <td></td>
                <td>{{$row['qualification']}}</td>
                <td>{{$row['freeD']}}</td>
                <td>{{$row['payD']}}</td>
                <td>!{{$row['normD']}}</td>
                <td>{{$row['stavkaFD']}}</td>
                <td>{{$row['stavkaPD']}}</td>
                <td></td>
                <td>{{$row['freeZ']}}</td>
                <td>{{$row['payZ']}}</td>
                <td>!{{$row['normZ']}}</td>
                <td>{{$row['stavkaFZ']}}</td>
                <td>{{$row['stavkaPZ']}}</td>
                <td>{{$row['allF']}}</td>
                <td>{{$row['allP']}}</td>
                <td>{{$row['all']}}</td>
            </tr>
        @endforeach
    @endforeach


    </tbody>
</table>