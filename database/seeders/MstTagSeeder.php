<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MstTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $params = [
            ['id' => 1, 'name' => '家事'],
            ['id' => 2, 'name' => '勉強'],
            ['id' => 3, 'name' => '運動'],
            ['id' => 4, 'name' => '食事'],
            ['id' => 5, 'name' => '移動'],
        ];
        DB::table('mst_tags')->insert($params);
    }
    
}
