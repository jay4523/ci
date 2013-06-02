			<div class="row">
				<div class="offset4 span6">
					<h2><?php echo $user->username ?></h2>
				</div>
			</div>

			<div class="row">
				<div class="offset4 span6">
					<?php echo form_open('profile/update') ?>

					<label>Email</label>
					<?php echo form_input('email', $user->email) ?>

					<label>Country</label>
					<?php echo form_input('country', $profile['country']) ?>

					<label>Website</label>
					<?php echo form_input('website', $profile['website']) ?><br>
					
					<?php echo form_submit('updateprofile', 'Update') ?>

					<?php echo form_close() ?>
				</div>
			</div>