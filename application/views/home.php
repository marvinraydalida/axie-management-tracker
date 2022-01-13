<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Dashboard</title>
	<link rel="stylesheet" href="<?php echo base_url() ?>assets/css/home.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200&display=swap" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
	<!-- CSS only -->


</head>

<body>

	<form method="POST">
		<input type="text" name="address" placeholder="enter ronnin address">
		<input type="submit" value="add" name='submit'>
	</form>


	<form method="POST">
		<input type="hidden" name="logout" value="true">
		<input type="submit" value="log-out">
	</form>

	<form method="POST">
		<input type="hidden" name="refresh" value="true">
		<input type="submit" value="refresh-test">
	</form>
	<main>
		<section class="my-scholars">
			<div class="heading">
				<div class="heading-col">
					<h1>NAME</h1>
				</div>
				<div class="heading-col">
					<h1>TODAY</h1>
				</div>
				<div class="heading-col">
					<h1>AVERAGE</h1>
				</div>
				<div class="heading-col">
					<h1>ADVENTURE</h1>
				</div>
				<div class="heading-col">
					<h1>ELO</h1>
				</div>
				<div class="heading-col">
					<h1>NEXT CLAIM</h1>
				</div>
				<div class="heading-col">
					<h1>UNCLAIMED</h1>
				</div>
				<div class="heading-col">
					<h1>IN RONIN</h1>
				</div>
				<div class="heading-col">
					<h1>SCHOLAR</h1>
				</div>
			</div>
			<?php foreach ($scholars as $scholar) : ?>
				<div class="row">
					<div class="row-col row-1">
						<h1><?php echo $scholar['leaderboard']['name'] ?></h1>
					</div>
					<div class="row-col">
						<h1><?php echo $scholar['slp']['todaySoFar'] ?></h1>
					</div>
					<div class="row-col">
						<h1><?php echo $scholar['slp']['average'] ?></h1>
					</div>
					<div class="row-col">
						<h1><?php echo $scholar['adventure']['gained_slp'] ?>/<?php echo $scholar['adventure']['max_slp'] ?></h1>
					</div>
					<div class="row-col">
						<h1><?php echo $scholar['leaderboard']['elo'] ?> <i class="bi bi-trophy-fill" style="color:gold"></i></h1>
					</div>
					<div class="row-col">
						<h1>
							<?php
							$time_today = date_create(date('Y-m-d', time()));
							$time_last_claimed = date_create(date('Y-m-d', $scholar['slp']['lastClaimedItemAt']));
							$difference = (array)date_diff($time_today, $time_last_claimed, true);
							$time = 15 - $difference['d'];
							?>
							<?php if ($time > 0) : ?>
								<span style="color:#F76E37">
									<?php echo "In " . $time . " day(s)"; ?>
								</span>
							<?php else : ?>
								<span style="color:#37F76E">
									<?php echo "Claim available"; ?>
								</span>
							<?php endif; ?>
							<br>
							<span style="font-size: .6rem;">
								<?php
								echo "Last claimed " . $difference['d'] . " day(s) ago.";
								?>
							</span>
						</h1>
					</div>
					<div class="row-col">
						<h1>
							<?php echo abs($scholar['slp']['total'] - $scholar['slp']['claimableTotal']);?>
						</h1>
					</div>
					<div class="row-col">
						<h1><?php echo $scholar['slp']['claimableTotal'];?></h1>
					</div>
					<div class="row-col">
						<h1><span><?php echo round(abs($scholar['slp']['total'] - $scholar['slp']['claimableTotal']) * (60 / 100)); ?></span>
						<br>
						<span style="font-size: .6rem;">50% share</span></i></h1>
					</div>
					<div class="dropdown-container">
						<i class="bi bi-chevron-down"></i>
					</div>
				</div>
				<div class="row-hidden">
					<div class="scholar-information">
						<div class="border">
							<div class="image-container">
								<img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8cGVyc29ufGVufDB8fDB8fA%3D%3D&w=1000&q=80" alt="">
							</div>
						</div>
						<div class="details">
							<h1><span>Scholar name</span><br> Jane Doe</h1>
							<h1><span>Email</span><br> sample@gmail.com</h1>
							<h1><span>Contact</span><br> 09294619352</h1>
							<h1><span>Address</span><br> Lorem ipsum dolor sit amet consectetur adipisicing elit. Porro magnam praesentium fuga aperiam qui provident, eius expedita sed exercitationem libero commodi consequatur ullam repellendus minima aut dignissimos asperiores quia sapiente.</h1>
							<h1><span>Valid Id</span></h1>
							<img src="https://grit.ph/wp-content/uploads/2020/05/sss-umid-emv-card-1-1030x659.png" alt="">
						</div>
					</div>
					<div class="graphs-container">
						<div class="line-graph-container">
							<canvas id="myChart" width="300px" height="300px"></canvas>
						</div>
						<div class="line-graph-container">
							<canvas id="myChart2" width="300px" height="300px"></canvas>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</section>
	</main>


	 

	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script>
		var stars = [300, 250, 309, 189, 180];
		var frameworks = ['React', 'Angular', 'Vue', 'Hyperapp', 'Omi'];
		var ctx = document.getElementById('myChart');
		var myChart = new Chart(ctx, {
			type: 'line',
			data: {
				labels: frameworks,
				datasets: [{
					data: stars,
					tension: 0.3,
					borderColor: "#1FCB75",
					label: "QUOTA IN LAST SEVEN DAYS"
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						labels: {
							color: "#ebebeb",
							font: {
								size: 18
							}
						}
					}
				},
				scales: {
					x: {
						ticks: {
							color: "#ebebeb"
						}
					},
					y: {
						ticks: {
							color: "#ebebeb"
						}
					}
				},
			}
		});

		var ctx2 = document.getElementById('myChart2');
		var myChart = new Chart(ctx2, {
			type: 'line',
			data: {
				labels: frameworks,
				datasets: [{
					data: stars,
					tension: 0.3,
					borderColor: "#1FCB75",
					label: "QUOTA IN LAST SEVEN DAYS"
				}],
			},
			options: {
				responsive: true,
				maintainAspectRatio: false,
				plugins: {
					legend: {
						labels: {
							color: "#ebebeb",
							font: {
								size: 18
							}
						}
					}
				},
				scales: {
					x: {
						ticks: {
							color: "#ebebeb"
						}
					},
					y: {
						ticks: {
							color: "#ebebeb"
						}
					}
				},
			}
		});
	</script>
</body>

</html>