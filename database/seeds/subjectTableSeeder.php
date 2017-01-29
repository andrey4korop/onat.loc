<?php

use Illuminate\Database\Seeder;
use App\Subject;

class subjectTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subjects = new Subject;

        $subjects->create(['subject' =>'Економіка і прідприємництво']);
        $subjects->create(['subject' =>'Менеджмент']);
        $subjects->create(['subject' =>'Соціологія']);
        $subjects->create(['subject' =>'Телекомунікації']);
        $subjects->create(['subject' =>'Інформаційна безпека']);
        $subjects->create(['subject' =>'Системи технічного захисту інформації']);
        $subjects->create(['subject' =>'Радіотехніка']);
        $subjects->create(['subject' =>'Автоматизація та комп\'ютерно інтегровані технології']);
        $subjects->create(['subject' =>'Поштовий зв\'язок']);
        $subjects->create(['subject' =>'Іноземці']);
        $subjects->create(['subject' =>'Програмна інженерія']);
        $subjects->create(['subject' =>'Реклама і звязки згромадкістю']);
        $subjects->create(['subject' =>'Аспірантура','other'=>'1']);
        $subjects->create(['subject' =>'Економічні науки','other'=>'2']);
        $subjects->create(['subject' =>'Технічні науки','other'=>'2']);
        $subjects->create(['subject' =>'Філософські науки','other'=>'2']);
        $subjects->create(['subject' =>'Докторантура','other'=>'1']);
    }
}

