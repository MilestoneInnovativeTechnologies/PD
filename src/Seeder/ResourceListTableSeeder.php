<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceListTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceList::query()
            ->create([	'id' => '50001', 	'resource' => '50002', 	'name' => 'Group01List', 	'description' => 'List all group 01', 	'title' => 'Categories', 	'identity' => '70', 										])
            ->create([	'id' => '50002', 	'resource' => '50002', 	'name' => 'Group02List', 	'description' => 'List all group 02', 	'title' => 'Brands', 	'identity' => '70', 										])
            ->create([	'id' => '50003', 	'resource' => '50002', 	'name' => 'Group03List', 	'description' => 'List all group 03', 	'title' => 'Size', 	'identity' => '70', 										])
            ->create([	'id' => '50004', 	'resource' => '50002', 	'name' => 'Group04List', 	'description' => 'List all group 04', 	'title' => 'Color', 	'identity' => '70', 										])
            ->create([	'id' => '50005', 	'resource' => '50003', 	'name' => 'ProductsList', 	'description' => 'Liast all products', 	'title' => 'Products', 											])
            ->create([	'id' => '50006', 	'resource' => '50005', 	'name' => 'VisitorsList', 	'description' => 'List all visitors', 	'title' => 'Visitors', 											])
            ->create([	'id' => '50007', 	'resource' => '50006', 	'name' => 'WishlistsList', 	'description' => 'List all wishlists', 	'title' => 'Wishlists', 											])
            ->create([	'id' => '50008', 	'resource' => '50006', 	'name' => 'VendorWishlist', 	'description' => 'List all wshlists in which shared with vendor', 	'title' => 'Wishlists', 											])
            ->create([	'id' => '50009', 	'resource' => '50009', 	'name' => 'WishlistNotesList', 	'description' => 'Messages for a wishlist', 	'title' => 'Messages/Notes', 											])
            ->create([	'id' => '50010', 	'resource' => '50004', 	'name' => 'ProductImagesList', 	'description' => 'List product images', 	'title' => 'Images', 	'identity' => '10', 										])
            ->create([	'id' => '50011', 	'resource' => '50010', 	'name' => 'WishlistItemsList', 	'description' => 'List items in a wishlist', 	'title' => 'Products', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
