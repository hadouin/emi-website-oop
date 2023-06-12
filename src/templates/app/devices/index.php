<?php $title = "Emi - App" ?>
<?php ob_start(); ?>
    <!-- Main -->
    <main>
        <h1 style="margin: 0">Devices</h1>
        <nav aria-label="breadcrumb">
            <ul style="margin-top: 0">
                <li><a href="/app">Home</a></li>
                <li>Admin</li>
            </ul>
        </nav>
        <article>
            <label for="search">Rechercher:</label>
            <input type="text" placeholder="Rechercher un Appareil" id="search">
            <figure>
                <table role="grid">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Code</th>
                    </tr>
                    </thead>
                    <tbody id="table-body">
                    <?php /** @var array $devices */
                    foreach ($devices as $device): ?>
                        <tr>
                            <td><?php echo $device->getId(); ?></td>
                            <td><?php echo $device->getCode(); ?></td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </figure>
        </article>

        <a href="#" role="button">+ New Device</a>
    </main><!-- ./ Main -->
<?php $content = ob_get_clean(); ?>
<?php require_once('templates/app/+layout.php') ?>