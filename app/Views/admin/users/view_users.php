<div class="container d-flex justify-content-center p-5">
    <div class="card col-12 col-md-10 shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-5">Todos los Usuarios</h5>

            <?php if (isset($message)) : ?>
                <div class="alert alert-success" role="alert"><?= $message ?></div>
            <?php endif ?>

            <?php if (!empty($users)) : ?>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Nombre Completo</th>
                            <th>Tipo Usuario</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $user) : ?>
                            <tr>
                                <td><?= $user->email ?></td>
                                <td><?= $user->username ?></td>
                                <td><?= $user->name ?></td>
                                <td><?= $user->group ?></td>
                                <td>
                                    <a href="<?= site_url('admin/users/edit/' . $user->id) ?>" class="btn btn-primary">Editar</a>
                                    <form action="<?= site_url('admin/users/delete/' . $user->id) ?>" method="post" style="display: inline-block;">
                                        <?= csrf_field() ?>
                                        <button type="submit" class="btn btn-danger">Eliminar</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else : ?>
                <p>No hay usuarios registrados.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
<div class="d-grid col-12 col-md-4 mx-auto m-3">
    <a href="<?= site_url('admin/users/create') ?>" class="btn btn-primary btn-block">Agregar nuevo usuario</a>
</div>