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
            <table role="grid" id="mytable">
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
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
<script>
    $(document).ready(function (){
        $('#mytable').DataTable();
    })
</script>
<?php $content = ob_get_clean(); ?>
<?php require_once('templates/app/+layout.php') ?>