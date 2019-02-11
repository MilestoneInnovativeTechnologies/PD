<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserTableSeeder::class,
            GroupTableSeeder::class,
            GroupUserTableSeeder::class,
            RoleTableSeeder::class,
            GroupRoleTableSeeder::class,
            ResourceTableSeeder::class,
            ResourceRoleTableSeeder::class,
            ResourceRelationTableSeeder::class,
            ResourceScopeTableSeeder::class,
            ResourceFormTableSeeder::class,
            ResourceFormFieldTableSeeder::class,
            ResourceFormFieldAttrTableSeeder::class,
            ResourceFormFieldDataTableSeeder::class,
            ResourceFormFieldValidationTableSeeder::class,
            ResourceFormFieldOptionTableSeeder::class,
            ResourceFormFieldDependTableSeeder::class,
            ResourceFormFieldDynamicTableSeeder::class,
            ResourceFormLayoutTableSeeder::class,
            ResourceFormCollectionTableSeeder::class,
            ResourceFormUploadTableSeeder::class,
            ResourceFormDefaultTableSeeder::class,
            ResourceListTableSeeder::class,
            ResourceListRelationTableSeeder::class,
            ResourceListScopeTableSeeder::class,
            ResourceListLayoutTableSeeder::class,
            ResourceListSearchTableSeeder::class,
            ResourceDataTableSeeder::class,
            ResourceDataRelationTableSeeder::class,
            ResourceDataScopeTableSeeder::class,
            ResourceDataViewSectionTableSeeder::class,
            ResourceDataViewSectionItemTableSeeder::class,
            ResourceFormDataMapTableSeeder::class,
            ResourceActionTableSeeder::class,
            ResourceActionAttrTableSeeder::class,
            ResourceActionMethodTableSeeder::class,
            ResourceActionListTableSeeder::class,
            ResourceActionDataTableSeeder::class,
            ResourceDefaultTableSeeder::class,
            ResourceMetricTableSeeder::class,
            ResourceDashboardTableSeeder::class,
            ResourceDashboardSectionTableSeeder::class,
            ResourceDashboardSectionItemTableSeeder::class,
            OrganisationTableSeeder::class,
            OrganisationContactTableSeeder::class,
            GroupMasterTableSeeder::class,
            GroupDetailTableSeeder::class,
            ProductTableSeeder::class,
            ProductImageTableSeeder::class,
            VisitorTableSeeder::class,
            WishlistTableSeeder::class,
            WishlistProductTableSeeder::class,
            VisitorWishlistTableSeeder::class,
            VendorWishlistTableSeeder::class,
            WishlistNoteTableSeeder::class,
            WishlistProductNoteTableSeeder::class,
        ]);
    }
}
