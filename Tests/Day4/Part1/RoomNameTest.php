<?php
declare(strict_types=1);

namespace AOC\Tests\Day4\Part1;

use AOC\Day4\Part1\RoomName;

class RoomNameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test_construct_from_encrypted_name(
        string $name,
        int $expectedId,
        bool $isReal
    ) {
        $roomName = new RoomName($name);
        $this->assertEquals($expectedId, $roomName->getId());
        $this->assertEquals($isReal, $roomName->isReal());
    }

    public function dataProvider()
    {
        return [
            [
                '$name' => 'aaaaa-bbb-z-y-x-123[abxyz]',
                '$expectedId' => 123,
                '$isReal' => true,
            ],
            [
                '$name' => 'a-b-c-d-e-f-g-h-987[abcde]',
                '$expectedId' => 987,
                '$isReal' => true,
            ],
            [
                '$name' => 'not-a-real-room-404[oarel]',
                '$expectedId' => 404,
                '$isReal' => true,
            ],
            [
                '$name' => 'totally-real-room-200[decoy]',
                '$expectedId' => 200,
                '$isReal' => false,
            ],
        ];
    }
}
