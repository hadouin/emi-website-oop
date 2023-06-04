<?php $title = "Emi - App" ?>
<?php ob_start(); ?>
    <!-- Main -->
    <main>
        <h1 style="margin: 0">Workers</h1>
        <nav aria-label="breadcrumb">
            <ul style="margin-top: 0">
                <li><a href="/app">Home</a></li>
                <li>Admin</li>
            </ul>
        </nav>
        <article>
            <figure>

            <table role="grid">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Code</th>
                </tr>
                </thead>
                <tbody>
                <?php /** @var array $workers */
                foreach ($workers as $worker): ?>
                    <tr>
                        <td><?php echo $worker->getId(); ?></td>
                        <td><?php echo $worker->getFirstName(); ?></td>
                        <td><?php echo $worker->getLastName(); ?></td>
                        <td><?php echo $worker->getCode(); ?></td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
            </figure>
        </article>

        <a href="/app/workers/new" role="button">+ New worker</a>
    </main><!-- ./ Main -->
<?php $content = ob_get_clean(); ?>
<?php require_once('templates/app/+layout.php') ?>