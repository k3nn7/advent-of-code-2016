<?php
declare(strict_types=1);

namespace AOC\Day4\Part2;

class RoomNameTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider dataProvider
     */
    public function test_decrypt_room_name(
        string $encryptedName,
        string $expectedDecryptedName
    ) {
        $roomName = new RoomName($encryptedName);
        $encryptedName = $roomName->encrypt();

        $this->assertEquals(
            $expectedDecryptedName,
            $encryptedName
        );
    }

    public function dataProvider()
    {
        return [
            [
                '$encryptedName' => 'qzmt-zixmtkozy-ivhz-343[abcdef]',
                '$expectedDecryptedName' => 'very encrypted name'
            ]
        ];
    }
}
