<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceDataRelationTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceDataRelation::query()
            ->create([	'id' => '50001', 	'resource_data' => '50001', 	'relation' => '50011', 	'nest_relation1' => '50018', 												])
            ->create([	'id' => '50002', 	'resource_data' => '50001', 	'relation' => '50012', 	'nest_relation1' => '50018', 												])
            ->create([	'id' => '50003', 	'resource_data' => '50003', 	'relation' => '50013', 													])
            ->create([	'id' => '50004', 	'resource_data' => '50003', 	'relation' => '50014', 													])
            ->create([	'id' => '50005', 	'resource_data' => '50003', 	'relation' => '50015', 													])
            ->create([	'id' => '50006', 	'resource_data' => '50003', 	'relation' => '50016', 	'nest_relation1' => '50021', 												])
            ->create([	'id' => '50007', 	'resource_data' => '50003', 	'relation' => '50017', 	'nest_relation1' => '50026', 												])
            ->create([	'id' => '50008', 	'resource_data' => '50003', 	'relation' => '50017', 	'nest_relation1' => '50023', 												])
            ->create([	'id' => '50009', 	'resource_data' => '50003', 	'relation' => '50017', 	'nest_relation1' => '50024', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
