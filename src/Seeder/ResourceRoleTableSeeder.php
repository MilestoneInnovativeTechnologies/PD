<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceRoleTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceRole::query()
            ->create([	'id' => '50001', 	'resource' => '50001', 	'role' => '50001', 	'actions_availability' => 'All', 												])
            ->create([	'id' => '50002', 	'resource' => '50002', 	'role' => '50001', 	'actions_availability' => 'All', 												])
            ->create([	'id' => '50003', 	'resource' => '50003', 	'role' => '50001', 	'actions_availability' => 'All', 												])
            ->create([	'id' => '50004', 	'resource' => '50004', 	'role' => '50001', 	'actions_availability' => 'All', 												])
            ->create([	'id' => '50005', 	'resource' => '50005', 	'role' => '50001', 	'actions_availability' => 'All', 												])
            ->create([	'id' => '50006', 	'resource' => '50006', 	'role' => '50001', 	'actions_availability' => 'All', 												])
            ->create([	'id' => '50007', 	'resource' => '50007', 	'role' => '50001', 	'actions_availability' => 'All', 												])
            ->create([	'id' => '50008', 	'resource' => '50008', 	'role' => '50001', 	'actions_availability' => 'All', 												])
            ->create([	'id' => '50009', 	'resource' => '50009', 	'role' => '50001', 	'actions_availability' => 'All', 												])
            ->create([	'id' => '50010', 	'resource' => '50010', 	'role' => '50001', 	'actions_availability' => 'All', 												])
            ->create([	'id' => '50011', 	'resource' => '50011', 	'role' => '50001', 	'actions_availability' => 'All', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
