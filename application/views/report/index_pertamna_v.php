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
						<label for="tglmulai"><strong>Month</strong></label>
						<select name="month" id="month" class="form-control">
						<option value="0">-- Choose Month --</option>
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">Descmber</option>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label for="year"><strong>Year</strong></label>
						<select name="year" id="year" class="form-control">
						<option value="0">-- Choose Year --</option>
							<option value="2023">2023</option>
							<option value="2024">2024</option>
							<option value="2025">2025</option>
						</select>
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
		<div class="col-md-12">
				<div class="card card-primary">
					<div class="card-header">
						<h3 class="card-title">Data # <?=$month_str?> <?=$year?></h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
						</div>
					</div>
					<div class="card-body">					
						<table class="table table-hover table-bordered w-100 text-nowrap text-center" id="myTable">
							<thead class="bg-primary text-white ">
								<tr>
									<th scope="col">#</th>
									<th scope="col">CheckIn</th>
									<th scope="col">Host</th>
									<th scope="col">Target</th>
									<th scope="col">Purpose</th>
									<th scope="col">Name</th>
									<th scope="col">Phone</th>
									<th scope="col">Email</th>
									<th scope="col">CompType</th>
								</tr>
							</thead>
							<tbody class="text-black">
								<?php $i = 1; ?>
								<?php foreach ($data as $row) : ?>
									<tr>
										<td scope="row"><?= $i++; ?></td>
										<td><?= $row['CheckInTimeIndFmt']; ?></td>
										<td><?= $row['HostName']; ?></td>
										<td class="text-left"><?= $row['TargetVisitorType']; ?></td>
										<td><?= $row['PurposeVisit']; ?></td>
										<td><?= $row['Nama']; ?></td>
										<td><?= $row['PhoneNumber']; ?></td>
										<td><?= $row['Email']; ?></td>
										<td><?= $row['SourceTypeName']; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			

			</div>
		</div>


<!-- By Target================================= -->
		<div class="row mt-3 justify-content-center">
			<div class="col-md-8">
				<div class="card card-danger">
					<div class="card-header">
						<h3 class="card-title">By Target Chart # <?=$month_str?> <?=$year?></h3>

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
						<h3 class="card-title">By Target # <?=$month_str?> <?=$year?></h3>

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
	<!--  By Purpose======================================================= -->
	<div class="row mt-3 justify-content-center">
			<div class="col-md-8">
				<div class="card card-success">
					<div class="card-header">
						<h3 class="card-title">By Purpose Chart # <?=$month_str?> <?=$year?></h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
						</div>
					</div>
					<div class="card-body">
						<div class="chart">
							<canvas id="pieChart2" style="min-height: 250px; height: 480px; max-height: 480px; max-width: 100%;"></canvas>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card card-secondary">
					<div class="card-header">
						<h3 class="card-title">By Purpose # <?=$month_str?> <?=$year?></h3>

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
										<th>Visitor Purpose</th>
										<th>Number</th>
										<th style="width: 40px">Percentage</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									$totalpurpose = 0;
									foreach ($purpose as $bar2) : 
										$totalpurpose += $bar2->Jumlah;
									endforeach;
									$i = 1;
									foreach ($purpose as $row) : 
										$purpose_ptg	= round(($row->Jumlah/$totalpurpose) * 100);
								?>
									<tr>
										<td align='right'><?=$i; $i++;?></td>
										<td><?= $row->PurposeVisit; ?></td>
										<td align='right'><?= $row->Jumlah; ?></td>
										<td align='right'><?= $purpose_ptg; ?>%</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
								<tfoot>
									<tr class='font-weight-bold'>
										<td colspan='2' align='center'>Total</td>
										<td align='right'><?=$totalpurpose?></td>
										<td>&nbsp;</td>
									</tr>
								</tfoot>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
<!-- By Company Type -->
<div class="row mt-3 justify-content-center">
			<div class="col-md-8">
				<div class="card card-dark">
					<div class="card-header">
						<h3 class="card-title">By Source Type Chart # <?=$month_str?> <?=$year?></h3>

						<div class="card-tools">
							<button type="button" class="btn btn-tool" data-card-widget="collapse"><i class="fas fa-minus"></i></button>
							<button type="button" class="btn btn-tool" data-card-widget="remove"><i class="fas fa-times"></i></button>
						</div>
					</div>
					<div class="card-body">
						<div class="chart">
							<canvas id="pieChart3" style="min-height: 250px; height: 480px; max-height: 480px; max-width: 100%;"></canvas>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-4">
				<div class="card card-info">
					<div class="card-header">
						<h3 class="card-title">By Source # <?=$month_str?> <?=$year?></h3>

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
										<th>Company Type Visitor</th>
										<th>Number</th>
										<th style="width: 40px">Percentage</th>
									</tr>
								</thead>
								<tbody>
								<?php 
									$totalcomptype = 0;
									foreach ($company as $bar3) : 
										$totalcomptype += $bar3->Jumlah;
									endforeach;
									$i = 1;
									foreach ($company as $row) : 
										$comptype_ptg	= round(($row->Jumlah/$totalcomptype) * 100);
								?>
									<tr>
										<td align='right'><?=$i; $i++;?></td>
										<td><?= $row->SourceTypeName; ?></td>
										<td align='right'><?= $row->Jumlah; ?></td>
										<td align='right'><?= $comptype_ptg; ?>%</td>
									</tr>
								<?php endforeach; ?>
								</tbody>
								<tfoot>
									<tr class='font-weight-bold'>
										<td colspan='2' align='center'>Total</td>
										<td align='right'><?=$totalcomptype?></td>
										<td>&nbsp;</td>
									</tr>
								</tfoot>
							</table>

						</div>
					</div>
				</div>
			</div>
		</div>
		<!--  end of lll -->
	</section>
	<!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php $this->load->view('templates/footer_four.php'); ?>

<script>
  $(function () {
	$('.card').CardWidget('toggle')
	$('#myTable').DataTable({
		dom: 'Bfrtip',
		buttons: [
			'excel', 'print'
		],
		autoWidth: true,
    scrollX: true
	});

	Chart.defaults.global.defaultFontSize = 16;
			// -------- By Hostdept
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
			// ------------------------- By Purpose
			const purpose = <?php echo json_encode($purpose); ?>;
            
            const labels2 = [];
            const data2 = [];
            var total2 = 0;
            purpose.forEach((item, index) => {
				total2 += parseInt(item.Jumlah);
            });

			purpose.forEach((item, index) => {
				const value2 = parseInt(item.Jumlah);
				const percentage2 = Math.round((value2 / total2) * 100);
                labels2.push(item.PurposeVisit+ ' '+item.Jumlah+ ' ( '+ percentage2+'% )');
                data2.push(item.Jumlah);
            });
            
            // Buat pie chart
            const ctx2 = document.getElementById('pieChart2').getContext('2d');
            const pieChart2 = new Chart(ctx2, {
                type: 'pie',
                data: {
                    labels: labels2,
                    datasets: [{
                        data: data2,
                        backgroundColor: backgroundColors,
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
						legend : {
							display: true,
							labels: {
								fontSize:14
							},
						},
                        tooltip: {
							tooltip: {
								callbacks: {
									label: function(context) {
										const label2 = context.label || '';
										return `${label2}`;
									}
								}
							}
                        }
                    }
                }
            });
			// ------------------------- By Company
			const company = <?php echo json_encode($company); ?>;
            
            const labels3 = [];
            const data3 = [];
            var total3 = 0;
            company.forEach((item, index) => {
				total3 += parseInt(item.Jumlah);
            });

			company.forEach((item, index) => {
				const value3 = parseInt(item.Jumlah);
				const percentage3 = Math.round((value3 / total3) * 100);
                labels3.push(item.SourceTypeName+ ' '+item.Jumlah+ ' ( '+ percentage3+'% )');
                data3.push(item.Jumlah);
            });
            
            // Buat pie chart
            const ctx3 = document.getElementById('pieChart3').getContext('2d');
            const pieChart3 = new Chart(ctx3, {
                type: 'pie',
                data: {
                    labels: labels3,
                    datasets: [{
                        data: data3,
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
                        tooltip: {
							tooltip: {
								callbacks: {
									label: function(context) {
										const label3 = context.label || '';
										return `${label3}`;
									}
								}
							}
                        }
                    }
                }
            });
 
 })
</script>

