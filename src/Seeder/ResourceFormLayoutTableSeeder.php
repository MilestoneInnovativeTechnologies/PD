<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ResourceFormLayoutTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\ResourceFormLayout::query()
            ->create([	'id' => '50001', 	'resource_form' => '50003', 	'form_field' => '50001', 	'colspan' => '12', 												])
            ->create([	'id' => '50002', 	'resource_form' => '50003', 	'form_field' => '50001', 	'colspan' => '6', 												])
            ->create([	'id' => '50003', 	'resource_form' => '50003', 	'form_field' => '50001', 	'colspan' => '6', 												])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
