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
		<section class="currencies">
			<div class="currency eth">
				<h1>ETH</h1>
				<?php if (strcmp($_SESSION['eth_status'], 'up') == 0) : ?>
					<i class="bi bi-arrow-up-square-fill green"></i>
				<?php elseif (strcmp($_SESSION['eth_status'], 'down') == 0) : ?>
					<i class="bi bi-arrow-down-square-fill red"></i>
				<?php else : ?>
					<i class="bi bi-arrow-left-right"></i>
				<?php endif; ?>
				<p>PHP <?php echo number_format($currencies[0], 2, '.', ','); ?> </p>
			</div>
			<div class="currency axs">
				<h1>AXS</h1>
				<?php if (strcmp($_SESSION['axs_status'], 'up') == 0) : ?>
					<i class="bi bi-arrow-up-square-fill green"></i>
				<?php elseif (strcmp($_SESSION['axs_status'], 'down') == 0) : ?>
					<i class="bi bi-arrow-down-square-fill red"></i>
				<?php else : ?>
					<i class="bi bi-arrow-left-right"></i>
				<?php endif; ?>
				<p>PHP <?php echo number_format($currencies[1], 2, '.', ','); ?></p>
			</div>
			</div>
			<div class="currency slp">
				<h1>SLP</h1>
				<?php if (strcmp($_SESSION['slp_status'],'up') == 0) : ?>
					<i class="bi bi-arrow-up-square-fill green"></i>
				<?php elseif (strcmp($_SESSION['slp_status'],'down') == 0) : ?>
					<i class="bi bi-arrow-down-square-fill red"></i>
				<?php else: ?>
					<i class="bi bi-arrow-left-right"></i>
				<?php endif; ?>
				<p>PHP <?php echo number_format($currencies[2], 4, '.', ','); ?></p>
			</div>
			</div>
		</section>
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
			<?php
			$index = 1;
			foreach ($scholars_status as $scholar) : ?>
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
							<?php echo abs($scholar['slp']['total'] - $scholar['slp']['claimableTotal']); ?>
						</h1>
					</div>
					<div class="row-col">
						<h1><?php echo $scholar['slp']['claimableTotal']; ?></h1>
					</div>
					<div class="row-col">
						<h1><span><?php echo round(abs($scholar['slp']['total'] - $scholar['slp']['claimableTotal']) * (60 / 100)); ?></span>
							<br>
							<span style="font-size: .6rem;">50% share</span></i>
						</h1>
					</div>
					<div class="dropdown-container">
						<i class="bi bi-chevron-down"></i>
					</div>
				</div>
				<div class="row-hidden">
					<div class="scholar-information">
						<div class="border">
							<div class="image-container">
								<img src="<?php echo $scholars[$index - 1]['image_location'] ?>" alt="">
							</div>
						</div>
						<div class="details">
							<div class="actions-container">
								<input type="hidden" class="hidden-input" value="<?php echo $scholars[$index - 1]['scholar_id'] ?>">
								<button type="submit" name="edit" class="edit"><i class="bi bi-pencil"></i></button>
								<button type="submit" name="delete" class="delete"><i class="bi bi-trash"></i></i></button>
							</div>
							<p>Scholar name</p>
							<h1 class="name"><?php echo $scholars[$index - 1]['name'] ?></h1>
							<p>Email</p>
							<h1 class="email"><?php echo $scholars[$index - 1]['email'] ?></h1>
							<p>Contact</p>
							<h1 class="contact"><?php echo $scholars[$index - 1]['contact'] ?></h1>
							<p>Address</p>
							<h1 class="address"><?php echo $scholars[$index - 1]['address'] ?></h1>
							<p>Valid ID</p>
							<img src="<?php echo $scholars[$index - 1]['valid_id'] ?>" alt="">
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
				<?php $index++; ?>
			<?php endforeach; ?>
		</section>
		<section class="modal">
			<div class="edit-modal">
				<form method="POST" enctype="multipart/form-data">
					<input type="hidden" name="scholar_id" value="" id="scholar_id">
					<div class="inputs">
						<input type="text" name="name" placeholder="Full name" autocomplete="off" value="" id="name">
						<input type="text" name="email" placeholder="email" autocomplete="off" value="" id="email">
						<input type="text" name="contact" placeholder="Contact" autocomplete="off" value="" id="contact">
						<textarea name="address" placeholder="Address" value="" id="address"></textarea>
					</div>
					<div class="input-image">
						<div id="scholar_profile">
							<p><i class="bi bi-person-badge"></i> Profile Picture</p>
							<input type="file" name="scholar_profile" accept="image/*">
						</div>
						<div id="valid_id">
							<p><i class="bi bi-credit-card-2-back-fill"></i> &nbsp Valid ID</p>
							<input type="file" name="valid_id" accept="image/*">
						</div>
					</div>
					<div class="update-button">
						<input type="submit" name="update" value="UPDATE">
					</div>
				</form>
				<input type="submit" id="close" value="X">
			</div>
		</section>
	</main>


	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js" integrity="sha512-TW5s0IT/IppJtu76UbysrBH9Hy/5X41OTAbQuffZFU6lQ1rdcLHzpU5BzVvr/YFykoiMYZVWlr/PX1mDcfM9Qg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
	<script type="application/javascript">
		<?php echo "const index =" . $index . "-1"; ?>;
	</script>
	<script src="<?php echo base_url() ?>assets/javascript/script.js"></script>
</body>

</html>