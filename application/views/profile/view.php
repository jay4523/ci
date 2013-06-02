			<div class="row">
				<div class="offset4 span6">
					<h2><?php echo $user->username ?></h2>
				</div>
			</div>
			
			<div class="row">
				<div class="offset4 span6">
					<h4>Country</h4>
					<?php echo $profile['country'] ?>
				</div>
			</div>

			<div class="row">
				<div class="offset4 span6">
					<h4>Website</h4>
					<?php echo $profile['website'] ?>
				</div>
			</div>

			<div class="row">
				<div class="offset4 span6">
					<h4>Member Since</h4>
					<?php echo $user->created ?>
				</div>
			</div>

			<div class="row">
				<div class="offset4 span6">
					<h4>Last Login</h4>
					<?php echo $user->last_login ?>
				</div>
			</div>