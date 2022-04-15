<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Http\Services\ClassService;

class NoteSeeder extends Seeder
{
    protected ClassService $service;
    public function __construct(ClassService $service){
        $this->service = $service;
    }
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('note')->insert($this->service->createRandomNote());
    }
}
