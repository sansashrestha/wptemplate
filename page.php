<?php //get_header(); ?>

<?php //while (have_posts()) : the_post(); ?>
    <!-- <main>
        <div class="container">
            <div class="heading">
                <h1 class="heading-ttl"><?php //the_title(); ?></h1>
            </div>
            <?php //the_content(); ?>
        </div>
    </main> -->
<?php //endwhile; // End of the loop. ?>

<?php //get_footer(); ?>

<?php 
    get_header();
?>

<main id="main">
    <?php if(have_posts()): while ( have_posts() ) : the_post();?>  
    <div>				
        <?php the_content();?>				
    </div>
    <?php endwhile; endif;?>
</main>

<?php get_footer(); ?>
