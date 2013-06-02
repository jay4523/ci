<?php foreach ($posts as $posts_item): ?>

			<div class="row">
				<div class="offset3 span1"><a href="<?php echo $posts_item['url']?>"><img src="<?php echo $posts_item['thumb_url'] ?>"></a></div>
				<div class="span5"><h3><a href="/ci/posts/view/<?php echo $posts_item['id'] ?>"><?php echo $posts_item['title'] ?></a></h3></div>
			</div>

<?php endforeach;