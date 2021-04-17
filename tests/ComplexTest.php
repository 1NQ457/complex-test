<?php

namespace Complex\Tests;

use PHPUnit\Framework\TestCase;
use Complex\Complex;

class ComplexTest extends TestCase
{
    public function testStructure(): void
    {
        $complex = new Complex(2, 5);
        $this->assertEquals(2, $complex->getReal());
        $this->assertEquals(5, $complex->getImage());
        $complex->setReal(5);
        $complex->setImage(2);
        $this->assertEquals(5, $complex->getReal());
        $this->assertEquals(2, $complex->getImage());
        $this->assertEquals('5 + 2i', strval($complex));
    }

    public function addProvider(): array
    {
        return [
            [new Complex(2, 5), new Complex(3, 3), new Complex(5, 8)],
            [new Complex(-2, 5), new complex(3, 3), new Complex(1, 8)],
            [new Complex(-2, 5), new complex(-3, 3), new Complex(-5, 8)],
        ];
    }

    /**
     * @dataProvider addProvider
     */
    public function testAdd(Complex $num1, Complex $num2, Complex $expectedResult): void
    {
        $actualResult = $num1->add($num2);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function subProvider(): array
    {
        return [
            [new Complex(2, 5), new Complex(3, 3), new Complex(-1, 2)],
            [new Complex(-2, 5), new complex(3, 3), new Complex(-5, 2)],
            [new Complex(-2, 5), new complex(-3, 3), new Complex(1, 2)]
        ];
    }

    /**
     * @dataProvider subProvider
     */
    public function testSub(Complex $num1, Complex $num2, Complex $expectedResult): void
    {
        $actualResult = $num1->sub($num2);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function mulProvider(): array
    {
        return [
            [new Complex(2, 5), new Complex(3, 3), new Complex(-9, 21)],
            [new Complex(-2, 5), new complex(3, 3), new Complex(-21, 9)],
            [new Complex(-2, 5), new complex(-3, 3), new Complex(-9, -21)]
        ];
    }

    /**
     * @dataProvider mulProvider
     */
    public function testMul(Complex $num1, Complex $num2, Complex $expectedResult): void
    {
        $actualResult = $num1->mul($num2);
        $this->assertEquals($expectedResult, $actualResult);
    }

    public function divProvider(): array
    {
        return [
            [new Complex(4, 8), new Complex(4, 4), new Complex(1.5, 0.5)],
            [new Complex(-4, 8), new complex(4, 4), new Complex(0.5, 1.5)],
            [new Complex(-4, 8), new complex(-4, 4), new Complex(1.5, 0.5)]
        ];
    }

    /**
     * @dataProvider divProvider
     */
    public function testDiv(Complex $num1, Complex $num2, Complex $expectedResult): void
    {
        $actualResult = $num1->div($num2);
        $this->assertEquals($expectedResult, $actualResult);
    }
}
