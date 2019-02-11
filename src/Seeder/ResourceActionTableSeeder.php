<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceActionTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceAction::query()
            ->create([	'id' => '50001', 	'resource' => '50002', 	'name' => 'CategoryListAction', 	'description' => 'Action to call list of categories', 	'title' => 'Categories', 		'menu' => 'Categories', 									])
            ->create([	'id' => '50002', 	'resource' => '50002', 	'name' => 'BrandsListAction', 	'description' => 'Action to call list of brands', 	'title' => 'Brands', 		'menu' => 'Brands', 									])
            ->create([	'id' => '50003', 	'resource' => '50002', 	'name' => 'SizeListAction', 	'description' => 'Action to call list of size', 	'title' => 'Sizes', 		'menu' => 'Size', 									])
            ->create([	'id' => '50004', 	'resource' => '50002', 	'name' => 'ColorListAction', 	'description' => 'Action to call list of colors', 	'title' => 'Colors', 		'menu' => 'Colors', 									])
            ->create([	'id' => '50005', 	'resource' => '50003', 	'name' => 'ProductsListAction', 	'description' => 'Action to list all products', 	'title' => 'Products', 		'menu' => 'Products', 									])
            ->create([	'id' => '50006', 	'resource' => '50005', 	'name' => 'VisitorListAction', 	'description' => 'Action to list all visitor', 	'title' => 'Visitors', 		'menu' => 'Visitors', 									])
            ->create([	'id' => '50007', 	'resource' => '50005', 	'name' => 'VisitorAddAction', 	'description' => 'Action to add a visitor', 	'title' => 'Add Visitor', 		'menu' => 'Create Visitor', 									])
            ->create([	'id' => '50008', 	'resource' => '50006', 	'name' => 'WishlistListAction', 	'description' => 'Action to list all wishlist', 	'title' => 'Wishlists', 		'menu' => 'Wishlists', 									])
            ->create([	'id' => '50009', 	'resource' => '50006', 	'name' => 'WishlistCreateAction', 	'description' => 'Action to create a wishlist', 	'title' => 'Create a Wish List', 		'menu' => 'Create Wish List', 									])
            ->create([	'id' => '50010', 	'resource' => '50006', 	'name' => 'VendorWishlistAction', 	'description' => 'Action to list all wishlists which are shared with vendor', 	'title' => 'Wish Lists', 		'menu' => 'Vendor Wishlists', 									])
            ->create([	'id' => '50011', 	'resource' => '50002', 	'name' => 'CategoryProductsListAction', 	'description' => 'Action to list all products of a category', 	'title' => 'Products', 											])
            ->create([	'id' => '50012', 	'resource' => '50002', 	'name' => 'BrandProductsListAction', 	'description' => 'Action to list all products of a brand', 	'title' => 'Products', 											])
            ->create([	'id' => '50013', 	'resource' => '50002', 	'name' => 'SizeProductsListAction', 	'description' => 'Action to list all products of a size', 	'title' => 'Products', 											])
            ->create([	'id' => '50014', 	'resource' => '50002', 	'name' => 'ColorProductsListAction', 	'description' => 'Action to list all products of a color', 	'title' => 'Products', 											])
            ->create([	'id' => '50015', 	'resource' => '50003', 	'name' => 'AddProductImageAction', 	'description' => 'Action to add a image for a product', 	'title' => 'Add Image', 											])
            ->create([	'id' => '50016', 	'resource' => '50003', 	'name' => 'ProductImagesListAction', 	'description' => 'Action to list all images of a product', 	'title' => 'Product Images', 											])
            ->create([	'id' => '50017', 	'resource' => '50004', 	'name' => 'ImageStatusChangeAction', 	'description' => 'Action to change status of a image', 	'title' => 'Change Image Status', 											])
            ->create([	'id' => '50018', 	'resource' => '50005', 	'name' => 'VisitorWishlistListAction', 	'description' => 'Action to list all wishlists of a visitor', 	'title' => 'Own Wishlists', 											])
            ->create([	'id' => '50019', 	'resource' => '50005', 	'name' => 'VisitorSharedWishlistListAction', 	'description' => 'Action to list all wishlist shared with this visitor', 	'title' => 'Shared Wishlists', 											])
            ->create([	'id' => '50020', 	'resource' => '50006', 	'name' => 'WishlistSharesListAction', 	'description' => 'Action to list all vistors whom with wishlist shared', 	'title' => 'Shares', 											])
            ->create([	'id' => '50021', 	'resource' => '50006', 	'name' => 'WishlistProductsListAction', 	'description' => 'List Item details of a wishlist', 	'title' => 'View Items', 											])
            ->create([	'id' => '50022', 	'resource' => '50005', 	'name' => 'VisitorDetailsAction', 	'description' => 'Action to view details of a visitor', 	'title' => 'Details', 											])
            ->create([	'id' => '50023', 	'resource' => '50006', 	'name' => 'WishlistMessagesListAction', 	'description' => 'Action to list all messages in a wishlist', 	'title' => 'View Messages', 											])
            ->create([	'id' => '50024', 	'resource' => '50006', 	'name' => 'ManageWishlistProductsAction', 	'description' => 'Action to manage products in a wishlist', 	'title' => 'Add/Remove Products', 											])
            ->create([	'id' => '50025', 	'resource' => '50006', 	'name' => 'ShareWishlistAction', 	'description' => 'Action to share wishlist with a visitor', 	'title' => 'Share Wish List', 											])
            ->create([	'id' => '50026', 	'resource' => '50006', 	'name' => 'WishlistDetailsAction', 	'description' => 'Action to view details of a wishlist', 	'title' => 'Details', 											])
            ->create([	'id' => '50027', 	'resource' => '50006', 	'name' => 'UpdateWishlistDetailsAction', 	'description' => 'Action to update wish list details', 	'title' => 'Update', 											])
            ->create([	'id' => '50028', 	'resource' => '50006', 	'name' => 'AddWishlistNoteAction', 	'description' => 'Action to add wishlist message', 	'title' => 'Add Note', 											])
            ->create([	'id' => '50029', 	'resource' => '50002', 	'name' => 'AlterWebListAction', 	'description' => 'Action to alter web listing of a item group', 	'title' => 'Alter Web Listing', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
