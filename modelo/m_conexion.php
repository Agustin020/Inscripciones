<?php
class Conexion
{

    protected $link;

    public function Conexion()
    {
        try {
            $this->link = new mysqli("localhost", "root", "", "inscripciones2.0", "3306");
        } catch (Exception $e) {
            die('Error' . $e->getMessage());
        }
        return $this->link;
    }
}
