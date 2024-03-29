<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        try {
            DB::beginTransaction();

            $this->call([
                UserSeeder::class,
                HomeSeeder::class,
                AboutSeeder::class,
                SkillSeeder::class,
                QualificationSeeder::class,
                PortfolioSeeder::class,
                ContactSeeder::class,
                BlogSeeder::class,
                MessageSeeder::class,
            ]);

            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
