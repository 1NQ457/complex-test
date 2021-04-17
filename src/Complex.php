<?php

namespace Complex;

class Complex
{
    private $real;
    private $image;

    public function __construct(int $real, int $image)
    {
        $this->real = $real;
        $this->image = $image;
    }

    public function setReal(int $real): void
    {
        $this->real = $real;
    }

    public function setImage(int $image): void
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

    public function add(Complex $addedComplex): Complex
    {
        $real = $this->real + $addedComplex->getReal();
        $image = $this->image + $addedComplex->getImage();

        return new Complex($real, $image);
    }

    public function sub(Complex $subComplex): Complex
    {
        $real = $this->real - $subComplex->getReal();
        $image = $this->image - $subComplex->getImage();

        return new Complex($real, $image);
    }

    public function mul(Complex $mulComplex): Complex
    {
        $real = ($this->real * $mulComplex->getReal()) - ($this->image * $mulComplex->getImage());
        $image = $this->real * $mulComplex->getImage() + $this->image * $mulComplex->getReal();

        return new Complex($real, $image);
    }

    public function div(Complex $divComplex): Complex
    {
        $real = ($this->real * $divComplex->getReal() + $this->image * $divComplex->getImage())
            / ($divComplex->getReal() * $divComplex->getReal() + $divComplex->getImage() * $divComplex->getImage());

        $image = ($divComplex->getReal() * $this->image - $this->real * $divComplex->getImage())
            / ($divComplex->getReal() * $divComplex->getReal() + $divComplex->getImage() * $divComplex->getImage());

        return new Complex($real, $image);
    }

    public function __toString(): string
    {
        return "{$this->real} + {$this->image}i";
    }
}
