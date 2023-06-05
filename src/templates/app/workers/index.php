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
            <label for="search">Rechercher:</label>
            <input type="text" placeholder="Rechercher un travaileur" id="search">
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
                <tbody id="table-body">
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
    <script>
        // Get the reference to the search input element
        var searchInput = document.getElementById('search');

        // Add event listener to the search input for the keyup event
        searchInput.addEventListener('keyup', function() {
            // Get the search query from the input value
            var query = searchInput.value;

            // Create a new XMLHttpRequest object
            var xhr = new XMLHttpRequest();

            // Define the request URL with the search query
            var url = 'http://localhost:2003/api/worker/search?q=' + encodeURIComponent(query);

            // Configure the AJAX request
            xhr.open('GET', url, true);

            // Set the callback function to handle the response
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
                    // Parse the response as JSON
                    var response = JSON.parse(xhr.responseText);

                    // Get a reference to the table body element
                    var tableBody = document.getElementById('table-body');

                    // Clear the table body
                    tableBody.innerHTML = '';

                    // Iterate over the response data and build the table rows
                    response.forEach(function(item) {
                        var row = document.createElement('tr');
                        var cell1 = document.createElement('td');
                        var cell2 = document.createElement('td');
                        var cell3 = document.createElement('td');
                        var cell4 = document.createElement('td');

                        // Set the cell values
                        cell1.textContent = item.id;
                        cell2.textContent = item.firstName;
                        cell3.textContent = item.lastName;
                        cell4.textContent = item.code;

                        // Append the cells to the row
                        row.appendChild(cell1);
                        row.appendChild(cell2);
                        row.appendChild(cell3);
                        row.appendChild(cell4);

                        // Append the row to the table body
                        tableBody.appendChild(row);
                    });
                }
            };

            // Send the AJAX request
            xhr.send();
        });
    </script>
<?php $content = ob_get_clean(); ?>
<?php require_once('templates/app/+layout.php') ?>