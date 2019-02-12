<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormFieldDataTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormFieldData::query()
            ->create([	'id' => '50001', 	'form_field' => '50001', 	'attribute' => 'product', 													])
            ->create([	'id' => '50002', 	'form_field' => '50002', 	'attribute' => 'name', 													])
            ->create([	'id' => '50003', 	'form_field' => '50003', 	'attribute' => 'image', 													])
            ->create([	'id' => '50004', 	'form_field' => '50004', 	'attribute' => 'default', 													])
            ->create([	'id' => '50005', 	'form_field' => '50005', 	'attribute' => 'status', 													])
            ->create([	'id' => '50006', 	'form_field' => '50006', 	'attribute' => 'name', 													])
            ->create([	'id' => '50007', 	'form_field' => '50007', 	'attribute' => 'email', 													])
            ->create([	'id' => '50008', 	'form_field' => '50008', 	'attribute' => 'number', 													])
            ->create([	'id' => '50009', 	'form_field' => '50009', 	'attribute' => 'name', 													])
            ->create([	'id' => '50010', 	'form_field' => '50010', 	'attribute' => 'description', 													])
            ->create([	'id' => '50011', 	'form_field' => '50011', 	'attribute' => 'products', 	'relation' => '50032', 												])
            ->create([	'id' => '50012', 	'form_field' => '50012', 	'attribute' => 'name', 													])
            ->create([	'id' => '50013', 	'form_field' => '50013', 	'attribute' => 'description', 													])
            ->create([	'id' => '50014', 	'form_field' => '50014', 	'attribute' => 'wishlist', 													])
            ->create([	'id' => '50015', 	'form_field' => '50015', 	'attribute' => 'visitor', 													])
            ->create([	'id' => '50016', 	'form_field' => '50016', 	'attribute' => 'wishlist', 													])
            ->create([	'id' => '50017', 	'form_field' => '50017', 	'attribute' => 'note', 													])
            ->create([	'id' => '50018', 	'form_field' => '50018', 	'attribute' => 'list', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
