<form method="get" class="search-form" action="<?php echo esc_url(home_url( '/' )); ?>">
  <input type="text" placeholder="<?php esc_attr_e('Write and press enter', 'holland'); ?>" name="s" class="s" value="<?php the_search_query(); ?>"/>
  <button type="submit" class="search-submit"><i class="fa fa-search" aria-hidden="true"></i></button>
</form>
