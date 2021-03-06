<?php

/**
 * Provide a admin area view for the plugin
 *
 * This file is used to markup the admin-facing aspects of the plugin.
 *
 * @link       https://luke-morgan.com
 * @since      1.0.0
 *
 * @package    Wp_Simple_Seo_Tags
 * @subpackage Wp_Simple_Seo_Tags/admin/partials
 */
?>

<!-- This file should primarily consist of HTML with a little bit of PHP. -->

<?php
global $post;

wp_nonce_field('update_post_seo_atts', 'post_seo_atts_meta_box_nonce');
$post_seo_atts =  get_post_meta($post->ID, 'post-seo-atts', false);
?>

<div class="metabox">

  <label for="post-html-page-title" class="metabox__label">Enter the value for the page/post html title tag</label>

  <small class="metabox__info">This will appear in search engine results page listings. Best kept under 60 characters</small>

  <input type="text" class="metabox__text-input" name="post-html-page-title" maxlength="60" value="<?php echo (isset($post_seo_atts[0]['post-html-page-title'])) ? $post_seo_atts[0]['post-html-page-title'] : ''; ?>" />

</div>

<div class="metabox">
  <label class="metabox__label" for="post-html-meta-description">Create a good meta description</label>

  <small class="metabox__info">This will appear in search engine results page listings. Ideally between 50 and 160 characters for good effect!</small>

  <textarea name="post-html-meta-description" class="metabox__text-area" id="post-html-meta-description" rows="10" minlength="50" maxlength="160"><?php echo (isset($post_seo_atts[0]['post-html-meta-description'])) ? $post_seo_atts[0]['post-html-meta-description'] : ''; ?></textarea>

</div>

<div class="metabox">

  <label for="post-canonical-url" class="metabox__label">Define the Canonical URL for this page/post</label>

  <small class="metabox__info">WordPress has its own way of handling urls, so it's a good idea to explicity define what search engines should use as the 'real' url for this page</small>

  <input type="text" class="metabox__text-input" name="post-canonical-url" value="<?php echo (isset($post_seo_atts[0]['post-canonical-url'])) ? $post_seo_atts[0]['post-canonical-url'] : ''; ?>" />

</div>

<div class="metabox">

  <label for="post-robots-directives" class="metabox__label">Enter the robots directives for this page/post</label>

  <small class="metabox__info">for multiple directives, input your directives as a comma seperated list, i.e. index, follow</small>

  <input type="text" class="metabox__text-input" name="post-robots-directives" value="<?php echo (isset($post_seo_atts[0]['post-robots-directives'])) ? $post_seo_atts[0]['post-robots-directives'] : ''; ?>" />

</div>
<div class="metabox">

  <label for="post-robots-directives" class="metabox__label">Select an image to display when sharing this page on social media</label>

  <small class="metabox__info">this image will be used for both opengraph and twitter card meta tag generation. It needs to be less than 5MB for it to work.</small>

  <button class="button wp-simple-seo-tags-media-button" data-wp-simple-seo-tags-media-uploader-target=".wp-simple-seo-tags-social-media-image" style="margin-right: 1rem;">Upload File</button>

  <button class="button wp-simple-seo-tags-remove-image">Remove Image</button>

  <img class="wp-simple-seo-tags-social-media-image-preview 
  <?php echo (!empty($post_seo_atts[0]['post-social-media-image-url'])) ? 'preview-visible' : ''; ?>
  " <?php echo (!empty($post_seo_atts[0]['post-social-media-image-url'])) ? 'src=' . $post_seo_atts[0]['post-social-media-image-url'] : ''; ?> />

  <input class="wp-simple-seo-tags-social-media-image" id="wp-simple-seo-tags-social-media-image" name="post-social-media-image-url" type="hidden" <?php echo (isset($post_seo_atts[0]['post-social-media-image-url'])) ? 'value=' . $post_seo_atts[0]['post-social-media-image-url'] : ''; ?> />

</div>