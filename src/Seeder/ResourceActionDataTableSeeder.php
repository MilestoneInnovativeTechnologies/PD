<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceActionDataTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceActionData::query()
            ->create([	'id' => '50001', 	'resource_action' => '50024', 	'resource_data' => '50003', 													])
            ->create([	'id' => '50002', 	'resource_action' => '50025', 	'resource_data' => '50003', 													])
            ->create([	'id' => '50003', 	'resource_action' => '50028', 	'resource_data' => '50003', 													])
            ->create([	'id' => '50004', 	'resource_action' => '50027', 	'resource_data' => '50003', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
