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
            ->create([	'id' => '50001', 	'resource_data' => '50001', 	'relation' => '50025', 	'nest_relation1' => '50032', 												])
            ->create([	'id' => '50002', 	'resource_data' => '50001', 	'relation' => '50026', 	'nest_relation1' => '50032', 												])
            ->create([	'id' => '50003', 	'resource_data' => '50003', 	'relation' => '50027', 													])
            ->create([	'id' => '50004', 	'resource_data' => '50003', 	'relation' => '50028', 													])
            ->create([	'id' => '50005', 	'resource_data' => '50003', 	'relation' => '50029', 													])
            ->create([	'id' => '50006', 	'resource_data' => '50003', 	'relation' => '50030', 	'nest_relation1' => '50035', 												])
            ->create([	'id' => '50007', 	'resource_data' => '50003', 	'relation' => '50031', 	'nest_relation1' => '50040', 												])
            ->create([	'id' => '50008', 	'resource_data' => '50003', 	'relation' => '50031', 	'nest_relation1' => '50037', 												])
            ->create([	'id' => '50009', 	'resource_data' => '50003', 	'relation' => '50031', 	'nest_relation1' => '50038', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
