<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceScopeTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceScope::query()
            ->create([	'id' => '50001', 	'resource' => '50002', 	'name' => 'Group', 	'description' => 'Group Items', 	'method' => 'group', 											])
            ->create([	'id' => '50002', 	'resource' => '50006', 	'name' => 'WishlistVendorActive', 	'description' => 'Wishlists which are shared with vendor', 	'method' => 'vendorShare', 											])
            ->create([	'id' => '50003', 	'resource' => '50004', 	'name' => 'ImageStatus', 	'description' => 'Get image status', 	'method' => 'statusOnly', 											])
            ->create([	'id' => '50004', 	'resource' => '50002', 	'name' => 'GroupWeb', 	'description' => 'Item group which are listable on web', 	'method' => 'web', 											])
            ->create([	'id' => '50005', 	'resource' => '50002', 	'name' => 'GroupList', 	'description' => 'Get list property', 	'method' => 'listOnly', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
