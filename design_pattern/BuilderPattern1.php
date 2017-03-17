<?php

abstract class GetterSetter
{
    public function __get($name)
    {
        $method = sprintf('get%s', ucfirst($name));

        if (!method_exists($this, $method)) {
            throw new Exception();
        }

        return $this->$method();
    }

    public function __set($name, $v)
    {
        $method = sprintf('set%s', ucfirst($name));

        if (!method_exists($this, $method)) {
            throw new Exception();
        }

        $this->$method($v);
    }
}

//Represents a product created by the builder
class Car extends GetterSetter
{
    private $wheels;
    private $colour;

    function __construct()
    {

    }

    public function setWheels($wheels)
    {
        $this->wheels = $wheels;
    }

    public function getWheels()
    {
        return $this->wheels;
    }

    public function setColour($colour)
    {
        $this->colour = $colour;
    }

    public function getColour()
    {
        return $this->colour;
    }
}

//The builder abstraction
interface ICarBuilder
{
    public function SetColour($colour);

    public function SetWheels($count);

    public function GetResult();
}

//Concrete builder implementation
class CarBuilder implements ICarBuilder
{
    private $_car;

    function __construct()
    {
        $this->_car = new Car();
    }

    public function SetColour($colour)
    {
        $this->_car->setColour($colour);
    }

    public function SetWheels($count)
    {
        $this->_car->setWheels($count);
    }

    public function GetResult()
    {
        return $this->_car;
    }
}

//The director
class CarBuildDirector
{
    public $builder;

    function __construct($color = "White", $wheels = 4)
    {
        $this->builder = new CarBuilder();

        $this->builder->SetColour($color);
        $this->builder->SetWheels($wheels);
    }

    public function GetResult()
    {
        return $this->builder->GetResult();
    }
}