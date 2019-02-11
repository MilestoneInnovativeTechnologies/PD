<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceRelationTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceRelation::query()
            ->create([	'id' => '50001', 	'resource' => '50002', 	'name' => 'Group01Products', 	'description' => 'Products of a group 1', 	'method' => 'Group01Products', 	'type' => 'hasMany', 	'relate_resource' => '50003', 									])
            ->create([	'id' => '50002', 	'resource' => '50002', 	'name' => 'Group02Products', 	'description' => 'Products of a group 2', 	'method' => 'Group02Products', 	'type' => 'hasMany', 	'relate_resource' => '50003', 									])
            ->create([	'id' => '50003', 	'resource' => '50002', 	'name' => 'Group03Products', 	'description' => 'Products of a group 3', 	'method' => 'Group03Products', 	'type' => 'hasMany', 	'relate_resource' => '50003', 									])
            ->create([	'id' => '50004', 	'resource' => '50002', 	'name' => 'Group04Products', 	'description' => 'Products of a group 4', 	'method' => 'Group04Products', 	'type' => 'hasMany', 	'relate_resource' => '50003', 									])
            ->create([	'id' => '50005', 	'resource' => '50003', 	'name' => 'ProductGroup01', 	'description' => 'Details of group 01 of this product belongs', 	'method' => 'Group01', 	'type' => 'belongsTo', 	'relate_resource' => '50002', 									])
            ->create([	'id' => '50006', 	'resource' => '50003', 	'name' => 'ProductGroup02', 	'description' => 'Details of group 02 of this product belongs', 	'method' => 'Group02', 	'type' => 'belongsTo', 	'relate_resource' => '50002', 									])
            ->create([	'id' => '50007', 	'resource' => '50003', 	'name' => 'ProductGroup03', 	'description' => 'Details of group 03 of this product belongs', 	'method' => 'Group03', 	'type' => 'belongsTo', 	'relate_resource' => '50002', 									])
            ->create([	'id' => '50008', 	'resource' => '50003', 	'name' => 'ProductGroup04', 	'description' => 'Details of group 04 of this product belongs', 	'method' => 'Group04', 	'type' => 'belongsTo', 	'relate_resource' => '50002', 									])
            ->create([	'id' => '50009', 	'resource' => '50003', 	'name' => 'ProductImages', 	'description' => 'Images of a product', 	'method' => 'Images', 	'type' => 'hasMany', 	'relate_resource' => '50004', 									])
            ->create([	'id' => '50010', 	'resource' => '50003', 	'name' => 'ProductWishlists', 	'description' => 'Wishlists to which this product belongs to', 	'method' => 'Wishlists', 	'type' => 'belongsToMany', 	'relate_resource' => '50004', 									])
            ->create([	'id' => '50011', 	'resource' => '50005', 	'name' => 'VisitorWishlist', 	'description' => 'Wishlists which are created by a visitor', 	'method' => 'Wishlists', 	'type' => 'hasMany', 	'relate_resource' => '50006', 									])
            ->create([	'id' => '50012', 	'resource' => '50005', 	'name' => 'VisitorWishlistShared', 	'description' => 'Whishlists which are shared to a visitor', 	'method' => 'SharedWishlist', 	'type' => 'belongsToMany', 	'relate_resource' => '50006', 									])
            ->create([	'id' => '50013', 	'resource' => '50006', 	'name' => 'WishlistAuthor', 	'description' => 'Author of a wishlist', 	'method' => 'Author', 	'type' => 'belongsTo', 	'relate_resource' => '50005', 									])
            ->create([	'id' => '50014', 	'resource' => '50006', 	'name' => 'WishlistVendor', 	'description' => 'Vendor state details of a wishlist', 	'method' => 'Vendor', 	'type' => 'hasOne', 	'relate_resource' => '50007', 									])
            ->create([	'id' => '50015', 	'resource' => '50006', 	'name' => 'WishlistVisitors', 	'description' => 'Visitors to whom with a wishlist shared', 	'method' => 'Visitors', 	'type' => 'belongsToMany', 	'relate_resource' => '50008', 									])
            ->create([	'id' => '50016', 	'resource' => '50006', 	'name' => 'WishlistNotes', 	'description' => 'Notes or Messages shared on this basis of a wishlist', 	'method' => 'Notes', 	'type' => 'hasMany', 	'relate_resource' => '50009', 									])
            ->create([	'id' => '50017', 	'resource' => '50006', 	'name' => 'WishlistItems', 	'description' => 'Item or product details in a wishlist', 	'method' => 'Items', 	'type' => 'hasMany', 	'relate_resource' => '50010', 									])
            ->create([	'id' => '50018', 	'resource' => '50006', 	'name' => 'WishlistProducts', 	'description' => 'All products in a wishlist', 	'method' => 'Products', 	'type' => 'belongsToMany', 	'relate_resource' => '50003', 									])
            ->create([	'id' => '50019', 	'resource' => '50005', 	'name' => 'VisitorWishlistDetails', 	'description' => 'Details of wishlist in a visitor wishlist', 	'method' => 'Wishlist', 	'type' => 'belongsTo', 	'relate_resource' => '50006', 									])
            ->create([	'id' => '50020', 	'resource' => '50005', 	'name' => 'VisitorWishlistVisitor', 	'description' => 'Visitor details of a visitor wishlist entry', 	'method' => 'Visitor', 	'type' => 'belongsTo', 	'relate_resource' => '50008', 									])
            ->create([	'id' => '50021', 	'resource' => '50009', 	'name' => 'WishlistNoteAuthor', 	'description' => 'Author details of a message on wishlist', 	'method' => 'Author', 	'type' => 'belongsTo', 	'relate_resource' => '50005', 									])
            ->create([	'id' => '50022', 	'resource' => '50010', 	'name' => 'WishlistProductWishlist', 	'description' => 'Details of wishlist in a wishlist product entry', 	'method' => 'Wishlist', 	'type' => 'belongsTo', 	'relate_resource' => '50006', 									])
            ->create([	'id' => '50023', 	'resource' => '50010', 	'name' => 'WishlistProductAddedBy', 	'description' => 'Visitor who added a product to wishlist', 	'method' => 'Added', 	'type' => 'belongsTo', 	'relate_resource' => '50005', 									])
            ->create([	'id' => '50024', 	'resource' => '50010', 	'name' => 'WishlistProductRemovedBy', 	'description' => 'Visitor who removed a product to wishlist', 	'method' => 'Removed', 	'type' => 'belongsTo', 	'relate_resource' => '50005', 									])
            ->create([	'id' => '50025', 	'resource' => '50010', 	'name' => 'WishlistProductNotes', 	'description' => 'Notes or Messages shared on this basis of a wishlist product', 	'method' => 'Notes', 	'type' => 'hasMany', 	'relate_resource' => '50011', 									])
            ->create([	'id' => '50026', 	'resource' => '50010', 	'name' => 'WishlistProductDetails', 	'description' => 'Details of a product in wishlist product entry', 	'method' => 'Product', 	'type' => 'belongsTo', 	'relate_resource' => '50003', 									])
            ->create([	'id' => '50027', 	'resource' => '50011', 	'name' => 'WishlistProductNoteAuthor', 	'description' => 'Author details of a message on wishlist product', 	'method' => 'Author', 	'type' => 'belongsTo', 	'relate_resource' => '50005', 									])
            ->create([	'id' => '50028', 	'resource' => '50006', 	'name' => 'WishlistVisitorShare', 	'description' => 'Share details of a wishlist', 	'method' => 'Share', 	'type' => 'hasMany', 	'relate_resource' => '50008', 									])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
