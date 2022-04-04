<?php
class Conexion
{

    protected $link;

    public function Conexion()
    {
        try {
            $this->link = new mysqli("localhost", "root", "agus21", "inscripciones2.0", "3307");
        } catch (Exception $e) {
            die('Error' . $e->getMessage());
        }
        return $this->link;
    }
}
