			<div class="row">
				<div class="offset4 span1"><img src="<?php echo $posts_item['thumb_url'] ?>"></div>
				<div class="span5"><h2><a href="<?php echo $posts_item['url'] ?>"><?php echo $posts_item['title'] ?></a></h2></div>
			</div>

			<?php if ($this->tank_auth->is_logged_in()) { ?>
			<div class="row">
				<div class="offset4 span6">
				<?php
					echo form_open('comments/post');

					$attrs = array(
						'rows' => 5,
						'name' => 'body',
						'class' => 'span6'
					);
					echo form_textarea($attrs);
					echo '<br>';
					echo form_submit('post','Post Comment');
					echo form_hidden(array('post_id' => $posts_item['id']));
					echo form_close();
				?>
				</div>
			</div>
			<?php } ?>

			<?php foreach ($comments as $comment): ?>
			<div class="row">
				<div class="offset4 span1">
					<b><a href="/ci/profile/view/<?php echo $comment['user_id'] ?>"><?php echo $comment['username'] ?></a></b><br>
					<a href="/ci/comments/remove/<?php echo $comment['id'] ?>">Remove</a>
				</div>
				<div class="span5 comment"><?php echo nl2br($comment['body']) ?></div>
			</div>
			<?php endforeach ?>