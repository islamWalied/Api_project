<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableForeginKey;
use Database\Seeders\Traits\TruncateTable;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    use DisableForeginKey,TruncateTable;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->disableforeignkeys();

        $this->truncate('comments');

        $users = \App\Models\Comment::factory(3)->create();

        $this->enableforeignkeys();
    }
}
