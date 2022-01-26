<?php

use App\Package;
use Illuminate\Database\Seeder;

class PackageSeeder extends Seeder
{
    public function run()
    {
        $this->createPackage();
    }

    public function createPackage(){
        $packages = [
            ['package_name' => 'Package A', 'room_id' => 1],
            ['package_name' => 'Package B', 'room_id' => 1],
            ['package_name' => 'Package C', 'room_id' => 1],
            ['package_name' => 'Package A', 'room_id' => 2],
        ];

        foreach ($packages as $package) {
            Package::create([
                'package_name' => $package['package_name'],
                'room_id' => $package['room_id'],
            ]);
        };
    }
}
