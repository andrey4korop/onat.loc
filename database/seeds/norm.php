<?php

use Illuminate\Database\Seeder;

use App\Subject;
class norm extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $subjects = Subject::all();
        $norm = new App\Norm;
        foreach ($subjects as $s) {

            $norm->create(['id_subject' => $s->id,
                            'name' => 'бакалаври',
                            'normD' => 10,
                            'normZ' => 10            
            ]);
            $norm->create(['id_subject' => $s->id,
                'name' => 'спеціалісти',
                'normD' => 10,
                'normZ' => 10
            ]);
            $norm->create(['id_subject' => $s->id,
                'name' => 'магістри V',
                'normD' => 10,
                'normZ' => 10
            ]);
            $norm->create(['id_subject' => $s->id,
                'name' => 'магістри VI',
                'normD' => 10,
                'normZ' => 10
            ]);
            
        }
    }


}
