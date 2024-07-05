<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\posts;
use Illuminate\Support\Str;
use Illuminate\Support\Number;
use Illuminate\Database\Seeder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Nette\Utils\Random;

class postSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            'title' => Str::random(10),
            'desc' => Str::random(30),
            'user_id'=>random_int(1,12),

        ]);
    }
}
