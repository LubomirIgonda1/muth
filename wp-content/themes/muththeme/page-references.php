<?php
/*
Template Name: References Page
*/
?>
<?php get_header(); ?>

<section class="muth-page-full-width muth-page-background-white">
	<div class="muth-page-content">
        <div class="row">
        	<div class="muth-page-title"> 
        	
        		<h1><?php if(get_field('page_title')): the_field('page_title'); endif; ?></h1>

        	</div> <!-- muth-page-title -->
        	
        	<div class="muth-subheader-line"></div> <!-- muth-subheader-line -->
        	
        </div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->

<!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls" data-use-bootstrap-modal="false">
    <!-- The container for the modal slides -->
    <div class="slides"></div>
    <!-- Controls for the borderless lightbox -->
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
    <!-- The modal dialog, which will be used to wrap the lightbox content -->
    <div class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body next"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left prev">
                        <i class="glyphicon glyphicon-chevron-left"></i>
                        Previous
                    </button>
                    <button type="button" class="btn btn-primary next">
                        Next
                        <i class="glyphicon glyphicon-chevron-right"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>


<section class="muth-page-full-width muth-page-background-white">
	<div class="muth-page-content">
        <div class="row">
        	<div class="muth-page-sub-title"> 
        		<h2><?php if(get_field('title_web_references')): the_field('title_web_references'); endif; ?></h2>
        	</div> <!-- muth-page-title -->
        </div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->

<section class="muth-page-full-width muth-page-background-white">
    <div class="muth-page-content">
        <div class="row">
            

<?php 
$counter = 0;
if( have_rows('web_references') ):
   
    // loop through the rows of data
    while ( have_rows('web_references') ) : the_row();

        // display a sub field value
        
        
        $switcher = get_sub_field('image_gallery_switcher');
      
      	//var_dump($pictures);
      	
      	switch ($switcher) {
      		//image
      		case false:
      			$picture = get_sub_field('thumbnail_web');
                $data_gallery = '';
                $gallery_feed = '';
                $id = '';
      			break;

      		//gallery
      		case true:
      			$pictures = get_sub_field('thumbnail_web_gallery');
      			//var_dump($pictures[0]);
      			$picture = $pictures[0];
               // var_dump($picture);
                $id = 'id="gallery-references-'.$counter.'"';

                $data_gallery = 'data-gallery="#blueimp-gallery-gallery-references-'.$counter.'"';
                $gallery_feed = '';

                $i = 0;
                foreach ($pictures as $pic) {
                    //aby nezobrazovalo prvy obrazok dva krat
                    if($i > 0){
                        $url = (!empty($pic['url']) ? $pic['url'] : __(''));
                        $title = (!empty($pic['title']) ? $pic['title'] : __(''));

                        $gallery_feed .= '<a href="'.$url.'" title="'. $title .'" class = "muth-invisible-image-gallery"' .$data_gallery .'></a>';
                    }
                    $i++;
                }

                $counter++;
      			break;

      		default:
      			# code...
      			break;
      	}
        
        $project_name = get_sub_field('project_name');
        $project_description = get_sub_field('project_description');

        $alt_img = (isset($picture['alt']) && !empty($picture['alt']))?  'alt="'.$picture['alt'].'"' : __('');

        if(isset($picture['url']) && !empty($picture['url'])):
            $img = '<img src="'. $picture['url'] . '" '. $alt_img .'>';
            $img_url = $picture['url'];
        else:
            $img = '<img src="http://placehold.it/300x300">';
            $img_url = '';
        endif;
              
       ?>

       <div <?php echo $id; ?> class="muth-references-webs"> 
            <a href="<?php echo $img_url; ?>" title="cart" class = "muth-references-web-fix-size" <?php echo $data_gallery; ?>>
            <?php echo $img; ?>
                <div class="muth-references-web-description">
                    <div class="muth-reference-name">
                        <h3 class="muth-reference-name-h3"><?php echo $project_name; ?></h3>
                    </div>
                    <span><?php echo $project_description; ?></span>
                </div> <!-- muth-references-web-description -->
            </a> <!-- muth-references-web-fix-size -->

            <?php if (isset($gallery_feed) && !empty($gallery_feed)) {
                echo $gallery_feed;
            }?>
                            
        </div><!--  muth-references-webs -->
<?php   
    endwhile;
else :
    // no rows found
endif;?>


    	</div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->



<?php if( have_rows('outsoarsing_references') ): ?>

<section class="muth-page-full-width muth-page-background-gray">
	<div class="muth-page-content">
        <div class="row">
        	<div class="muth-page-sub-title"> 
        	
        		<h2><?php if(get_field('title_outsoarsing_references')): the_field('title_outsoarsing_references'); endif; ?></h2>

        	</div> <!-- muth-page-title -->
        	
        </div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->


<section class="muth-page-full-width muth-page-background-gray">
	<div class="muth-page-content">
        <div class="row">
        	<div class = "muth-references-outsourcing"> 
        		 <ul>
                    
                    <?php  while ( have_rows('outsoarsing_references') ) : the_row(); ?>
                            <li> <?php the_sub_field('outsoarsing_company_name'); ?> </li>
                    <?php endwhile; ?>
        		 	
        		 </ul>
        		
        	</div><!--  muth-references-outsourcing -->
		</div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->

<?php endif; ?>

<?php if( have_rows('shop_references') ): ?>

<section class="muth-page-full-width muth-page-background-gray">
	<div class="muth-page-content">
        <div class="row">
        	<div class="muth-page-sub-title"> 
        	
        		<h2><?php if(get_field('title_shop_references')): the_field('title_shop_references'); endif; ?></h2>

        	</div> <!-- muth-page-title -->
        	
        </div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->

<section class="muth-page-full-width muth-page-background-gray">
	<div class="muth-page-content">
        <div class="row">
        	<div class = "muth-references-shop"> 
        		 <ul>

                    <?php  while ( have_rows('shop_references') ) : the_row(); ?>
                            <li> <?php the_sub_field('shop_company_name'); ?> </li>
                    <?php endwhile; ?>
        		 	
        		 </ul>
        		
        	</div><!--  muth-references-shop -->
		</div> <!-- row --> 
    </div> <!-- muth-page-content -->
</section> <!-- muth-page-full-width muth-page-background-white -->

<?php endif; ?>




<?php get_footer(); ?>