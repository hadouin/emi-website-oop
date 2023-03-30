<?php $title = "Emi - App" ?>
<?php ob_start(); ?>
    <!-- Main -->
    <main>
        <h1 style="margin-top: 0">Dashboard</h1>
        <div class="grid">
            <div>
                <article>
                    <canvas id="myChart"></canvas>
                </article>
            </div>
            <div>
                <article>
                    <canvas id="myOtherChart"></canvas>
                </article>
            </div>
        </div>
    </main><!-- ./ Main -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        const ctx = document.getElementById('myChart');

        const data = {
            labels: ['Value', 'Gray Area'],
            datasets: [{
                label: '# of Votes',
                data: [70, 30],
                borderWidth: 1,
                cutout:'90%',
            }],

        };

        // gauge chart text plugin
        const gaugeChartText = {
            id: 'gaugeChartText',
            afterDatasetsDraw(chart, args, options, cancelable) {
                const { ctx , data, chartArea : { top, bottom, left, right, width, height}, scales:{r} } = chart;
                ctx.save();
                const xCorr = chart.getDatasetMeta(0).data[0].x;
                const yCorr = chart.getDatasetMeta(0).data[0].y;

            }
        }

        const config = {
            type: 'doughnut',
            data,
            options: {
                plugins: {
                    tooltip: {
                        enabled: false
                    },
                    legend: {
                        display: false
                    },
                },
                circumference: 180,
                rotation: -90,
            }
        }

        new Chart(ctx, config);

    </script>
<?php $content = ob_get_clean(); ?>
<?php require('+layout.php') ?>