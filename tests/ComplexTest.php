<?php

namespace Complex\Tests;

use PHPUnit\Framework\TestCase;
use Complex\Complex;

class ComplexTest extends TestCase
{
    public function testStructure(): void
    {
        $complex = new Complex('2 + 5i');
        $this->assertEquals(2, $complex->getReal());
        $this->assertEquals(5, $complex->getImage());
        $complex->setReal(5);
        $complex->setImage(2);
        $this->assertEquals(5, $complex->getReal());
        $this->assertEquals(2, $complex->getImage());
        $this->expectException(\Exception::class);
        $complex = new Complex('Invalid Data');
    }

    public function addProvider(): array
    {
        return [
            ['2 + 5i', '3 + 3i', '5 + 8i'],
            ['-2 + 5i', new complex('3 + 3i'), '1 + 8i'],
        ];
    }

    /**
     * @dataProvider addProvider
     */
    public function testAdd(string $num1, mixed $num2, string $expectedResult): void
    {
        $complex = new Complex($num1);
        $actualResult = $complex->add($num2);
        $this->assertEquals($expectedResult, strval($actualResult));
    }

    public function subProvider(): array
    {
        return [
            ['2 + 5i', '3 + 3i', '-1 + 2i'],
            ['-2 + 5i', new complex('3 + 3i'), '-5 + 2i'],
        ];
    }

    /**
     * @dataProvider subProvider
     */
    public function testSub(string $num1, mixed $num2, string $expectedResult): void
    {
        $complex = new Complex($num1);
        $actualResult = $complex->sub($num2);
        $this->assertEquals($expectedResult, strval($actualResult));
    }

    public function mulProvider(): array
    {
        return [
            ['2 + 5i', '3 + 3i', '-9 + 21i'],
            ['-2 + 5i', new complex('3 + 3i'), '-21 + 9i'],
        ];
    }

    /**
     * @dataProvider mulProvider
     */
    public function testMul(string $num1, mixed $num2, string $expectedResult): void
    {
        $complex = new Complex($num1);
        $actualResult = $complex->mul($num2);
        $this->assertEquals($expectedResult, strval($actualResult));
    }

    public function divProvider(): array
    {
        return [
            ['4 + 8i', '4 + 4i', '1.5 + 0.5i'],
            ['-4 + 8i', new complex('4 + 4i'), '0.5 + 1.5i'],
        ];
    }

    /**
     * @dataProvider divProvider
     */
    public function testDiv(string $num1, mixed $num2, string $expectedResult): void
    {
        $complex = new Complex($num1);
        $actualResult = $complex->div($num2);
        $this->assertEquals($expectedResult, strval($actualResult));
    }
}
