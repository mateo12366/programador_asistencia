<div class="container">
    <h2><?php echo $title; ?></h2>
    
    <?php if (isset($error)): ?>
        <div class="alert alert-danger">
            <?php echo $error; ?>
        </div>
    <?php endif; ?>

    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php if (isset($programas) && !empty($programas)): ?>
                    <?php foreach ($programas as $programa): ?>
                        <tr>
                            <td><?php echo $programa->id; ?></td>
                            <td><?php echo $programa->nombre; ?></td>
                            <td>
                                <a href="/programaFormacion/view/<?php echo $programa->id; ?>" class="btn btn-info btn-sm">Ver</a>
                                <a href="/programaFormacion/edit/<?php echo $programa->id; ?>" class="btn btn-warning btn-sm">Editar</a>
                                <a href="/programaFormacion/delete/<?php echo $programa->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('¿Está seguro de eliminar este programa?')">Eliminar</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="3" class="text-center">No hay programas de formación registrados</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <a href="/programaFormacion/new" class="btn btn-primary">Nuevo Programa</a>
</div>