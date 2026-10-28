<?php

namespace App\Controllers\cml;

use App\Controllers\BaseController;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;
use App\Models\cml\Model_cml;

class Controll_cml extends BaseController
{

    public $cml;
    public $isLogged;

    public function __construct()
    {
        $Peticion_CLI = \Config\Services::request();

        if (!$Peticion_CLI->isCLI()) {
            $this->isLogged = auth()->loggedIn();
            $this->cml = new Model_cml();
        }
    }

    public function index($num_report = 'main')
    {
        if ($this->isLogged) {
            $data['num_report'] = $num_report;
            /* ----------- DECLARACION VARIABLES ----------- */
            $data['title'] = "Compensar | Reportes";
            // $data['usuarios'] = $this->cml->pruebaModelo();
            $data['nombre'] = auth()->user()->name;
            /* ----------- FIN DECLARACION VARIABLES ----------- */

            /* ----------- ENVIO DE DATOS A LA VISTA ----------- */
            $data['content'] = "cml/view_cml_menu_principal";

            echo view('layout/main', $data);
            /* ----------- FIN ENVIO DE DATOS A LA VISTA ----------- */
        } else {
            return redirect()->to('/login');
        }
    }

    public function createUser()
    {
        if ($this->isLogged) {
            /* ----------- DECLARACION VARIABLES ----------- */
            $data['title'] = "Compensar | Crear Usuario";
            $data['nombre'] = auth()->user()->name;
            /* ----------- FIN DECLARACION VARIABLES ----------- */

            /* ----------- ENVIO DE DATOS A LA VISTA ----------- */
            $data['content'] = "admin/users/create";

            echo view('layout/main', $data);
            /* ----------- FIN ENVIO DE DATOS A LA VISTA ----------- */
        } else {
            return redirect()->to('/login');
        }
    }

    // public function uploadExcel()
    // {
    //     if ($this->isLogged) {
    //         $data['message'] = null;

    //         if ($_FILES) {
    //             $uploadPath = './excels/';
    //             $allowedTypes = array('xlsx', 'xls');
    //             $maxSize = 1024; // Tamaño máximo en KB

    //             $fileName = $_FILES['file']['name'];
    //             $fileType = $_FILES['file']['type'];
    //             $fileSize = $_FILES['file']['size'];
    //             $fileTempName = $_FILES['file']['tmp_name'];

    //             $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

    //             if (in_array($fileExtension, $allowedTypes) && ($fileSize / 1024) <= $maxSize) {
    //                 $destination = $uploadPath . $fileName;
    //                 move_uploaded_file($fileTempName, $destination);
    //                 // El archivo se subió exitosamente
    //                 $data['message'] = 'Archivo subido exitosamente';
    //             } else {
    //                 // Error al subir el archivo
    //                 $data['message'] = 'Error al subir el archivo';
    //             }
    //         }

    //         /* ----------- DECLARACION VARIABLES ----------- */
    //         $data['title'] = "Compensar | Subir Excel";
    //         // $data['nombre'] = auth()->user()->name;
    //         /* ----------- FIN DECLARACION VARIABLES ----------- */

    //         /* ----------- ENVIO DE DATOS A LA VISTA ----------- */
    //         $data['content'] = "cml/view_cml_subir_excel";

    //         echo view('layout/main', $data);
    //         /* ----------- FIN ENVIO DE DATOS A LA VISTA ----------- */
    //     } else {
    //         return redirect()->to('/login');
    //     }
    // }

    public function uploadExcel()
    {
        if ($this->isLogged) {
            $data['message'] = null;
            $uploadedFiles = array();

            if ($_FILES) {
                $uploadPath = './excels/';
                $allowedTypes = array('xlsx', 'xls');
                $maxSize = 20 * 1024; // Tamaño máximo en KB

                // Recorremos cada archivo
                for ($i = 1; $i <= 4; $i++) {
                    $fileName = $_FILES["file$i"]['name'];
                    $fileType = $_FILES["file$i"]['type'];
                    $fileSize = $_FILES["file$i"]['size'];
                    $fileTempName = $_FILES["file$i"]['tmp_name'];

                    $fileExtension = pathinfo($fileName, PATHINFO_EXTENSION);

                    if (in_array($fileExtension, $allowedTypes) && ($fileSize / 1024) <= $maxSize) {
                        $destination = $uploadPath . $fileName;
                        move_uploaded_file($fileTempName, $destination);
                        // El archivo se subió exitosamente
                        $data['message'] = 'Archivos subidos exitosamente';
                        $subidos = true;
                        $uploadedFiles[$i] = $destination;
                    } else {
                        // Error al subir el archivo
                        $subidos = false;
                        $data['message'] = 'Error al subir el archivo';
                        break;
                    }
                }

                // Si no hubo errores, procesamos los archivos
                // if ($subidos) {
                //     ini_set('memory_limit', '2048M');

                //     $data['message'] = 'Archivos subidos exitosamente';
                //     $data['excelsData'] = array();
                //     for ($i = 1; $i <= 3; $i++) {
                //         $destination = $uploadedFiles[$i];
                //         $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
                //         $reader->setReadDataOnly(true);
                //         $spreadsheet = $reader->load($destination);

                //         $worksheet = $spreadsheet->getActiveSheet();
                //         $rows = $worksheet->toArray();

                //         $keys = array_shift($rows);
                //         $excelsData[$i] = array();
                //         foreach ($rows as $row) {
                //             $excelsData[$i][] = array_combine($keys, $row);
                //         }
                //     }

                //     // Enviamos los datos de los excels a la vista
                //     $data['excelsData'] = $excelsData;

                //     var_dump($excelsData);
                //     die;
                // }
            }

            /* ----------- DECLARACION VARIABLES ----------- */
            $data['title'] = "Compensar | Subir Excel";
            // $data['nombre'] = auth()->user()->name;
            /* ----------- FIN DECLARACION VARIABLES ----------- */

            /* ----------- ENVIO DE DATOS A LA VISTA ----------- */
            $data['content'] = "cml/view_cml_subir_excel";

            echo view('layout/main', $data);
            /* ----------- FIN ENVIO DE DATOS A LA VISTA ----------- */
        } else {
            return redirect()->to('/login');
        }
    }
}