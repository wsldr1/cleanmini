<?php
/**
 * The template for displaying comments.
 *
 * Displays an area that contains both
 * the current comments and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 * @package clean_mini
 * @since 1.0
 */

if(post_password_required()){
    return;
}

?>
<?php
    if(have_comments())
    {
?>
<div style="display:block;">
    <ul style="list-style-type: none;">
        <?php
            wp_list_comments();
        ?>
    </ul>
</div>
<?php
    }
if(comments_open()){
    comment_form();
}
?>