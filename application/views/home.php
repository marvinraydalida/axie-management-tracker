<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<form method="POST">
	<input type="text" name="address" placeholder="enter ronnin address">
	<input type="submit" value="add" name='submit'>
</form>


<form method="POST">
	<input type="hidden" name="logout" value="true">
	<input type="submit" value="log-out">
</form>

<table class="table table-hover w-100">
	<thead class="table-dark">
		<tr>
			<th scope="col">Name</th>
			<th scope="col">Today</th>
			<th scope="col">Yesterday</th>
			<th scope="col">Average</th>
			<th scope="col">Adventure</th>
			<th scope="col">Elo</th>
			<th scope="col">Next claim</th>
		</tr>
	</thead>
	<tbody>
		<?php foreach ($scholars as $scholar) : ?>
			<tr class="table-active">
				<th scope="row"><?php echo $scholar['leaderboard']['name'] ?></th>
				<td><?php echo $scholar['slp']['todaySoFar'] ?></td>
				<td><?php echo $scholar['slp']['yesterdaySLP'] ?></td>
				<td><?php echo $scholar['slp']['average'] ?></td>
				<td><?php echo $scholar['adventure']['gained_slp'] ?>/<?php echo $scholar['adventure']['max_slp'] ?></td>
				<td><?php echo $scholar['leaderboard']['elo'] ?> <i class="bi bi-trophy-fill" style="color:gold"></i></td>
				<td>
					<?php
					$time_today = date_create(date('Y-m-d', time()));
					$time_last_claimed = date_create(date('Y-m-d', $scholar['slp']['lastClaimedItemAt']));
					$difference = (array)date_diff($time_today, $time_last_claimed, true);
					$time = 15 - $difference['d'];
					?>
					<?php if ($time > 0) : ?>
						<span class="text-danger">
							<?php echo "In " . $time . " day(s)"; ?>
						</span>
					<?php else : ?>
						<span class="badge rounded-pill bg-success" style = "font-size: 1rem">
							<?php echo "Claim available"; ?>
						</span>
					<?php endif; ?>
					<br>
					<span style="font-size: .6rem;">
						<?php
						echo "Last claimed " . $difference['d'] . " day(s) ago.";
						?>
					</span>
				</td>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>

<ul>
	<?php foreach ($scholars as $scholar) : ?>
		<li><?php echo $scholar['leaderboard']['name'] . " - " .
				$scholar['slp']['todaySoFar'] . " - " .
				$scholar['slp']['yesterdaySLP'] . " - " .
				$scholar['slp']['average']; ?></li>
	<?php endforeach; ?>
</ul>