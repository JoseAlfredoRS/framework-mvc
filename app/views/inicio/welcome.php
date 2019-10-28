<?php URL::include_('assets.header') ?>

<div class="container" style="margin-top:80px">
    <div class="row">
        <?php if (Auth::state()) : ?>
            <div class="col-lg-12">
                <h3>Tabla Sucursal</h3>
                <table class="table table-bordered table-hover">
                    <thead class="bg-primary text-white">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Distrito</th>
                            <th scope="col">Dirección</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($sucursales as $row) : ?>
                            <tr>
                                <th scope="row"><?php echo ($row['chr_sucucodigo']) ?></th>
                                <td><?php echo ($row['vch_sucunombre']) ?></td>
                                <td><?php echo ($row['vch_sucuciudad']) ?></td>
                                <td><?php echo ($row['vch_sucudireccion']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-12">
                <button type="button" class="btn btn-primary" onclick="pruebaAjax()">Prueba Ajax</button>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php URL::include_('assets.scripts') ?>

<?php if (Auth::state()) : ?>
    <script>
        $(document).ready(function() {
            pruebaAjax();
        });

        const RUTA_URL = '<?php URl::route() ?>';

        var pruebaAjax = () => {
            $.post(RUTA_URL + 'inicio/index', function(data) {
                console.log(data);
            });
        }
    </script>
<?php endif; ?>

<?php URL::include_('assets.footer') ?>