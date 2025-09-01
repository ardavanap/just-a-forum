<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;


class RollSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('rolls')
            ->insert([
                ['title' => 'admin', 'description' => 'has all privilages'],
                ['title' => 'user', 'description' => 'has user privilages'],
            ]);
    }
}
