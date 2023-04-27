<?php $title = "Emi - App" ?>
<?php ob_start(); ?>
    <!-- Main -->
    <main>
        <h1 style="margin: 0">Workers</h1>
        <nav aria-label="breadcrumb">
            <ul style="margin-top: 0">
                <li><a href="/app">Home</a></li>
                <li><a href="/app/workers">Workers</a></li>
                <li>New</li>
            </ul>
        </nav>
        <article>
            <header>
                <h2 style="margin: 0">Create new</h2>
            </header>
            <form action="/app/workers/new" method="post">
                <!-- Grid -->
                <div class="grid">
                    <label for="firstname">
                        First name
                        <input type="text" id="firstname" name="firstname" placeholder="First name" required>
                    </label>
                    <label for="lastname">
                        Last name
                        <input type="text" id="lastname" name="lastname" placeholder="Last name" required>
                    </label>
                </div>
                <!-- Markup example 2: input is after label -->
                <label for="code">Code</label>
                <input type="text" id="code" name="code" placeholder="Worker code" required>

                <!-- Button -->
                <button type="submit" name="submit">Submit</button>

            </form>
        </article>
    </main><!-- ./ Main -->
<?php $content = ob_get_clean(); ?>
<?php require_once('templates/app/+layout.php') ?>