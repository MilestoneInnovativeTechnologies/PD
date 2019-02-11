<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceActionMethodTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceActionMethod::query()
            ->create([	'id' => '50001', 	'resource_action' => '50001', 	'type' => 'List', 	'idn1' => '50001', 												])
            ->create([	'id' => '50002', 	'resource_action' => '50002', 	'type' => 'List', 	'idn1' => '50002', 												])
            ->create([	'id' => '50003', 	'resource_action' => '50003', 	'type' => 'List', 	'idn1' => '50003', 												])
            ->create([	'id' => '50004', 	'resource_action' => '50004', 	'type' => 'List', 	'idn1' => '50004', 												])
            ->create([	'id' => '50005', 	'resource_action' => '50005', 	'type' => 'List', 	'idn1' => '50005', 												])
            ->create([	'id' => '50006', 	'resource_action' => '50006', 	'type' => 'List', 	'idn1' => '50006', 												])
            ->create([	'id' => '50007', 	'resource_action' => '50007', 	'type' => 'Form', 	'idn1' => '50003', 												])
            ->create([	'id' => '50008', 	'resource_action' => '50008', 	'type' => 'List', 	'idn1' => '50007', 												])
            ->create([	'id' => '50009', 	'resource_action' => '50009', 	'type' => 'Form', 	'idn1' => '50004', 												])
            ->create([	'id' => '50010', 	'resource_action' => '50010', 	'type' => 'List', 	'idn1' => '50008', 												])
            ->create([	'id' => '50011', 	'resource_action' => '50011', 	'type' => 'ListRelation', 	'idn1' => '50001', 	'idn2' => '50005', 											])
            ->create([	'id' => '50012', 	'resource_action' => '50012', 	'type' => 'ListRelation', 	'idn1' => '50002', 	'idn2' => '50005', 											])
            ->create([	'id' => '50013', 	'resource_action' => '50013', 	'type' => 'ListRelation', 	'idn1' => '50003', 	'idn2' => '50005', 											])
            ->create([	'id' => '50014', 	'resource_action' => '50014', 	'type' => 'ListRelation', 	'idn1' => '50004', 	'idn2' => '50005', 											])
            ->create([	'id' => '50015', 	'resource_action' => '50015', 	'type' => 'AddRelation', 	'idn1' => '50009', 	'idn2' => '50001', 											])
            ->create([	'id' => '50016', 	'resource_action' => '50016', 	'type' => 'ListRelation', 	'idn1' => '50009', 	'idn2' => '50010', 											])
            ->create([	'id' => '50017', 	'resource_action' => '50017', 	'type' => 'FormWithData', 	'idn1' => '50002', 	'idn2' => '50002', 											])
            ->create([	'id' => '50018', 	'resource_action' => '50018', 	'type' => 'ListRelation', 	'idn1' => '50011', 	'idn2' => '50007', 											])
            ->create([	'id' => '50019', 	'resource_action' => '50019', 	'type' => 'ListRelation', 	'idn1' => '50012', 	'idn2' => '50007', 											])
            ->create([	'id' => '50020', 	'resource_action' => '50020', 	'type' => 'ListRelation', 	'idn1' => '50015', 	'idn2' => '50006', 											])
            ->create([	'id' => '50021', 	'resource_action' => '50021', 	'type' => 'ListRelation', 	'idn1' => '50017', 	'idn2' => '50011', 											])
            ->create([	'id' => '50022', 	'resource_action' => '50022', 	'type' => 'Data', 	'idn1' => '50001', 												])
            ->create([	'id' => '50023', 	'resource_action' => '50023', 	'type' => 'ListRelation', 	'idn1' => '50016', 	'idn2' => '50009', 											])
            ->create([	'id' => '50024', 	'resource_action' => '50024', 	'type' => 'ManageRelation', 	'idn1' => '50018', 	'idn2' => '50005', 											])
            ->create([	'id' => '50025', 	'resource_action' => '50025', 	'type' => 'AddRelation', 	'idn1' => '50028', 	'idn2' => '50006', 											])
            ->create([	'id' => '50026', 	'resource_action' => '50026', 	'type' => 'Data', 	'idn1' => '50003', 												])
            ->create([	'id' => '50027', 	'resource_action' => '50027', 	'type' => 'FormWithData', 	'idn1' => '50005', 	'idn2' => '50003', 											])
            ->create([	'id' => '50028', 	'resource_action' => '50028', 	'type' => 'AddRelation', 	'idn1' => '50016', 	'idn2' => '50007', 											])
            ->create([	'id' => '50029', 	'resource_action' => '50029', 	'type' => 'FormWithData', 	'idn1' => '50008', 	'idn2' => '50004', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
