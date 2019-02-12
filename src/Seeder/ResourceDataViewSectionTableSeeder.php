<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceDataViewSectionTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceDataViewSection::query()
            ->create([	'id' => '50001', 	'resource_data' => '50001', 		'title_field' => 'name', 		'colspan' => '12', 										])
            ->create([	'id' => '50002', 	'resource_data' => '50001', 	'title' => 'Wish Lists', 		'relation' => '50025', 	'colspan' => '6', 										])
            ->create([	'id' => '50003', 	'resource_data' => '50001', 	'title' => 'Shared Wishlists', 		'relation' => '50026', 	'colspan' => '6', 										])
            ->create([	'id' => '50004', 	'resource_data' => '50003', 		'title_field' => 'name', 		'colspan' => '12', 										])
            ->create([	'id' => '50005', 	'resource_data' => '50003', 	'title' => 'Sharing With', 		'relation' => '50029', 	'colspan' => '12', 										])
            ->create([	'id' => '50006', 	'resource_data' => '50003', 	'title' => 'Products', 		'relation' => '50031', 	'colspan' => '12', 										])
            ->create([	'id' => '50007', 	'resource_data' => '50003', 	'title' => 'Messages/Notes', 		'relation' => '50030', 	'colspan' => '12', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
