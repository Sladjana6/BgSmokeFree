<?php get_header(); ?>

<?php futurio_generate_header( true, true, true, false, false ); ?>

<div class="container-fluid archive-page-header">
	<header class="container text-left">
		<?php
		// if this was a search we display a page header with the results count. If there were no results we display the search form.
		if ( is_search() ) :
			/* translators: %s: search result string */
			echo "<h1 class='search-head'>" . sprintf( esc_html__( 'Rezultati pretrage: %s', 'futurio' ), get_search_query() ) . "</h1>";

		endif;
		?>
	</header><!-- .archive-page-header -->
</div>

<?php futurio_breadcrumbs(); ?>

<?php futurio_content_layout(); ?>

<!-- start content container -->
<div class="row">

    <div class="col-md-<?php futurio_main_content_width_columns(); ?> <?php futurio_sidebar_position( 'content' ) ?>">
		<?php
		if ( have_posts() ) :

			while ( have_posts() ) : the_post();

				get_template_part( 'content', get_post_format() );


			endwhile;

			the_posts_pagination();

		else :

			get_template_part( 'content', 'none' );

		endif;
		?>

	</div>

	<?php get_sidebar(); ?>

</div>
<!-- end content container -->

<?php get_footer(); ?>
