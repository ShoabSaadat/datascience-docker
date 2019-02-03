<div class="hl-comments" id="comments">
  <?php if ( comments_open() ) : ?>
  <h4 class="hl-second-title"> <span>
    <?php comments_number( esc_html__('No Comments', 'holland'), esc_html__('1 Comment', 'holland'), '% ' . esc_html__('Comments', 'holland') );?>
    </span> </h4>
  <div class='comments'>
    <ul class="hl-comment-list">
      <?php wp_list_comments(array(
			'avatar_size'	=> 70,
			'max_depth'		=> 5,
			'style'			=> 'ul',
			'callback'		=> 'holland_comments',
			'type'			=> 'all'
            )); ?>
    </ul>
  </div>
  <div id='comments_pagination'>
    <?php paginate_comments_links(array('prev_text' => '&laquo;', 'next_text' => '&raquo;')); ?>
  </div>
  <?php
		$custom_comment_field = '<p class="comment-form-comment"><label for="comment">' .  esc_html__( 'Comment', 'holland' ) . '</label><textarea id="comment" name="comment" cols="45" rows="8" aria-required="true"></textarea></p>';
	  //label removed for cleaner layout
		comment_form(array(
			'comment_field'			=> $custom_comment_field,
			'comment_notes_after'	=> '',
			'logged_in_as' 			=> '',
			'comment_notes_before' 	=> '',
			'title_reply'			=> esc_html__('Leave a Comment',  'holland'),
			'title_reply_before'    => '<h4 class="hl-second-title"><span>',
			'title_reply_after' 	=> '</span></h4>',
			'cancel_reply_link'		=> esc_html__('Cancel Reply',  'holland'),
			'label_submit'			=> esc_attr__('Submit Comment',  'holland'),
			'comment_field' => '<p class="comment-form-comment"><textarea id="comment" name="comment" placeholder="'.esc_attr__('Your Comment*', 'holland').'" aria-required="true"></textarea></p>',
        'fields' => apply_filters( 'comment_form_default_fields', array(

    'author' =>
      '<p class="comment-form-author">'  .
      '<input id="author" class="blog-form-input" placeholder="'.esc_attr__('Your Name*', 'holland').'" name="author" type="text" value="' . esc_attr( $commenter['comment_author'] ) .
      '" size="30"/></p>',

    'email' =>
      '<p class="comment-form-email">'.
      '<input id="email" class="blog-form-input" placeholder="'.esc_attr__('Your Email Address*', 'holland').'" name="email" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) .
      '" size="30"/></p>',

    'url' =>
      '<p class="comment-form-url">'.
      '<input id="url" class="blog-form-input" placeholder="'.esc_attr__('Your Website URL', 'holland').'" name="url" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) .
      '" size="30" /></p>'
    )
  ),
		));
	 endif; ?>
</div>