<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistik Pengunjung Hotel</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <style>
        .chart-container {
            width: 60%;
            margin: 20px auto;
        }
        .form-container {
            text-align: center;
            margin: 20px 0;
        }
    </style>
</head>
<body>
    <h1 style="text-align: center;">Statistik Pengunjung Hotel Berdasarkan Negara</h1>
    
    <div class="form-container">
        <form method="get" action="">
            <label for="tahun">Pilih Tahun:</label>
            <select name="tahun" id="tahun" onchange="this.form.submit()">
                <?php foreach ($tahun_options as $tahun_option): ?>
                    <option value="<?php echo $tahun_option->tahun; ?>" <?php echo ($tahun_option->tahun == $tahun_selected) ? 'selected' : ''; ?>>
                        <?php echo $tahun_option->tahun; ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </form>
    </div>
    
    <div class="chart-container">
        <canvas id="pieChart"></canvas>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Data dari controller
            const dataPengunjung = <?php echo json_encode($data_pengunjung); ?>;
            
            // Siapkan data untuk chart
            const labels = [];
            const data = [];
            const backgroundColors = [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
                'rgba(255, 159, 64, 0.7)'
            ];
            
            dataPengunjung.forEach((item, index) => {
                labels.push(item.negara);
                data.push(item.total);
            });
            
            // Buat pie chart
            const ctx = document.getElementById('pieChart').getContext('2d');
            const pieChart = new Chart(ctx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: data,
                        backgroundColor: backgroundColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'right',
                        },
                        title: {
                            display: true,
                            text: 'Distribusi Pengunjung Hotel Tahun <?php echo $tahun_selected; ?>',
                            font: {
                                size: 16
                            }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const label = context.label || '';
                                    const value = context.raw || 0;
                                    const total = context.dataset.data.reduce((a, b) => parseInt(a) + parseInt(b), 0);
                                    const percentage = Math.round((value / total) * 100);
                                    return `${label}: ${value} (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });
        });
    </script>
</body>
</html>
