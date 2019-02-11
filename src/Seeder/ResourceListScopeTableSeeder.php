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
            ->create([	'id' => '50001', 	'resource_list' => '50001', 	'scope' => '50001', 													])
            ->create([	'id' => '50002', 	'resource_list' => '50002', 	'scope' => '50002', 													])
            ->create([	'id' => '50003', 	'resource_list' => '50003', 	'scope' => '50003', 													])
            ->create([	'id' => '50004', 	'resource_list' => '50004', 	'scope' => '50004', 													])
            ->create([	'id' => '50005', 	'resource_list' => '50008', 	'scope' => '50005', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
