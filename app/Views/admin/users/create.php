<div class="container d-flex justify-content-center p-5">
    <div class="card col-12 col-md-5 shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-5">Agregar Nuevo Usuario</h5>

            <?php if (isset($message)) : ?>
                <div class="alert alert-success" role="alert"><?= $message ?></div>
            <?php endif ?>

            <form action="<?= base_url('admin/users/create') ?>" method="post">
                <?= csrf_field() ?>

                <p class="">Información básica</p>
                <!-- Email -->
                <div class="mb-2">
                    <input type="email" class="form-control" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" required />
                </div>

                <!-- Username -->
                <div class="mb-2">
                    <input type="text" class="form-control" name="username" inputmode="text" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" required />
                </div>

                <!-- name -->
                <div class="mb-2">
                    <input type="text" class="form-control" name="name" inputmode="text" autocomplete="name" placeholder="Nombre Completo" value="<?= old('name') ?>" required />
                </div>

                <!-- name -->
                <div class="mb-4">
                    <select name="group" class="form-control" placeholder="Tipo Usuario" required>
                        <option value="">Selecciona una opción</option>
                        <option value="admin">Administrador</option>
                        <option value="user">Usuario</option>
                    </select>
                </div>

                <p class="">Contraseña</p>

                <!-- Password -->
                <div class="mb-2">
                    <input type="password" class="form-control" name="password" inputmode="text" autocomplete="new-password" placeholder="<?= lang('Auth.password') ?>" required />
                </div>

                <!-- Password (Again) -->
                <div class="mb-5">
                    <input type="password" class="form-control" name="password_confirm" inputmode="text" autocomplete="new-password" placeholder="Confirmar contraseña" required />
                </div>

                <div class="d-grid col-12 col-md-8 mx-auto m-3">
                    <button type="submit" class="btn btn-primary btn-block">Agregar Nuevo Usuario</button>
                </div>

            </form>
        </div>
    </div>
</div>