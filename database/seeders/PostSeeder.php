<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableForeginKey;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PostSeeder extends Seeder
{
    use TruncateTable,DisableForeginKey;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableforeignkeys();

        $this->truncate('posts');

        $users = \App\Models\Post::factory(3)->untitled()->create();

        $this->enableforeignkeys();
    }
}
