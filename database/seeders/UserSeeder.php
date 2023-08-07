<?php

namespace Database\Seeders;

use Database\Seeders\Traits\DisableForeginKey;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Database\Seeders\Traits\TruncateTable;

class UserSeeder extends Seeder
{
    use TruncateTable,DisableForeginKey;
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       $this->disableforeignkeys();

       $this->truncate('users');

       $users = \App\Models\User::factory(10)->create();

       $this->enableforeignkeys();


    }
}
