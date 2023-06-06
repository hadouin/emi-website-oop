<?php $title = "Emi - App" ?>
<?php ob_start(); ?>
    <!-- Main -->
    <main>
        <h1 style="margin-top: 0">Dashboard</h1>
        <div class="grid">
            <div style="height: 300px">
                <article>
                    <header style="font-weight: bold">
                        Appareil numéro 1
                    </header>
                    <div style="display: flex; gap: 2rem; margin-bottom: 0">
                        <span>
                            <canvas id="myChart"></canvas>
                            <p style="width: 100%; text-align: center; font-size: xxx-large; font-weight: bold; margin-top: -6rem">15</p>
                            <p style="width: 100%; text-align: center; font-size: large; margin-top: -4rem">Capteur thermique</p>
                        </span>
                        <span>
                            <canvas id="myChart2"></canvas>
                            <p style="width: 100%; text-align: center; font-size: xxx-large; font-weight: bold; margin-top: -6rem">45</p>
                            <p style="width: 100%; text-align: center; font-size: large; margin-top: -4rem">Capteur d'humidité</p>
                        </span>
                        <span>
                            <canvas id="myChart3"></canvas>
                            <p style="width: 100%; text-align: center; font-size: xxx-large; font-weight: bold; margin-top: -6rem">75</p>
                            <p style="width: 100%; text-align: center; font-size: large; margin-top: -4rem">Capteur de C02</p>
                        </span>
                        <span>
                            <canvas id="myChart4"></canvas>
                            <p style="width: 100%; text-align: center; font-size: xxx-large; font-weight: bold; margin-top: -6rem">45</p>
                            <p style="width: 100%; text-align: center; font-size: large; margin-top: -4rem">Capteur de son</p>
                        </span>
                    </div>
                </article>
                <article>
                    <header style="font-weight: bold">
                        Device 2
                    </header>
                    <div style="display: flex; gap: 2rem; margin-bottom: 0">
                        <span>
                            <canvas id="myOtherChart"></canvas>
                            <p style="width: 100%; text-align: center; font-size: xxx-large; font-weight: bold; margin-top: -6rem">45</p>
                            <p style="width: 100%; text-align: center; font-size: large; margin-top: -4rem">ok depart</p>
                        </span>
                        <span>
                            <canvas id="myOtherChart2"></canvas>
                            <p style="width: 100%; text-align: center; font-size: xxx-large; font-weight: bold; margin-top: -6rem">45</p>
                            <p style="width: 100%; text-align: center; font-size: large; margin-top: -4rem">ok depart</p>
                        </span>
                        <span>
                            <canvas id="myOtherChart3"></canvas>
                            <p style="width: 100%; text-align: center; font-size: xxx-large; font-weight: bold; margin-top: -6rem">45</p>
                            <p style="width: 100%; text-align: center; font-size: large; margin-top: -4rem">ok depart</p>
                        </span>
                        <span>
                            <canvas id="myOtherChart4"></canvas>
                            <p style="width: 100%; text-align: center; font-size: xxx-large; font-weight: bold; margin-top: -6rem">45</p>
                            <p style="width: 100%; text-align: center; font-size: large; margin-top: -4rem">ok depart</p>
                        </span>
                    </div>
                </article>
            </div>
        </div>
    </main><!-- ./ Main -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script defer>
        // Chart data and options
        var data = {
            datasets: [{
                data: [75, 25],
                backgroundColor: ['rgba(54, 162, 235, 0.8)', "#ffffff22"],
                borderWidth: 0
            }]
        };

        var data45 = {
            datasets: [{
                data: [45, 55],
                backgroundColor: ['rgba(54, 162, 235, 0.8)', "#ffffff22"],
                borderWidth: 0
            }]
        };

        var data15 = {
            datasets: [{
                data: [15, 85],
                backgroundColor: ['rgba(54, 162, 235, 0.8)', "#ffffff22"],
                borderWidth: 0
            }]
        };

        var options = {
            rotation: -90,
            circumference: 180,
            tooltips: {enabled: false},
            legend: {display: false},
            animation: {duration: 0},
        };

        // Create gauge chart
        const ctx = document.getElementById('myChart');
        const ctx2 = document.getElementById('myChart2');
        const ctx3 = document.getElementById('myChart3');
        const ctx4 = document.getElementById('myChart4');

        var gaugeChart = new Chart(ctx, {
            type: 'doughnut',
            data: data15,
            options: options
        });
        var gaugeChart2 = new Chart(ctx2, {
            type: 'doughnut',
            data: data45,
            options: options
        });
        var gaugeChart3 = new Chart(ctx3, {
            type: 'doughnut',
            data: data,
            options: options
        });
        var gaugeChart4 = new Chart(ctx4, {
            type: 'doughnut',
            data: data,
            options: options
        });

        // Chart data and options
        const ctx5 = document.getElementById('myOtherChart');
        const ctx6 = document.getElementById('myOtherChart2');
        const ctx7 = document.getElementById('myOtherChart3');
        const ctx8 = document.getElementById('myOtherChart4');

        var gaugeChart5 = new Chart(ctx5, {
            type: 'doughnut',
            data: data,
            options: options
        });
        var gaugeChart6 = new Chart(ctx6, {
            type: 'doughnut',
            data: data,
            options: options
        });
        var gaugeChart7 = new Chart(ctx7, {
            type: 'doughnut',
            data: data,
            options: options
        });
        var gaugeChart8 = new Chart(ctx8, {
            type: 'doughnut',
            data: data,
            options: options
        });
    </script>
<?php $content = ob_get_clean(); ?>
<?php require('+layout.php') ?>