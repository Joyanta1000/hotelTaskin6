<?php

use App\Room;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    public function run()
    {
        $this->createRoom();
    }

    public function createRoom()
    {
        $roomNames = [
            ['room_name' => 'Single Room'],
            ['room_name' => 'Double Room'],
        ];

        foreach ($roomNames as $roomName) {
            Room::create([
                'room_name' => $roomName["room_name"]
            ]);
        };
    }
}
