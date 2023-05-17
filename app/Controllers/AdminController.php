<?php

namespace App\Controllers;

use App\Controllers\BaseController;

use CodeIgniter\Shield\Entities\User;

class AdminController extends BaseController
{
    public function createUser($message = null)
    {
        $data['message'] = $message;
        // Verifique si el usuario actual es un administrador
        $auth = auth();
        if (!$auth->loggedIn() || !$auth->user()->inGroup('admin')) {
            return redirect()->to('/');
        }

        /* ----------- DECLARACION VARIABLES ----------- */
        $data['title'] = "Compensar | Crear Usuario";
        $data['nombre'] = auth()->user()->name;
        /* ----------- FIN DECLARACION VARIABLES ----------- */

        /* ----------- ENVIO DE DATOS A LA VISTA ----------- */
        $data['content'] = "admin/users/create";

        echo view('layout/main', $data);
    }

    public function storeUser()
    {
        $data['message'] = null;

        // Verifique si el usuario actual es un administrador
        $auth = auth();
        if (!$auth->loggedIn() || !$auth->user()->inGroup('admin')) {
            return redirect()->to('/');
        }

        $users = model('UserModel');

        if (!($this->request->getPost('password') === $this->request->getPost('password_confirm'))) {
            $message = "Las contraseñas no coinciden.";
            $this->createUser($message);
            die;
        }

        if ($users->findByCredentials(['email' => $this->request->getPost('email')])) {
            $message = "El usuario " . $this->request->getPost('email') . " ya existe, por favor verifique.";
            $this->createUser($message);
            die;
        }

        $user = new User([
            'username' => $this->request->getPost('username'),
            'email'    => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'name' => $this->request->getPost('name'),
            'group' => $this->request->getPost('group'),
        ]);

        $users->save($user);

        // To get the complete user object with ID, we need to get from the database
        $user = $users->findById($users->getInsertID());


        $group = $this->request->getPost('group');

        // Add to default group
        // $users->addGroup($user);
        $users->addUserGroup($user, $group);

        //activate user
        if ($users->activate($user)) {
            $message = 'Usuario Activado';
        } else {
            // Error al subir el archivo
            $message = 'Usuario creado';
        }

        $this->createUser($message);
    }

    public function viewUsers($message = null)
    {
        $auth = auth();
        if (!$auth->loggedIn() || !$auth->user()->inGroup('admin')) {
            return redirect()->to('/');
        }

        $users = model('UserModel');

        // Aquí obtendrías todos los usuarios de tu modelo de usuario
        $allUsers = $users->findAll();

        /* ----------- DECLARACION VARIABLES ----------- */
        $data['title'] = "Compensar | Ver Usuarios";
        $data['nombre'] = auth()->user()->name;
        $data['users'] = $allUsers;
        $data['message'] = $message;
        /* ----------- FIN DECLARACION VARIABLES ----------- */

        $data['content'] = "admin/users/view_users";

        // Pasamos los usuarios a la vista
        echo view('layout/main', $data);
    }

    public function edit_user($id)
    {
        $auth = auth();
        if (!$auth->loggedIn() || !$auth->user()->inGroup('admin')) {
            return redirect()->to('/');
        }

        if ($id != 1) {
            // Validar los datos de entrada
            $validation =  \Config\Services::validation();
            $validation->setRules([
                'email' => 'required|valid_email',
                'username' => 'required',
                'name' => 'required',
                'group' => 'required',
                'password' => 'required|min_length[6]',
                'password_confirm' => 'matches[password]',
            ]);

            $data['validation'] = $this->validator;
            $users = model('UserModel');

            /* ----------- DECLARACION VARIABLES ----------- */
            $data['title'] = "Compensar | Ver Usuarios";
            $data['nombre'] = auth()->user()->name;
            $data['user'] = $users->find($id);

            /* ----------- FIN DECLARACION VARIABLES ----------- */

            $data['content'] = "admin/users/edit_user";

            // Pasamos los usuarios a la vista
            echo view('layout/main', $data);
        } else {
            $message = "Este Usuario no se puede Editar";
            $this->viewUsers($message);
            die;
        }
    }

    public function update($id)
    {
        $auth = auth();
        if (!$auth->loggedIn() || !$auth->user()->inGroup('admin')) {
            return redirect()->to('/');
        }

        if ($id != 1) {
            helper('form');
            $userModel = model('UserModel');
            // $user = $userModel->find($id);

            if (!($this->request->getPost('password') === $this->request->getPost('password_confirm'))) {
                $message = "Las contraseñas no coinciden.";
                $this->createUser($message);
                die;
            }

            $user = new User([
                'id' => $id,
                'username' => $this->request->getPost('username'),
                'email'    => $this->request->getPost('email'),
                'password' => $this->request->getPost('password'),
                'name' => $this->request->getPost('name'),
                'group' => $this->request->getPost('group'),
            ]);

            $userModel->update($id, $user);

            // To get the complete user object with ID, we need to get from the database
            $user = $userModel->findById($id);
            
            $groupModel = model('GroupModel');
            $groupModel->deleteAll($id);

            $group = $this->request->getPost('group');

            $userModel->addUserGroup($user, $group);

            // Actualizar usuario
            $userModel->update($id, [
                // 'email' => $this->request->getVar('email'),
                'username' => $this->request->getVar('username'),
                'name' => $this->request->getVar('name'),
                // 'group' => $this->request->getVar('group'),
                // 'password' => password_hash($this->request->getVar('password'), PASSWORD_DEFAULT),
            ]);

            return redirect()->to('viewUsers');
        } else {
            $message = "Este Usuario no se puede Editar";
            $this->viewUsers($message);
            die;
        }
    }

    public function delete($id)
    {
        if ($id != 1) {
            $userModel = model('UserModel');
            $groupModel = model('GroupModel');
            $userIdentityModel = model('UserIdentityModel');

            $user = $userModel->find($id);

            if (!$user) {
                $message = "El usuario que intenta eliminar no existe.";
                $this->viewUsers($message);
                die;
                // return redirect()->back()->with('error', 'El usuario que intenta eliminar no existe.');
            }

            if ($userModel->delete($id)) {
                $groupModel->deleteAll($id);
                $userIdentityModel->deleteIdentitiesByType($user, "email_password");
                $message = "Usuario eliminado exitosamente.";
                $this->viewUsers($message);
                die;
                // return redirect()->back()->with('success', 'Usuario eliminado exitosamente.');
            }
        } else {
            $message = "Este Usuario no se puede Eliminar";
            $this->viewUsers($message);
            die;
        }
    }
}
