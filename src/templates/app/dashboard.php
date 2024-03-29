<?php $title = "Emi - App" ?>
<?php ob_start(); ?>
    <!-- Main -->
    <main>
        <h1 style="margin-top: 0">Dashboard</h1>
        <div class="grid">
            <div style="height: 300px">
                <article>
                    <header style="font-weight: bold; margin-bottom: 0; display: flex; justify-content: space-between">
                        Appareil G10D
                        <div style="display: flex; align-items: center; margin-right: 2rem">
                            <a href="#" onclick="sendLedCommand('G10D', 'red')" role="button" style="background-color: tomato; border-color: tomato">RED</a>
                            <a href="#" onclick="sendLedCommand('G10D', 'green')" role="button" style="margin: 0 1rem; background-color: mediumseagreen; border-color: mediumseagreen">GREEN</a>
                            <a href="#" onclick="sendLedCommand('G10D', 'blue')" role="button" style="margin-right: 1rem">BLUE</a>
                            <a href="#" onclick="sendLedCommand('G10D', 'off')" role="button" class="secondary" style="margin-right: 2rem">OFF</a>
                            <form style="display: flex; align-items: center; margin-bottom: 0" onsubmit="onSubmitOLEDString(event, 'G10D')">
                                <!-- Pattern of 4 chars-->
                                <input id="oled_string" pattern="[a-zA-Z0-9]{4}" type="text" style="margin-bottom: 0; border-top-right-radius: 0; border-bottom-right-radius: 0">
                                <input type="submit" style="margin-bottom: 0; border-top-left-radius: 0; border-bottom-left-radius: 0">
                            </form>
                        </div>
                    </header>
                    <div style="display: flex; gap: 2rem; margin-bottom: 0; transition: all 0.2s ease-in-out">
                        <span>
                            <canvas id="myChart"></canvas>
                            <p id="temp_value" style="width: 100%; text-align: center; font-size: xxx-large; font-weight: bold; margin-top: -6rem">15</p>
                            <p style="width: 100%; text-align: center; font-size: large; margin-top: -4rem">Capteur de Température</p>
                        </span>
                        <span>
                            <canvas id="myChart2"></canvas>
                            <p id="hum_value" style="width: 100%; text-align: center; font-size: xxx-large; font-weight: bold; margin-top: -6rem">45</p>
                            <p style="width: 100%; text-align: center; font-size: large; margin-top: -4rem">Capteur d'humidité</p>
                        </span>
                        <span>
                            <canvas id="myChart3"></canvas>
                            <p id="c02_value" style="width: 100%; text-align: center; font-size: xxx-large; font-weight: bold; margin-top: -6rem">75</p>
                            <p style="width: 100%; text-align: center; font-size: large; margin-top: -4rem">Capteur de C02</p>
                        </span>
                        <span>
                            <canvas id="myChart4"></canvas>
                            <p id="sound_value" style="width: 100%; text-align: center; font-size: xxx-large; font-weight: bold; margin-top: -6rem">45</p>
                            <p style="width: 100%; text-align: center; font-size: large; margin-top: -4rem">Capteur de son</p>
                        </span>
                    </div>
                </article>
            </div>
        </div>
    </main><!-- ./ Main -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        function sendCommand(team, trame) {
            const url = "http://projets-tomcat.isep.fr:8080/appService" + "?ACTION=COMMAND&TEAM=" + team + "&TRAME=" + trame;
            fetch(url)
                .then(response => response.text())
                .then(data => console.log(data));
        }

        function sendLedCommand(team, color) {
            let value;
            switch (color) {
                case "red":
                    value = "1001";
                    break;
                case "green":
                    value = "1002";
                    break;
                case "blue":
                    value = "1003";
                    break;
                case "off":
                    value = "1000";
                    break;
                default:
                    value = "1000";
                    break;
            }
            const trame = "1" + team + "2" + "1" + "01" + value + "00";
            console.log("Sending LED command: " + trame + " to team " + team + "...")
            sendCommand(team, trame);
        }

        function onSubmitOLEDString(event, team) {
            event.preventDefault();
            const inputValue = event.target.elements.oled_string.value;
            event.target.elements.oled_string.value = "";
            const truncatedValue = inputValue.substring(0, 4);
            const trame = "1" + team + "2" + "2"+ "01" + truncatedValue + "00";
            console.log("Sending OLED command: " + trame + " to team " + team + "...")
            sendCommand(team, trame);
        }

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

        // Update chart value
        function updateChart(chart, value, max = 100) {
            chart.data.datasets[0].data[0] = value;
            chart.data.datasets[0].data[1] = max - value;
            chart.update();
        }

        // Ajax to update chart value
        const url = "http://projets-tomcat.isep.fr:8080/appService" + "?ACTION=GETLOG&TEAM=G10D";
        const pattern = /(.{1})(.{4})(.{1})(.{1})(.{2})(.{4})(.{4})(.{2})(.{4})(.{2})(.{2})(.{2})(.{2})(.{2})/;
        let offset = 0;

        function updateCharts(dataArray) {
            // update temp value by finding first trame with c = 3
            const tempTrame = dataArray.find(trame => trame.c === '3');
            if (tempTrame) {
                const tempValue = tempTrame.v / 10;
                updateChart(gaugeChart, tempValue, 40);
                document.getElementById('temp_value').innerHTML = tempValue;
            }

            // update hum value by finding first trame with c = 4
            const humTrame = dataArray.find(trame => trame.c === '4');
            if (humTrame) {
                const humValue = humTrame.v / 10;
                updateChart(gaugeChart2, humValue);
                document.getElementById('hum_value').innerHTML = humValue + '%';
            }

            // update c02 value by finding first trame with c = 5
            const c02Trame = dataArray.find(trame => trame.c === '9');
            if (c02Trame) {
                const c02Value = c02Trame.v;
                updateChart(gaugeChart3, c02Value);
                document.getElementById('c02_value').innerHTML = c02Value;
            }

            // update sound value by finding first trame with c = 6
            const soundTrame = dataArray.find(trame => trame.c === '6');
            if (soundTrame) {
                const soundValue = soundTrame.v;
                updateChart(gaugeChart4, soundValue);
                document.getElementById('sound_value').innerHTML = soundValue;
            }
        }

        function fetchData() {
            console.log('fetching data')
            offset += 2;
            fetch(url)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Error fetching data from the URL');
                    }
                    return response.text();
                })
                .then(data => {
                    const dataTab = data.match(/.{1,33}/g);
                    const dataArray = dataTab.map(trame => {
                        const [_, t, o, r, c, n, v, a, x, year, month, day, hour, min, sec] = trame.match(pattern);
                        return {
                            t,
                            o,
                            r,
                            c,
                            n,
                            v,
                            a,
                            x,
                            year,
                            month,
                            day,
                            hour,
                            min,
                            sec
                        };
                    });

                    dataArray.sort((a, b) => {
                        const dateA = new Date(`${a.year}-${a.month}-${a.day}T${a.hour}:${a.min}:${a.sec}`);
                        const dateB = new Date(`${b.year}-${b.month}-${b.day}T${b.hour}:${b.min}:${b.sec}`);
                        return dateB - dateA;
                        });

                    return dataArray;
                })
                .then(dataArray => {
                    updateCharts(dataArray)
                })
                .catch(error => {
                    console.error(error);
                });
        }
        setInterval(fetchData, 500);
    </script>
<?php $content = ob_get_clean(); ?>
<?php require('+layout.php') ?>