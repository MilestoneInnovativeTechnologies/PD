<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceDataTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceData::query()
            ->create([	'id' => '50001', 	'resource' => '50005', 	'name' => 'VisitorDetails', 	'description' => 'View all details of a visitor', 	'title_field' => 'name', 											])
            ->create([	'id' => '50002', 	'resource' => '50004', 	'name' => 'ProductImageStatus', 	'description' => 'Get status of product image', 	'title_field' => 'status', 											])
            ->create([	'id' => '50003', 	'resource' => '50006', 	'name' => 'WishlistDetails', 	'description' => 'Getall details of a wishlist', 	'title_field' => 'name', 											])
            ->create([	'id' => '50004', 	'resource' => '50002', 	'name' => 'GetListDetail', 	'description' => 'Get list property', 	'title_field' => 'list', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
