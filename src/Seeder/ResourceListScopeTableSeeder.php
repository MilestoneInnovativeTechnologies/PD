<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceListScopeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $_ = \DB::statement('SELECT @@GLOBAL.foreign_key_checks');
        \DB::statement('set foreign_key_checks = 0');
        \Milestone\Appframe\Model\ResourceListScope::query()
            ->create([	'id' => '50001', 	'resource_list' => '50008', 	'scope' => '50002', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
