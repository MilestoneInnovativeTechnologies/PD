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
            ->create([	'id' => '301', 	'name' => 'ItemGroupMaster', 	'description' => 'Product group details.. Category Brand Size all comes here', 	'title' => 'Item Groups', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'item_group_master', 	 									])
            ->create([	'id' => '302', 	'name' => 'Product', 	'description' => 'Product Details', 	'title' => 'Products', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'products', 	 	'controller' => 'ProductController', 	'controller_namespace' => 'Milestone\PD\Controller', 							])
            ->create([	'id' => '303', 	'name' => 'ProductImage', 	'description' => 'Images for a product', 	'title' => 'Product Images', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'product_images', 	 									])
            ->create([	'id' => '304', 	'name' => 'Visitor', 	'description' => 'Visitor Details', 	'title' => 'Visitors', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'visitors', 	 	'controller' => 'VisitorController', 	'controller_namespace' => 'Milestone\PD\Controller', 							])
            ->create([	'id' => '305', 	'name' => 'Wishlist', 	'description' => 'Wishlists created by author or visitor', 	'title' => 'Wishlists', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'wishlists', 	 	'controller' => 'WishListController', 	'controller_namespace' => 'Milestone\PD\Controller', 							])
            ->create([	'id' => '306', 	'name' => 'VendorWishlist', 	'description' => 'Wishlists which are shared with vendor', 	'title' => 'Wishlists', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'vendor_wishlists', 	 									])
            ->create([	'id' => '307', 	'name' => 'VisitorWishlist', 	'description' => 'Wishlists which are shared among other visitors', 	'title' => 'Wishlists', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'visitor_wishlists', 	 									])
            ->create([	'id' => '308', 	'name' => 'WishlistNote', 	'description' => 'Notes added by author or visitors on the basis of a Wishlist', 	'title' => 'Notes', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'wishlist_notes', 	 	'controller' => 'WishListProductController', 	'controller_namespace' => 'Milestone\PD\Controller', 							])
            ->create([	'id' => '309', 	'name' => 'WishlistProduct', 	'description' => 'List of products which are added to a wishlist', 	'title' => 'Products', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'wishlist_products', 	 									])
            ->create([	'id' => '310', 	'name' => 'WishlistProductNote', 	'description' => 'Notes related to a product in a wishlist', 	'title' => 'Notes', 	'namespace' => 'Milestone\PD\Model', 	'table' => 'wishlist_product_notes', 	 									])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
