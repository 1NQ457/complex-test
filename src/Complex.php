<?php

namespace Complex;

class Complex
{
    private $real;
    private $image;
    private const COMPLEX_FORMAT = '/^(\-\d+|\d+) \+ (\-\d+|\d+)i$/';

    public function __construct($complexString = null)
    {
        if ($complexString) {
            $isCorrect = preg_match(Complex::COMPLEX_FORMAT, $complexString);
            if (!$isCorrect) {
                throw new \Exception('Wrong format, use "a + bi"');
            }
            $arr = explode('+', $complexString);

            $this->real = trim($arr[0]);
            $this->image = substr(trim($arr[1]), 0, -1);
        }
    }

    public function setReal(mixed $real): void
    {
        $this->real = $real;
    }

    public function setImage(mixed $image): void
    {
        $this->image = $image;
    }

    public function getReal(): int
    {
        return $this->real;
    }

    public function getImage(): int
    {
        return $this->image;
    }

    public function toComplex(mixed $number): mixed
    {
        if (is_object($number)) {
            return $number;
        }
        return new Complex($number);
    }

    public function toComplexFromInts(mixed $real, mixed $image): object
    {
        $result = new Complex();
        $result->setReal($real);
        $result->setImage($image);
        return $result;
    }

    public function add(mixed $number): object
    {
        $addedComplex = $this->toComplex($number);

        $real = $this->real + $addedComplex->getReal();
        $image = $this->image + $addedComplex->getImage();

        return $this->toComplexFromInts($real, $image);
    }

    public function sub(mixed $number): object
    {
        $subComplex = $this->toComplex($number);

        $real = $this->real - $subComplex->getReal();
        $image = $this->image - $subComplex->getImage();

        return $this->toComplexFromInts($real, $image);
    }

    public function mul(mixed $number): object
    {
        $mulComplex = $this->toComplex($number);

        $real = ($this->real * $mulComplex->getReal()) - ($this->image * $mulComplex->getImage());
        $image = $this->real * $mulComplex->getImage() + $this->image * $mulComplex->getReal();

        return $this->toComplexFromInts($real, $image);
    }

    public function div(mixed $number): object
    {
        $divComplex = $this->toComplex($number);

        $real = ($this->real * $divComplex->getReal() + $this->image * $divComplex->getImage())
            / ($divComplex->getReal() * $divComplex->getReal() + $divComplex->getImage() * $divComplex->getImage());

        $image = ($divComplex->getReal() * $this->image - $this->real * $divComplex->getImage())
            / ($divComplex->getReal() * $divComplex->getReal() + $divComplex->getImage() * $divComplex->getImage());

        return $this->toComplexFromInts($real, $image);
    }

    public function __toString(): string
    {
        return "{$this->real} + {$this->image}i";
    }
}
