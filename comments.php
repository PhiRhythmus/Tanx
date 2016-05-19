<?php if(have_comments()) { ?>
	<h4 id="comments-title"><?php comments_number(__('No Comments', 'tanx'), __('One Comment', 'tanx'), __('% Comments', 'tanx')) ?></h4>

	<?php $args = array(
            'post_id' => get_the_ID()
        );
        $posts = get_comments($args);
        ?>
        <ul class="commentlist">
			<?php wp_list_comments( 'type=comment&callback=tanx_comment&max_depth=2' ); ?>
		</ul>
<?php } ?>

<?php
	$comments_args = array(
		'label_submit' => __('Post Comment', 'tanx'),
		'title_reply' => __('Leave a Comment', 'tanx'),
		'comment_notes_after' => ''
	);
	comment_form($comments_args);

	wp_enqueue_script('comment-reply');
 ?>

