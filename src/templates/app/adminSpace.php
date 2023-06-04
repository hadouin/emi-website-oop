<?php $title = "Emi - App" ?>
<?php ob_start(); ?>
    <!-- Main -->
    <main>
        <h1 style="margin: 0">Admin Space</h1>
        <nav aria-label="breadcrumb">
            <ul style="margin-top: 0">
                <li><a href="/app">Home</a></li>
                <li>Admin Space</li>
            </ul>
        </nav>
        <article>
            <figure>

                <table role="grid">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php /** @var array $users */
                    foreach ($users as $user): ?>
                        <tr>
                            <td><?php echo $user['user_id']; ?></td>
                            <td><?php echo $user['user_uid'] ?></td>
                            <td><?php echo $user['user_email']; ?></td>
                            <td><?php echo $user['user_role']; ?></td>
                            <td>
                                <button onclick="supprimerLigne(<?php echo $user['user_id']; ?>)" style="font-size: 0.9em; width: 50%">Supprimer</button>
                            </td>

                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </figure>
        </article>

        <a href="/app/AdminSpace/newCode" role="button" id="bouton-ajoue">+ New User code</a>
    </main><!-- ./ Main -->
    <script>
        // Fonction appelée lors du clic sur le bouton "New User code"
        function demanderConfirmation() {
            // Afficher une boîte de dialogue de confirmation
            var confirmation = confirm("Êtes-vous sûr de vouloir ajouter un nouveau code utilisateur ?");

            // Vérifier la réponse de l'utilisateur
            if (confirmation) {
                // L'utilisateur a confirmé, exécutez les actions souhaitées
                window.location.href = "/app/AdminSpace/newCode"; // Redirection vers la page "newCode"
            } else {
                // L'utilisateur a annulé, ne faites rien ou exécutez des actions alternatives
                console.log("Ajout annulé !");
                event.preventDefault();
            }
        }

        function supprimerLigne(userId) {
            var confirmation = confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur ?");

            if (confirmation) {
                // Redirection vers la page de suppression avec l'ID de l'utilisateur
                window.location.href = "/app/AdminSpace/supprimerCode?userId=" + userId;
            } else {
                console.log("Suppression annulée !");
            }
        }

        // Ajouter un écouteur d'événement au bouton "New User code"
        var boutonAjout = document.getElementById("bouton-ajoue");
        boutonAjout.addEventListener("click", demanderConfirmation);
    </script>
<?php $content = ob_get_clean(); ?>
<?php require_once('templates/app/+layout.php') ?>