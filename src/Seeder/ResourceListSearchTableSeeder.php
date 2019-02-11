<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceListSearchTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceListSearch::query()
            ->create([	'id' => '50001', 	'resource_list' => '50001', 	'field' => 'name', 													])
            ->create([	'id' => '50002', 	'resource_list' => '50002', 	'field' => 'name', 													])
            ->create([	'id' => '50003', 	'resource_list' => '50003', 	'field' => 'name', 													])
            ->create([	'id' => '50004', 	'resource_list' => '50004', 	'field' => 'name', 													])
            ->create([	'id' => '50005', 	'resource_list' => '50005', 	'field' => 'description', 													])
            ->create([	'id' => '50006', 	'resource_list' => '50006', 	'field' => 'name', 													])
            ->create([	'id' => '50007', 	'resource_list' => '50006', 	'field' => 'email', 													])
            ->create([	'id' => '50008', 	'resource_list' => '50006', 	'field' => 'number', 													])
            ->create([	'id' => '50009', 	'resource_list' => '50007', 	'field' => 'name', 													])
            ->create([	'id' => '50010', 	'resource_list' => '50007', 	'field' => 'description', 													])
            ->create([	'id' => '50011', 	'resource_list' => '50008', 	'field' => 'name', 													])
            ->create([	'id' => '50012', 	'resource_list' => '50008', 	'field' => 'description', 													])
            ->create([	'id' => '50013', 	'resource_list' => '50009', 	'field' => 'note', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
