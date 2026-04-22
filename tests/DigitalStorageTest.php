<?php

namespace Unitz\Tests;

use InvalidArgumentException;
use PHPUnit\Framework\TestCase;
use Unitz\DigitalStorage;

final class DigitalStorageTest extends TestCase
{
    // Anchor: 1 TB = 1000 GB = 1,000,000 MB = 1,000,000,000 KB = 1,000,000,000,000 B = 8,000,000,000,000 bits
    public const TEST_TERABYTE = 1.0;
    public const TEST_GIGABYTE = 1000.0;
    public const TEST_MEGABYTE = 1000000.0;
    public const TEST_KILOBYTE = 1000000000.0;
    public const TEST_BYTE = 1000000000000.0;
    public const TEST_BIT = 8000000000000.0;

    public function testSetMegabyteWillReturnMegabyteWithGetValueAndDefaultPreferences(): void
    {
        $storage = new DigitalStorage(megabyte: self::TEST_MEGABYTE);
        $this->assertEquals(self::TEST_MEGABYTE, $storage->getValue());
    }

    public function testWillThrowExceptionWithTooManyValuesSet(): void
    {
        $this->expectException(InvalidArgumentException::class);
        $this->expectExceptionMessage('Only one DigitalStorage type can be set at a time.');

        new DigitalStorage(megabyte: self::TEST_MEGABYTE, gigabyte: self::TEST_GIGABYTE);
    }

    public function testWillSetUserValueAndReturnValue(): void
    {
        $storage = new DigitalStorage(userValue: self::TEST_GIGABYTE, preferences: ['DigitalStorage' => 'Gigabyte']);
        $this->assertEquals(self::TEST_GIGABYTE, $storage->getValue());
    }

    public function testWillSetUserValueAndReturnValueFromPreferenceFunction(): void
    {
        $storage = new DigitalStorage(userValue: self::TEST_GIGABYTE, preferences: ['DigitalStorage' => 'Gigabyte']);
        $this->assertEquals(self::TEST_GIGABYTE, $storage->getGigabyte());
    }

    // Bit Conversions

    public function testSetBitWillReturnBitWithGetBit(): void
    {
        $storage = new DigitalStorage(bit: self::TEST_BIT);
        $this->assertEquals(self::TEST_BIT, $storage->getBit());
    }

    public function testSetBitWillReturnByteWithGetByte(): void
    {
        $storage = new DigitalStorage(bit: self::TEST_BIT);
        $this->assertEquals(self::TEST_BYTE, $storage->getByte());
    }

    public function testSetBitWillReturnKilobyteWithGetKilobyte(): void
    {
        $storage = new DigitalStorage(bit: self::TEST_BIT);
        $this->assertEquals(self::TEST_KILOBYTE, $storage->getKilobyte());
    }

    public function testSetBitWillReturnMegabyteWithGetMegabyte(): void
    {
        $storage = new DigitalStorage(bit: self::TEST_BIT);
        $this->assertEquals(self::TEST_MEGABYTE, $storage->getMegabyte());
    }

    public function testSetBitWillReturnGigabyteWithGetGigabyte(): void
    {
        $storage = new DigitalStorage(bit: self::TEST_BIT);
        $this->assertEquals(self::TEST_GIGABYTE, $storage->getGigabyte());
    }

    public function testSetBitWillReturnTerabyteWithGetTerabyte(): void
    {
        $storage = new DigitalStorage(bit: self::TEST_BIT);
        $this->assertEquals(self::TEST_TERABYTE, $storage->getTerabyte());
    }

    // Byte Conversions

    public function testSetByteWillReturnBitWithGetBit(): void
    {
        $storage = new DigitalStorage(byte: self::TEST_BYTE);
        $this->assertEquals(self::TEST_BIT, $storage->getBit());
    }

    public function testSetByteWillReturnByteWithGetByte(): void
    {
        $storage = new DigitalStorage(byte: self::TEST_BYTE);
        $this->assertEquals(self::TEST_BYTE, $storage->getByte());
    }

    public function testSetByteWillReturnKilobyteWithGetKilobyte(): void
    {
        $storage = new DigitalStorage(byte: self::TEST_BYTE);
        $this->assertEquals(self::TEST_KILOBYTE, $storage->getKilobyte());
    }

    public function testSetByteWillReturnMegabyteWithGetMegabyte(): void
    {
        $storage = new DigitalStorage(byte: self::TEST_BYTE);
        $this->assertEquals(self::TEST_MEGABYTE, $storage->getMegabyte());
    }

    public function testSetByteWillReturnGigabyteWithGetGigabyte(): void
    {
        $storage = new DigitalStorage(byte: self::TEST_BYTE);
        $this->assertEquals(self::TEST_GIGABYTE, $storage->getGigabyte());
    }

    public function testSetByteWillReturnTerabyteWithGetTerabyte(): void
    {
        $storage = new DigitalStorage(byte: self::TEST_BYTE);
        $this->assertEquals(self::TEST_TERABYTE, $storage->getTerabyte());
    }

    // Kilobyte Conversions

    public function testSetKilobyteWillReturnBitWithGetBit(): void
    {
        $storage = new DigitalStorage(kilobyte: self::TEST_KILOBYTE);
        $this->assertEquals(self::TEST_BIT, $storage->getBit());
    }

    public function testSetKilobyteWillReturnByteWithGetByte(): void
    {
        $storage = new DigitalStorage(kilobyte: self::TEST_KILOBYTE);
        $this->assertEquals(self::TEST_BYTE, $storage->getByte());
    }

    public function testSetKilobyteWillReturnKilobyteWithGetKilobyte(): void
    {
        $storage = new DigitalStorage(kilobyte: self::TEST_KILOBYTE);
        $this->assertEquals(self::TEST_KILOBYTE, $storage->getKilobyte());
    }

    public function testSetKilobyteWillReturnMegabyteWithGetMegabyte(): void
    {
        $storage = new DigitalStorage(kilobyte: self::TEST_KILOBYTE);
        $this->assertEquals(self::TEST_MEGABYTE, $storage->getMegabyte());
    }

    public function testSetKilobyteWillReturnGigabyteWithGetGigabyte(): void
    {
        $storage = new DigitalStorage(kilobyte: self::TEST_KILOBYTE);
        $this->assertEquals(self::TEST_GIGABYTE, $storage->getGigabyte());
    }

    public function testSetKilobyteWillReturnTerabyteWithGetTerabyte(): void
    {
        $storage = new DigitalStorage(kilobyte: self::TEST_KILOBYTE);
        $this->assertEquals(self::TEST_TERABYTE, $storage->getTerabyte());
    }

    // Megabyte Conversions

    public function testSetMegabyteWillReturnBitWithGetBit(): void
    {
        $storage = new DigitalStorage(megabyte: self::TEST_MEGABYTE);
        $this->assertEquals(self::TEST_BIT, $storage->getBit());
    }

    public function testSetMegabyteWillReturnByteWithGetByte(): void
    {
        $storage = new DigitalStorage(megabyte: self::TEST_MEGABYTE);
        $this->assertEquals(self::TEST_BYTE, $storage->getByte());
    }

    public function testSetMegabyteWillReturnKilobyteWithGetKilobyte(): void
    {
        $storage = new DigitalStorage(megabyte: self::TEST_MEGABYTE);
        $this->assertEquals(self::TEST_KILOBYTE, $storage->getKilobyte());
    }

    public function testSetMegabyteWillReturnMegabyteWithGetMegabyte(): void
    {
        $storage = new DigitalStorage(megabyte: self::TEST_MEGABYTE);
        $this->assertEquals(self::TEST_MEGABYTE, $storage->getMegabyte());
    }

    public function testSetMegabyteWillReturnGigabyteWithGetGigabyte(): void
    {
        $storage = new DigitalStorage(megabyte: self::TEST_MEGABYTE);
        $this->assertEquals(self::TEST_GIGABYTE, $storage->getGigabyte());
    }

    public function testSetMegabyteWillReturnTerabyteWithGetTerabyte(): void
    {
        $storage = new DigitalStorage(megabyte: self::TEST_MEGABYTE);
        $this->assertEquals(self::TEST_TERABYTE, $storage->getTerabyte());
    }

    // Gigabyte Conversions

    public function testSetGigabyteWillReturnBitWithGetBit(): void
    {
        $storage = new DigitalStorage(gigabyte: self::TEST_GIGABYTE);
        $this->assertEquals(self::TEST_BIT, $storage->getBit());
    }

    public function testSetGigabyteWillReturnByteWithGetByte(): void
    {
        $storage = new DigitalStorage(gigabyte: self::TEST_GIGABYTE);
        $this->assertEquals(self::TEST_BYTE, $storage->getByte());
    }

    public function testSetGigabyteWillReturnKilobyteWithGetKilobyte(): void
    {
        $storage = new DigitalStorage(gigabyte: self::TEST_GIGABYTE);
        $this->assertEquals(self::TEST_KILOBYTE, $storage->getKilobyte());
    }

    public function testSetGigabyteWillReturnMegabyteWithGetMegabyte(): void
    {
        $storage = new DigitalStorage(gigabyte: self::TEST_GIGABYTE);
        $this->assertEquals(self::TEST_MEGABYTE, $storage->getMegabyte());
    }

    public function testSetGigabyteWillReturnGigabyteWithGetGigabyte(): void
    {
        $storage = new DigitalStorage(gigabyte: self::TEST_GIGABYTE);
        $this->assertEquals(self::TEST_GIGABYTE, $storage->getGigabyte());
    }

    public function testSetGigabyteWillReturnTerabyteWithGetTerabyte(): void
    {
        $storage = new DigitalStorage(gigabyte: self::TEST_GIGABYTE);
        $this->assertEquals(self::TEST_TERABYTE, $storage->getTerabyte());
    }

    // Terabyte Conversions

    public function testSetTerabyteWillReturnBitWithGetBit(): void
    {
        $storage = new DigitalStorage(terabyte: self::TEST_TERABYTE);
        $this->assertEquals(self::TEST_BIT, $storage->getBit());
    }

    public function testSetTerabyteWillReturnByteWithGetByte(): void
    {
        $storage = new DigitalStorage(terabyte: self::TEST_TERABYTE);
        $this->assertEquals(self::TEST_BYTE, $storage->getByte());
    }

    public function testSetTerabyteWillReturnKilobyteWithGetKilobyte(): void
    {
        $storage = new DigitalStorage(terabyte: self::TEST_TERABYTE);
        $this->assertEquals(self::TEST_KILOBYTE, $storage->getKilobyte());
    }

    public function testSetTerabyteWillReturnMegabyteWithGetMegabyte(): void
    {
        $storage = new DigitalStorage(terabyte: self::TEST_TERABYTE);
        $this->assertEquals(self::TEST_MEGABYTE, $storage->getMegabyte());
    }

    public function testSetTerabyteWillReturnGigabyteWithGetGigabyte(): void
    {
        $storage = new DigitalStorage(terabyte: self::TEST_TERABYTE);
        $this->assertEquals(self::TEST_GIGABYTE, $storage->getGigabyte());
    }

    public function testSetTerabyteWillReturnTerabyteWithGetTerabyte(): void
    {
        $storage = new DigitalStorage(terabyte: self::TEST_TERABYTE);
        $this->assertEquals(self::TEST_TERABYTE, $storage->getTerabyte());
    }
}