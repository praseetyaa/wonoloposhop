<?php
if(get_theme_mod('open_shop_disable_highlight_sec',false) == true){
    return;
  }
?>
<section class="thunk-product-highlight-section">
	 <?php open_shop_display_customizer_shortcut( 'open_shop_highlight' );?>
       <h5>Blog</h5>
<div class="content-wrap">
      <div class="thunk-highlight-feature-wrap">

      <!-- custom -->

      <div class="row">
          <?php
              $recent_posts = wp_get_recent_posts([
                  'numberposts' => 8,
                  'post_status' => 'publish',
              ]);
              foreach($recent_posts as $recent_post) :
          ?>
          <article class="col-6 col-lg-3 pb-3">
              <div class="card border-0 shadow-sm rounded-1 h-100">
                  <a href="<?= get_permalink($recent_post['ID']) ?>">
                    <div class="wrap-img-hover">
                      <?php if(has_post_thumbnail($recent_post['ID'])) : ?>
                          <img class="card-img-top rounded-2 shadow" src="<?= get_the_post_thumbnail_url($recent_post['ID']) ?>" style="background-image: url('');">
                      <?php else : ?>
                          <img class="card-img-top rounded-2 shadow" src="<?= bloginfo('template_url') ?>/assets/images/absolutvision-82TpEld0_e4-unsplash.jpg">
                      <?php endif; ?>
                    </div>
                  </a>
                  <div class="card-body">
                      <p class="card-title pb-0 fw-bold"><a class="link-dark text-decoration-none" href="<?= get_permalink($recent_post['ID']) ?>"><?= $recent_post['post_title'] ?></a></p>
                      <p class="pb-0">
                          <?php $categories = get_the_category($recent_post['ID']); foreach($categories as $category) : ?>
                              <a href="<?= get_category_link($category->term_id) ?>"><small><?= $category->cat_name ?></small></a>
                          <?php endforeach; ?>
                      </p>
                  </div>
                  <div class="card-footer bg-transparent">
                      <small class="text-muted me-2"><i class="bi-calendar me-1"></i><?= date('d/m/Y', strtotime($recent_post['post_date'])) ?></small> - 
                      <small class="text-muted"><i class="bi-person-circle me-1"></i><a class="link-primary text-decoration-none" href="<?= get_author_posts_url($recent_post['post_author']) ?>"><?php $author = get_userdata($recent_post['post_author']); echo $author ? $author->display_name : '' ?></a></small>
                  </div>
              </div>
          </article>
          <?php endforeach; ?>
      </div>

      <!-- default -->

          <!-- <?php   
            $default //=  //Open_Shop_Defaults_Models::instance()->get_feature_default();
            //open_shop_highlight_content('open_shop_highlight_content', $default);
           ?> -->

      </div>
  </div>
</section>
<style>
.card-img-top{transition: all .5s ease 0s}
.card .wrap-img-hover:hover .card-img-top{transform: scale(1.1); background: red;}
.card .wrap-img-hover{overflow: hidden!important; height: 130px;}
.pb-0 {
    padding-bottom: 0!important;
}
.pb-3 {
    padding-bottom: 1.5rem;
}
.row {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    margin-right: -15px;
    margin-left: -15px;
}
.col-lg-3, .col-md-6 {
    position: relative;
    width: 100%;
    padding-right: 15px;
    padding-left: 15px;
}
.col-6 {
    width: 50%;
}
@media (min-width: 768px){
.col-md-6 {
    flex: 0 0 auto;
    width: 50%;
}
@media (min-width: 992px){
.col-lg-3 {
    flex: 0 0 auto;
    width: 25%;
}
</style>