<div class="hide">
    <table>
        <tbody class="hideSubject">
        <tr class="subject">
            <td><span class="glyphicon glyphicon-plus addRowQualification"></span></td>
            <td>
                <select name="subject[]">
                    <option value="">Виберіть спеціальність</option>
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->subject}}</option>
                    @endforeach
                </select>

            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
        <tbody class="hideImozemSubject">
        <tr class="subjectImozem">
            <td><span class="glyphicon glyphicon-plus addRowImozemQualification"></span></td>
            <td>
                <select name="subjectInozem[]">
                    <option value="">Виберіть спеціальність</option>
                    @foreach($subjects as $subject)
                        <option value="{{$subject->id}}">{{$subject->subject}}</option>
                    @endforeach
                </select>

            </td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>

        <tbody class="hideAsp">
        <tr class="subject">
            <td><span class="glyphicon glyphicon-plus addRowAsp"></span></td>
            <td>Аспірантура</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
        <tbody class="hideInozem">
        <tr class="subject">
            <td><span class="glyphicon glyphicon-plus addRowImozem"></span></td>
            <td>Іноземці</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>

        <tbody id="hideRowDoctor">
        <tr>
            <td><span class="glyphicon glyphicon-minus removeRowQualification"></span></td>
            <td>
                <input type="hidden" name="doctor[name]" value="doc">
                Докторнатура

            </td>
            <td><input type="number" name="doctor[freeD]"></td>
            <td><input type="number" name="doctor[payD]"></td>
            <td></td>
            <td><input type="number" name="doctor[freeZ]"></td>
            <td><input type="number" name="doctor[payZ]"></td>
        </tr>
        </tbody>

        <tbody class="hideRowQualification">
        <tr>
            <td><span class="glyphicon glyphicon-minus removeRowQualification"></span></td>
            <td>
                <select name="table[0][row_][qualification]">
                    <option>бакалаври</option>
                    <option>спеціалісти</option>
                    <option>магістри V</option>
                    <option>магістри VI</option>
                </select>
            </td>
            <td><input type="number" name="table[0][row_][freeD]"></td>
            <td><input type="number" name="table[0][row_][payD]"></td>
            <td></td>
            <td><input type="number" name="table[0][row_][freeZ]"></td>
            <td><input type="number" name="table[0][row_][payZ]"></td>
        </tr>
        </tbody>

        <tbody class="hideRowInozemQualification">
        <tr>
            <td><span class="glyphicon glyphicon-minus removeRowQualification"></span></td>
            <td>
                <select name="inozem[0][row_][qualification]">
                    <option>бакалаври</option>
                    <option>спеціалісти</option>
                    <option>магістри V</option>
                    <option>магістри VI</option>
                </select>
            </td>
            <td><input type="number" name="inozem[0][row_][freeD]"></td>
            <td><input type="number" name="inozem[0][row_][payD]"></td>
            <td></td>
            <td><input type="number" name="inozem[0][row_][freeZ]"></td>
            <td><input type="number" name="inozem[0][row_][payZ]"></td>
        </tr>
        </tbody>

        <tbody class="hideOther">
        <tr>
            <td><span class="glyphicon glyphicon-minus removeRowQualification"></span></td>
            <td>
                <select name="other[0][row_][qualification]">
                    <option value="">Виберіть науку</option>
                    @foreach($aspirantura as $asp)
                        <option value="{{$asp->id}}">{{$asp->subject}}</option>
                    @endforeach
                </select>
            </td>
            <td><input type="number" name="other[0][row_][freeD]"></td>
            <td><input type="number" name="other[0][row_][payD]"></td>
            <td></td>
            <td><input type="number" name="other[0][row_][freeZ]"></td>
            <td><input type="number" name="other[0][row_][payZ]"></td>
        </tr>
        </tbody>
    </table>
</div>