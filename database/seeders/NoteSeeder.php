<?php

namespace Database\Seeders;

use App\Models\Note;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NoteSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('notes')->truncate();

        $notesMock = [
            [
                'title' => 'test',
                'description' => 'test 1.'
            ],
            [
                'title' => 'test2',
                'description' => 'test 2.'
            ],
        ];

        Note::insert($notesMock);
    }
}
