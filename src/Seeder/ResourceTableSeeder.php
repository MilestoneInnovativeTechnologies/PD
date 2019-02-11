<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\Resource::query()
            ->create([	'id' => '50001', 	'name' => 'GroupMaster', 	'description' => 'Group names to which a product can be included', 	'title' => 'Group Masters', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'group_master', 										])
            ->create([	'id' => '50002', 	'name' => 'GroupDetail', 	'description' => 'Group items', 	'title' => 'Group Items', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'group_details', 										])
            ->create([	'id' => '50003', 	'name' => 'Product', 	'description' => 'Product Details', 	'title' => 'Products', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'products', 	'controller' => 'ProductController', 	'controller_namespace' => 'Milestone\PD\Controller', 								])
            ->create([	'id' => '50004', 	'name' => 'ProductImage', 	'description' => 'Images for a product', 	'title' => 'Product Images', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'product_images', 										])
            ->create([	'id' => '50005', 	'name' => 'Visitor', 	'description' => 'Visitor Details', 	'title' => 'Visitors', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'visitors', 	'controller' => 'VisitorController', 	'controller_namespace' => 'Milestone\PD\Controller', 								])
            ->create([	'id' => '50006', 	'name' => 'Wishlist', 	'description' => 'Wishlists created by author or visitor', 	'title' => 'Wishlists', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'wishlists', 	'controller' => 'WishListController', 	'controller_namespace' => 'Milestone\PD\Controller', 								])
            ->create([	'id' => '50007', 	'name' => 'VendorWishlist', 	'description' => 'Wishlists which are shared with vendor', 	'title' => 'Wishlists', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'vendor_wishlists', 										])
            ->create([	'id' => '50008', 	'name' => 'VisitorWishlist', 	'description' => 'Wishlists which are shared among other visitors', 	'title' => 'Wishlists', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'visitor_wishlists', 										])
            ->create([	'id' => '50009', 	'name' => 'WishlistNote', 	'description' => 'Notes added by author or visitors on the basis of a Wishlist', 	'title' => 'Notes', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'wishlist_notes', 	'controller' => 'WishListProductController', 	'controller_namespace' => 'Milestone\PD\Controller', 								])
            ->create([	'id' => '50010', 	'name' => 'WishlistProduct', 	'description' => 'List of products which are added to a wishlist', 	'title' => 'Products', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'wishlist_products', 										])
            ->create([	'id' => '50011', 	'name' => 'WishlistProductNote', 	'description' => 'Notes related to a product in a wishlist', 	'title' => 'Notes', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'wishlist_product_notes', 										])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
