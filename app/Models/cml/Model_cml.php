<?php

namespace App\Models\cml;

use CodeIgniter\Model;

class Model_cml extends Model
{
    /**
     * --------------------------------------------------------------------------
     * Prueba base de datos Create by: Harold Perez 2023/04/18
     * --------------------------------------------------------------------------
     * Este modelo prueba la conexion a la base de datos
     * 
     */
    public function pruebaModelo()
    {
        return $this->db->table("users")
            ->select("*")
            ->get()
            ->getResultArray();
    }
}