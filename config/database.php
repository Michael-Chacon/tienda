<?php

class Database
{
    public static function conectar()
    {
        $conaxion = new mysqli("localhots", "root", "", "tienda", 3308);
        $conaxion->query("SET NAMES 'utf-8");
        return $conaxion;
    }
}
