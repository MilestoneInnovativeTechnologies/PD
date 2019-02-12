<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceDataViewSectionItemTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceDataViewSectionItem::query()
            ->create([	'id' => '50001', 	'section' => '50001', 	'label' => 'Email Address', 	'attribute' => 'email', 												])
            ->create([	'id' => '50002', 	'section' => '50001', 	'label' => 'Contact Number', 	'attribute' => 'number', 												])
            ->create([	'id' => '50003', 	'section' => '50002', 	'label' => 'Name', 	'attribute' => 'name', 												])
            ->create([	'id' => '50004', 	'section' => '50002', 	'label' => 'Description', 	'attribute' => 'description', 												])
            ->create([	'id' => '50005', 	'section' => '50002', 	'label' => 'Products', 	'attribute' => 'name', 	'relation' => '50032', 											])
            ->create([	'id' => '50006', 	'section' => '50003', 	'label' => 'Name', 	'attribute' => 'name', 												])
            ->create([	'id' => '50007', 	'section' => '50003', 	'label' => 'Description', 	'attribute' => 'description', 												])
            ->create([	'id' => '50008', 	'section' => '50003', 	'label' => 'Products', 	'attribute' => 'name', 	'relation' => '50032', 											])
            ->create([	'id' => '50009', 	'section' => '50004', 	'label' => 'Author', 	'attribute' => 'name', 	'relation' => '50027', 											])
            ->create([	'id' => '50010', 	'section' => '50004', 	'label' => 'Shared with Vendor', 	'attribute' => 'status', 	'relation' => '50028', 											])
            ->create([	'id' => '50011', 	'section' => '50004', 	'label' => 'Description', 	'attribute' => 'description', 												])
            ->create([	'id' => '50012', 	'section' => '50005', 	'label' => 'Name', 	'attribute' => 'name', 												])
            ->create([	'id' => '50013', 	'section' => '50005', 	'label' => 'Email', 	'attribute' => 'email', 												])
            ->create([	'id' => '50014', 	'section' => '50005', 	'label' => 'Number', 	'attribute' => 'number', 												])
            ->create([	'id' => '50015', 	'section' => '50006', 	'label' => 'Product', 	'attribute' => 'name', 	'relation' => '50040', 											])
            ->create([	'id' => '50016', 	'section' => '50006', 	'label' => 'Added By', 	'attribute' => 'name', 	'relation' => '50037', 											])
            ->create([	'id' => '50017', 	'section' => '50006', 	'label' => 'Removed By', 	'attribute' => 'name', 	'relation' => '50038', 											])
            ->create([	'id' => '50018', 	'section' => '50007', 	'label' => 'Note', 	'attribute' => 'note', 												])
            ->create([	'id' => '50019', 	'section' => '50007', 	'label' => 'Author', 	'attribute' => 'name', 	'relation' => '50035', 											])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
