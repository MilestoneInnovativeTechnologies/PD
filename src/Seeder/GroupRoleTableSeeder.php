<?php

namespace Milestone\PD\Seeder;

use Illuminate\Database\Seeder;

class GroupRoleTableSeeder extends Seeder
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
        \Milestone\Appframe\Model\GroupRole::query()
            ->create([	'id' => '50001', 	'group' => '50001', 	'role' => '50001', 													])
        ;
        \DB::statement('set foreign_key_checks = ' . $_);
    }
}
