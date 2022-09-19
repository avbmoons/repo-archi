<?php

require_once "./SquareAreaLib.php";
require_once "./CircleAreaLib.php";

//  интерфейс для вычислений
interface ICalculator
{
    public function calculator(string $value): void;
}

//   классы для вычислений
class SquareAreaAdapter implements ICalculator
{
    private $square;
    public function __construct(SquareAreaLib $square)
    {
        $this->square = $square;
    }
    public function calculator(string $value): void
    {
        $this->square->getSquareArea($value);
    }
}

class CircleAreaAdapter implements ICalculator
{
    private $circle;
    public function __construct(CircleAreaLib $circle)
    {
        $this->circle = $circle;
    }
    public function calculator(string $value): void
    {
        $this->circle->getCircleArea($value);
    }
}

// тест вычислений
function testAdapter(string $newCalc)
{
    $circleAreaAdapter = new CircleAreaAdapter(new CircleAreaLib());
    $circleAreaAdapter->getCircleArea($newCalc);
    $squareAreaAdapter = new SquareAreaAdapter(new SquareAreaLib());
    $squareAreaAdapter->getSquareArea($newCalc);
}
