<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceActionListTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceActionList::query()
            ->create([	'id' => '50001', 	'resource_action' => '50011', 	'resource_list' => '50001', 													])
            ->create([	'id' => '50002', 	'resource_action' => '50012', 	'resource_list' => '50002', 													])
            ->create([	'id' => '50003', 	'resource_action' => '50013', 	'resource_list' => '50003', 													])
            ->create([	'id' => '50004', 	'resource_action' => '50014', 	'resource_list' => '50004', 													])
            ->create([	'id' => '50005', 	'resource_action' => '50015', 	'resource_list' => '50005', 													])
            ->create([	'id' => '50006', 	'resource_action' => '50016', 	'resource_list' => '50005', 													])
            ->create([	'id' => '50007', 	'resource_action' => '50017', 	'resource_list' => '50010', 													])
            ->create([	'id' => '50008', 	'resource_action' => '50018', 	'resource_list' => '50006', 													])
            ->create([	'id' => '50009', 	'resource_action' => '50019', 	'resource_list' => '50006', 													])
            ->create([	'id' => '50010', 	'resource_action' => '50020', 	'resource_list' => '50007', 													])
            ->create([	'id' => '50011', 	'resource_action' => '50021', 	'resource_list' => '50007', 													])
            ->create([	'id' => '50012', 	'resource_action' => '50022', 	'resource_list' => '50006', 													])
            ->create([	'id' => '50013', 	'resource_action' => '50023', 	'resource_list' => '50007', 													])
            ->create([	'id' => '50014', 	'resource_action' => '50024', 	'resource_list' => '50007', 													])
            ->create([	'id' => '50015', 	'resource_action' => '50025', 	'resource_list' => '50007', 													])
            ->create([	'id' => '50016', 	'resource_action' => '50026', 	'resource_list' => '50007', 													])
            ->create([	'id' => '50017', 	'resource_action' => '50028', 	'resource_list' => '50007', 													])
            ->create([	'id' => '50018', 	'resource_action' => '50029', 	'resource_list' => '50001', 													])
            ->create([	'id' => '50019', 	'resource_action' => '50029', 	'resource_list' => '50002', 													])
            ->create([	'id' => '50020', 	'resource_action' => '50029', 	'resource_list' => '50003', 													])
            ->create([	'id' => '50021', 	'resource_action' => '50029', 	'resource_list' => '50004', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
