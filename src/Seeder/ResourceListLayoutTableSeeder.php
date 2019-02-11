<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceListLayoutTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceListLayout::query()
            ->create([	'id' => '50001', 	'resource_list' => '50001', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '50002', 	'resource_list' => '50001', 	'label' => 'Web List', 	'field' => 'list', 												])
            ->create([	'id' => '50003', 	'resource_list' => '50001', 	'label' => 'Type', 	'field' => 'type', 												])
            ->create([	'id' => '50004', 	'resource_list' => '50001', 	'label' => 'Status', 	'field' => 'status', 												])
            ->create([	'id' => '50005', 	'resource_list' => '50002', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '50006', 	'resource_list' => '50002', 	'label' => 'Web List', 	'field' => 'list', 												])
            ->create([	'id' => '50007', 	'resource_list' => '50002', 	'label' => 'Type', 	'field' => 'type', 												])
            ->create([	'id' => '50008', 	'resource_list' => '50002', 	'label' => 'Status', 	'field' => 'status', 												])
            ->create([	'id' => '50009', 	'resource_list' => '50003', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '50010', 	'resource_list' => '50003', 	'label' => 'Web List', 	'field' => 'list', 												])
            ->create([	'id' => '50011', 	'resource_list' => '50003', 	'label' => 'Type', 	'field' => 'type', 												])
            ->create([	'id' => '50012', 	'resource_list' => '50003', 	'label' => 'Status', 	'field' => 'status', 												])
            ->create([	'id' => '50013', 	'resource_list' => '50004', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '50014', 	'resource_list' => '50004', 	'label' => 'Web List', 	'field' => 'list', 												])
            ->create([	'id' => '50015', 	'resource_list' => '50004', 	'label' => 'Type', 	'field' => 'type', 												])
            ->create([	'id' => '50016', 	'resource_list' => '50004', 	'label' => 'Status', 	'field' => 'status', 												])
            ->create([	'id' => '50017', 	'resource_list' => '50005', 	'label' => 'Name', 	'field' => 'name', 	'relation' => '50008', 											])
            ->create([	'id' => '50018', 	'resource_list' => '50005', 	'label' => 'Group 01', 	'field' => 'name', 	'relation' => '50005', 											])
            ->create([	'id' => '50019', 	'resource_list' => '50005', 	'label' => 'Group 02', 	'field' => 'name', 	'relation' => '50006', 											])
            ->create([	'id' => '50020', 	'resource_list' => '50005', 	'label' => 'Code', 	'field' => 'code', 												])
            ->create([	'id' => '50021', 	'resource_list' => '50005', 	'label' => 'Gender', 	'field' => 'narration2', 												])
            ->create([	'id' => '50022', 	'resource_list' => '50006', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '50023', 	'resource_list' => '50006', 	'label' => 'Email', 	'field' => 'email', 												])
            ->create([	'id' => '50024', 	'resource_list' => '50006', 	'label' => 'Number', 	'field' => 'number', 												])
            ->create([	'id' => '50025', 	'resource_list' => '50007', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '50026', 	'resource_list' => '50007', 	'label' => 'Author', 	'field' => 'name', 	'relation' => '50013', 											])
            ->create([	'id' => '50027', 	'resource_list' => '50007', 	'label' => 'Description', 	'field' => 'description', 												])
            ->create([	'id' => '50028', 	'resource_list' => '50008', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '50029', 	'resource_list' => '50008', 	'label' => 'Author', 	'field' => 'name', 	'relation' => '50013', 											])
            ->create([	'id' => '50030', 	'resource_list' => '50008', 	'label' => 'Description', 	'field' => 'description', 												])
            ->create([	'id' => '50031', 	'resource_list' => '50009', 	'label' => 'ID', 	'field' => 'id', 												])
            ->create([	'id' => '50032', 	'resource_list' => '50009', 	'label' => 'Message', 	'field' => 'note', 												])
            ->create([	'id' => '50033', 	'resource_list' => '50009', 	'label' => 'Author', 	'field' => 'name', 	'relation' => '50021', 											])
            ->create([	'id' => '50034', 	'resource_list' => '50010', 	'label' => 'Name', 	'field' => 'name', 												])
            ->create([	'id' => '50035', 	'resource_list' => '50010', 	'label' => 'Status', 	'field' => 'status', 												])
            ->create([	'id' => '50036', 	'resource_list' => '50011', 	'label' => 'Product', 	'field' => 'name', 	'relation' => '50026', 											])
            ->create([	'id' => '50037', 	'resource_list' => '50011', 	'label' => 'Added By', 	'field' => 'name', 	'relation' => '50023', 											])
            ->create([	'id' => '50038', 	'resource_list' => '50011', 	'label' => 'Removed By', 	'field' => 'name', 	'relation' => '50024', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
