<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceListRelationTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceListRelation::query()
            ->create([	'id' => '50001', 	'resource_list' => '50008', 	'relation' => '50027', 													])
            ->create([	'id' => '50002', 	'resource_list' => '50005', 	'relation' => '50013', 													])
            ->create([	'id' => '50003', 	'resource_list' => '50005', 	'relation' => '50014', 													])
            ->create([	'id' => '50004', 	'resource_list' => '50005', 	'relation' => '50015', 													])
            ->create([	'id' => '50005', 	'resource_list' => '50005', 	'relation' => '50016', 													])
            ->create([	'id' => '50006', 	'resource_list' => '50007', 	'relation' => '50027', 													])
            ->create([	'id' => '50007', 	'resource_list' => '50009', 	'relation' => '50035', 													])
            ->create([	'id' => '50008', 	'resource_list' => '50011', 	'relation' => '50040', 													])
            ->create([	'id' => '50009', 	'resource_list' => '50011', 	'relation' => '50037', 													])
            ->create([	'id' => '50010', 	'resource_list' => '50011', 	'relation' => '50038', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
