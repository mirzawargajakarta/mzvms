<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">

	<!-- Main content -->
	<section class="content p-3">

		<div class="rounded mt-4 p-4 bg-white shadow-lg ">
			<h1 class="h3 text-black"><?= $title; ?></h1>
		</div>

		<form action="<?=base_url('visreport')?>" method="post" accept-charset="utf-8">
		<div class="rounded mt-4 p-4 bg-white shadow-lg ">
			<div class="col-md-12">
				<div class="form-row">
					<div class="form-group col-md-3">
						<label for="tglmulai"><strong>Start Date</strong></label>
						<input type="text" name="tglmulai" placeholder="Enter Start Date" id="tglmulai" autocomplete="off" class="form-control datepicker" required value="<?=$datefrom?>">
					</div>
					<div class="form-group col-md-3">
						<label for="tglberakhir"><strong>End Date</strong></label>
						<input type="text" name="tglberakhir" placeholder="Enter End Date" id="tglberakhir" autocomplete="off" class="form-control datepicker" required value="<?=$dateto?>">
					</div>
                </div>
				<div class="form-row">
					<div class="form-group col-md-4">
						<input type="submit" name="submit" value="Generate Report" class="btn btn-primary">
					</div>
				</div>
			</div>
		</div>
		</form>

		<div class="row mt-3 justify-content-center">
			<div class="col-md-8">
				<div class="card card-danger">
					<div class="card-header">
						<h3 class="card-title">By Target Chart Periode <?=$datefrom?> to <?=$dateto?></h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
						</div>
					</div>
					<div class="card-body">
						<div class="chart">
							<canvas id="pieChart" style="min-height: 250px; height: 480px; max-height: 480px; max-width: 100%;"></canvas>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card card-warning">
					<div class="card-header">
						<h3 class="card-title">By Target Table  Periode <?=$datefrom?> to <?=$dateto?></h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
						</div>
					</div>
					<div class="card-body">
						<div class="chart">
							<table class="table table-sm">
								<thead>
									<tr>
										<th style="width: 10px">#</th>
										<th>Target Visitor</th>
										<th>Number</th>
										<th style="width: 40px">Percentage</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									$totalhostdept = 0;
									foreach ($hostdept as $bar) : 
										$totalhostdept += $bar->Jumlah;
									endforeach;
									$i = 1;
									foreach ($hostdept as $row) : 
										$hostdept_ptg	= round(($row->Jumlah/$totalhostdept) * 100);
								?>
									<tr>
										<td align='right'><?=$i; $i++;?></td>
										<td><?= $row->TargetVisitorType; ?></td>
										<td align='right'><?= $row->Jumlah; ?></td>
										<td align='right'><?= $hostdept_ptg; ?>%</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
								<tfoot>
									<tr class='font-weight-bold'>
										<td colspan='2' align='center'>Total</td>
										<td align='right'><?=$totalhostdept?></td>
										<td>&nbsp;</td>
									</tr>
								</tfoot>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/footer_one.php'); ?>

<script>
  $(function () {
			const hostdept = <?php echo json_encode($hostdept); ?>;
            
            const labels = [];
            const data = [];
            const backgroundColors = [
                'rgba(255, 99, 132, 0.7)',
                'rgba(54, 162, 235, 0.7)',
                'rgba(255, 206, 86, 0.7)',
                'rgba(75, 192, 192, 0.7)',
                'rgba(153, 102, 255, 0.7)',
				'rgba(247, 62, 5, 0.7)',
				'rgba(238, 243, 172, 0.7)',
				'rgba(23, 253, 42, 0.7)',
				'rgba(193, 171, 235, 0.7)',
				'rgba(201, 235, 12, 0.7)',
				'rgba(153, 7, 117, 0.7)',
				'rgba(27, 128, 146, 0.7)',
				'rgba(12, 65, 114, 0.7)',
                'rgba(255, 159, 64, 0.7)'
            ];
            var total = 0;
            hostdept.forEach((item, index) => {
				total += parseInt(item.Jumlah);
            });

			hostdept.forEach((item, index) => {
				const value = parseInt(item.Jumlah);
				const percentage = Math.round((value / total) * 100);
                labels.push(item.TargetVisitorType+ ' '+item.Jumlah+ ' ( '+ percentage+'% )');
                data.push(item.Jumlah);
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
						legend : {
							display: true,
						},
                        title: {
                            display: true,
                            text: 'Test 123'
                        },
                        tooltip: {
							tooltip: {
								callbacks: {
									label: function(context) {
										const label = context.label || '';
										return `${label}`;
									}
								}
							}
                        }
                    }
                }
            });
 
 })
</script>

