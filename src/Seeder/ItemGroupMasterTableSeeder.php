<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class ItemGroupMasterTableSeeder extends Seeder
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
        \Milestone\PD\Model\ItemGroupMaster::truncate()
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
