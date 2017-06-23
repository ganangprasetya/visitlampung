<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(KabupatenSeeder::class);
        $this->call(KecamatanSeeder::class);
        $this->call(LokasiSeeder::class);
        $this->call(JenisobjekwisataSeeder::class);
        $this->call(UsersSeeder::class);
        
    }
}
