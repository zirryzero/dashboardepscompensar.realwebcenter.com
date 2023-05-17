<div class="container d-flex justify-content-center p-5">
    <div class="card col-12 col-md-5 shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-5">Editar Usuario</h5>

            <form action="<?= site_url('admin/users/update/' . $user->id) ?>" method="post">
                <?= csrf_field() ?>

                <p class="">Informacion basica</p>
                <!-- Email -->
                <div class="mb-2">
                    <input type="email" class="form-control" name="email" inputmode="email" autocomplete="email" placeholder="<?= lang('Auth.email') ?>" value="<?= $user->email ?>" required />
                </div>

                <!-- Username -->
                <div class="mb-2">
                    <input type="text" class="form-control" name="username" inputmode="text" autocomplete="username" placeholder="<?= lang('Auth.username') ?>" value="<?= $user->username ?>" required />
                </div>

                <!-- name -->
                <div class="mb-2">
                    <input type="text" class="form-control" name="name" inputmode="text" autocomplete="name" placeholder="Nombre Completo" value="<?= $user->name ?>" required />
                </div>

                <!-- name -->
                <div class="mb-4">
                    <select name="group" class="form-control" placeholder="Tipo">
                        <option value="">Tipo Usuario</option>
                        <option value="admin" <?= ($user->group == 'admin') ? 'selected' : '' ?>>Administrador</option>
                        <option value="user" <?= ($user->group == 'user') ? 'selected' : '' ?>>Usuario</option>
                    </select>
                </div>

                <!-- Password -->
                <div class="mb-2">
                    <input type="password" class="form-control" name="password" placeholder="Contraseña" required />
                </div>

                <!-- Confirm Password -->
                <div class="mb-2">
                    <input type="password" class="form-control" name="password_confirm" placeholder="Confirmar Contraseña" required />
                </div>


                <div class="d-grid col-12 col-md-8 mx-auto m-3">
                    <button type="submit" class="btn btn-primary btn-block">Actualizar Usuario</button>
                </div>

            </form>
        </div>
    </div>
</div>