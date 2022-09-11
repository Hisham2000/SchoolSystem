<?php

namespace ShapeFactory;

abstract class ShapeFactory{
    abstract public function getAll();
    abstract public function find($id);
}