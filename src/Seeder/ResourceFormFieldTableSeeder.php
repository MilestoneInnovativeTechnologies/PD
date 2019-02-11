<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormFieldTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormField::query()
            ->create([	'id' => '50001', 	'resource_form' => '50001', 	'name' => 'product', 	'type' => 'text', 	'label' => 'Product ID', 											])
            ->create([	'id' => '50002', 	'resource_form' => '50001', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Name (if any)', 											])
            ->create([	'id' => '50003', 	'resource_form' => '50001', 	'name' => 'image', 	'type' => 'file', 	'label' => 'Image File', 											])
            ->create([	'id' => '50004', 	'resource_form' => '50001', 	'name' => 'default', 	'type' => 'select', 	'label' => 'default', 											])
            ->create([	'id' => '50005', 	'resource_form' => '50002', 	'name' => 'status', 	'type' => 'select', 	'label' => 'Change Status to', 											])
            ->create([	'id' => '50006', 	'resource_form' => '50003', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Visitors Name', 											])
            ->create([	'id' => '50007', 	'resource_form' => '50003', 	'name' => 'email', 	'type' => 'text', 	'label' => 'Email Address', 											])
            ->create([	'id' => '50008', 	'resource_form' => '50003', 	'name' => 'number', 	'type' => 'text', 	'label' => 'Contact Number', 											])
            ->create([	'id' => '50009', 	'resource_form' => '50004', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Wish List Name', 											])
            ->create([	'id' => '50010', 	'resource_form' => '50004', 	'name' => 'description', 	'type' => 'textarea', 	'label' => 'Description (if any)', 											])
            ->create([	'id' => '50011', 	'resource_form' => '50004', 	'name' => 'products', 	'type' => 'multiselect', 	'label' => 'Select Products', 											])
            ->create([	'id' => '50012', 	'resource_form' => '50005', 	'name' => 'name', 	'type' => 'text', 	'label' => 'Wish List Name', 											])
            ->create([	'id' => '50013', 	'resource_form' => '50005', 	'name' => 'description', 	'type' => 'textarea', 	'label' => 'Description (if any)', 											])
            ->create([	'id' => '50014', 	'resource_form' => '50006', 	'name' => 'wishlist', 	'type' => 'text', 	'label' => 'Wishlist', 											])
            ->create([	'id' => '50015', 	'resource_form' => '50006', 	'name' => 'visitor', 	'type' => 'select', 	'label' => 'Select Visitor', 											])
            ->create([	'id' => '50016', 	'resource_form' => '50007', 	'name' => 'wishlist', 	'type' => 'text', 	'label' => 'Wishlist', 											])
            ->create([	'id' => '50017', 	'resource_form' => '50007', 	'name' => 'note', 	'type' => 'textarea', 	'label' => 'Message/Note', 											])
            ->create([	'id' => '50018', 	'resource_form' => '50008', 	'name' => 'list', 	'type' => 'select', 	'label' => 'List on Web', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
