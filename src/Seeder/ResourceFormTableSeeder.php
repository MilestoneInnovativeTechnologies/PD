<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceForm::query()
            ->create([	'id' => '50001', 	'resource' => '50004', 	'name' => 'AddProductImageForm', 	'description' => 'Form to add image for a product', 	'title' => 'Add Product Image', 	'action_text' => 'Add Image', 										])
            ->create([	'id' => '50002', 	'resource' => '50004', 	'name' => 'ChangeImageStatus', 	'description' => 'Make a product image status to active or inactive', 	'title' => 'Change Image Status', 	'action_text' => 'Update Status', 										])
            ->create([	'id' => '50003', 	'resource' => '50005', 	'name' => 'Add New Visitor', 	'description' => 'Create a new visitor', 	'title' => 'Add Visitor', 	'action_text' => 'Add Visitor', 										])
            ->create([	'id' => '50004', 	'resource' => '50006', 	'name' => 'CreateNewWishlistForm', 	'description' => 'A form to create a new wishlist', 	'title' => 'Create Wish List', 	'action_text' => 'Create Wish List', 										])
            ->create([	'id' => '50005', 	'resource' => '50006', 	'name' => 'UpdateWishlistForm', 	'description' => 'Form used to update wishlist details', 	'title' => 'Update Wish List Details', 	'action_text' => 'Update', 										])
            ->create([	'id' => '50006', 	'resource' => '50005', 	'name' => 'AddWishlistVisitorForm', 	'description' => 'Share wishlist with a visitor', 	'title' => 'Add Visitor', 	'action_text' => 'Add Visitor', 										])
            ->create([	'id' => '50007', 	'resource' => '50009', 	'name' => 'AddWishlistNote', 	'description' => 'Add a message to wishlist', 	'title' => 'New Message', 	'action_text' => 'Add Message', 										])
            ->create([	'id' => '50008', 	'resource' => '50002', 	'name' => 'ChangeItemGroupWebListForm', 	'description' => 'Change the item group web listing state', 	'title' => 'Change Listing property', 	'action_text' => 'Update', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
