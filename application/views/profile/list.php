			<div class="row">
				<div class="offset4 span6">
					<h2>Profile List</h2>
				</div>
			</div>

			<?php foreach ($users as $user): ?>
			<div class="row">
				<div class="offset4 span6">
					<a href="/ci/profile/view/<?php echo $user['id'] ?>"><?php echo $user['username'] ?></a>
				</div>
			</div>
			<?php endforeach ?>