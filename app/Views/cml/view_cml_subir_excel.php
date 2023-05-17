<div class="container d-flex justify-content-center p-5">
    <div class="card col-12 col-md-5 shadow-sm">
        <div class="card-body">
            <h5 class="card-title mb-5">Subir archivo Excel</h5>

            <?php if ($message !== null) : ?>
            <div class="alert alert-success" role="alert"><?= $message ?></div>
            <?php endif ?>

            <form action="<?= base_url('saveExcel') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <!-- Primer archivo -->
                <div class="mb-3">
                    <label for="file1" class="form-label">Seleccionar Excel (Citas Futuras):</label>
                    <input type="file" class="form-control" id="file1" name="file1" accept=".xlsx, .xls" required>
                </div>

                <!-- Segundo archivo -->
                <div class="mb-3">
                    <label for="file2" class="form-label">Seleccionar Excel (Gestion):</label>
                    <input type="file" class="form-control" id="file2" name="file2" accept=".xlsx, .xls" required>
                </div>

                <!-- Tercer archivo -->
                <div class="mb-3">
                    <label for="file3" class="form-label">Seleccionar Excel (Oferta):</label>
                    <input type="file" class="form-control" id="file3" name="file3" accept=".xlsx, .xls" required>
                </div>

                <!-- Tercer archivo -->
                <div class="mb-3">
                    <label for="file3" class="form-label">Seleccionar Excel (Contratacion Mensual):</label>
                    <input type="file" class="form-control" id="file4" name="file4" accept=".xlsx, .xls" required>
                </div>

                <div class="d-grid col-12 col-md-8 mx-auto m-3">
                    <!-- <button type="submit" class="btn btn-primary btn-block">Subir archivos</button> -->
                    <button type="submit" class="btn btn-primary btn-block" id="submit-btn" disabled>Subir
                        archivos</button>
                </div>
            </form>

        </div>
    </div>
</div>

<script>
const file1Input = document.getElementById('file1');
const file2Input = document.getElementById('file2');
const file3Input = document.getElementById('file3');
const file4Input = document.getElementById('file4');
const submitBtn = document.getElementById('submit-btn');

function validateFiles() {
    if (file1Input.files.length > 0 && file2Input.files.length > 0 && file3Input.files.length > 0 && file4Input.files
        .length > 0) {
        submitBtn.disabled = false;
    } else {
        submitBtn.disabled = true;
    }
}

file1Input.addEventListener('change', validateFiles);
file2Input.addEventListener('change', validateFiles);
file3Input.addEventListener('change', validateFiles);
file4Input.addEventListener('change', validateFiles);
</script>