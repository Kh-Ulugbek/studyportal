<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CreateCountryFAQSTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $question = array(
            'Зачем учиться в США',
            'Факты о США',
            'Как подать заявку на визу?',
            'Система высшего образования США',
            'После обучение',
        );

        foreach ($question as $item) {
            for ($i = 1; $i < 10; $i++) {
                DB::table('country_f_a_q_s')->insert([
                    'country_id' => $i,
                    'question' => $item,
                    'created_at' => date('Y-m-d H:i:s'),
                    'updated_at' => date('Y-m-d H:i:s')
                ]);
            }
        }

    }
}
