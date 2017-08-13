<?php
/*
 * Saves new field to postmeta for navigation
 */
add_action('wp_update_nav_menu_item', 'custom_nav_update',10, 3);
function custom_nav_update($menu_id, $menu_item_db_id, $args ) {
    if ( is_array($_REQUEST['icon']) ) {
        $custom_value = $_REQUEST['icon'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_menu_item_icon', $custom_value );
    }
}

/*
 * Adds value of new field to $item object that will be passed to     Walker_Nav_Menu_Edit_Custom
 */
add_filter( 'wp_setup_nav_menu_item','custom_nav_item' );
function custom_nav_item($menu_item) {
    $menu_item->icon = get_post_meta( $menu_item->ID, '_menu_item_icon', true );
    return $menu_item;
}

add_filter('wp_edit_nav_menu_walker', 'custom_nav_edit_walker', 10, 2);

function custom_nav_edit_walker($walker, $menu_id) {
    return 'Walker_Nav_Menu_Edit_Custom';
}

class Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu {

    function start_lvl(&$output) {
        
    }

    function end_lvl(&$output) {
        
    }

    function start_el(&$output, $item, $depth, $args) {
        global $_wp_nav_menu_max_depth;
        $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

        $indent = ( $depth ) ? str_repeat("\t", $depth) : '';

        ob_start();
        $item_id = esc_attr($item->ID);
        $removed_args = array(
            'action',
            'customlink-tab',
            'edit-menu-item',
            'menu-item',
            'page-tab',
        );

        $original_title = '';
        if ('taxonomy' == $item->type) {
            $original_title = get_term_field('name', $item->object_id, $item->object, 'raw');
            if (is_wp_error($original_title))
                $original_title = false;
        } elseif ('post_type' == $item->type) {
            $original_object = get_post($item->object_id);
            $original_title = $original_object->post_title;
        }

        $classes = array(
            'menu-item menu-item-depth-' . $depth,
            'menu-item-' . esc_attr($item->object),
            'menu-item-edit-' . ( ( isset($_GET['edit-menu-item']) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
        );

        $title = $item->title;

        if (!empty($item->_invalid)) {
            $classes[] = 'menu-item-invalid';
            /* translators: %s: title of menu item which is invalid */
            $title = sprintf(__('%s (Invalid)'), $item->title);
        } elseif (isset($item->post_status) && 'draft' == $item->post_status) {
            $classes[] = 'pending';
            /* translators: %s: title of menu item in draft status */
            $title = sprintf(__('%s (Pending)'), $item->title);
        }

        $title = empty($item->label) ? $title : $item->label;
        ?>
        <li id="menu-item-<?php echo $item_id; ?>" class="<?php echo implode(' ', $classes); ?>">
            <dl class="menu-item-bar">
                <dt class="menu-item-handle">
                <span class="item-title"><?php echo esc_html($title); ?></span>
                <span class="item-controls">
                    <span class="item-type"><?php echo esc_html($item->type_label); ?></span>
                    <span class="item-order hide-if-js">
                        <a href="<?php
                        echo wp_nonce_url(
                                add_query_arg(
                                        array(
                            'action' => 'move-up-menu-item',
                            'menu-item' => $item_id,
                                        ), remove_query_arg($removed_args, admin_url('nav-menus.php'))
                                ), 'move-menu_item'
                        );
                        ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up'); ?>">&#8593;</abbr></a>
                        |
                        <a href="<?php
                        echo wp_nonce_url(
                                add_query_arg(
                                        array(
                            'action' => 'move-down-menu-item',
                            'menu-item' => $item_id,
                                        ), remove_query_arg($removed_args, admin_url('nav-menus.php'))
                                ), 'move-menu_item'
                        );
                        ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down'); ?>">&#8595;</abbr></a>
                    </span>
                    <a class="item-edit" id="edit-<?php echo $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item'); ?>" href="<?php
                    echo ( isset($_GET['edit-menu-item']) && $item_id == $_GET['edit-menu-item'] ) ? admin_url('nav-menus.php') : add_query_arg('edit-menu-item', $item_id, remove_query_arg($removed_args, admin_url('nav-menus.php#menu-item-settings-' . $item_id)));
                    ?>"><?php _e('Edit Menu Item'); ?></a>
                </span>
                </dt>
            </dl>

            <div class="menu-item-settings" id="menu-item-settings-<?php echo $item_id; ?>">
                <?php if ('custom' == $item->type) : ?>
                    <p class="field-url description description-wide">
                        <label for="edit-menu-item-url-<?php echo $item_id; ?>">
                            <?php _e('URL'); ?><br />
                            <input type="text" id="edit-menu-item-url-<?php echo $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->url); ?>" />
                        </label>
                    </p>
                <?php endif; ?>
                <p class="description description-wide">
                    <label for="edit-menu-item-title-<?php echo $item_id; ?>">
                        <?php _e('Navigation Label'); ?><br />
                        <input type="text" id="edit-menu-item-title-<?php echo $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->title); ?>" />
                    </label>
                </p>
                <p class="field-link-target description">
                    <label for="edit-menu-item-target-<?php echo $item_id; ?>">
                        <input type="checkbox" id="edit-menu-item-target-<?php echo $item_id; ?>" value="_blank" name="menu-item-target[<?php echo $item_id; ?>]"<?php checked($item->target, '_blank'); ?> />
                        <?php _e('Open link in a new window/tab'); ?>
                    </label>
                </p>
                <p class="field-css-classes description description-thin">
                    <label for="edit-menu-item-classes-<?php echo $item_id; ?>">
                        <?php _e('CSS Classes (optional)'); ?><br />
                        <input type="text" id="edit-menu-item-classes-<?php echo $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php echo $item_id; ?>]" value="<?php echo esc_attr(implode(' ', $item->classes)); ?>" />
                    </label>
                </p>
                <p class="field-xfn description description-thin">
                    <label for="edit-menu-item-xfn-<?php echo $item_id; ?>">
                        <?php _e('Link Relationship (XFN)'); ?><br />
                        <input type="text" id="edit-menu-item-xfn-<?php echo $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->xfn); ?>" />
                    </label>
                </p>
                <p class="field-description description description-wide">
                    <label for="edit-menu-item-description-<?php echo $item_id; ?>">
                        <?php _e('Description'); ?><br />
                        <textarea id="edit-menu-item-description-<?php echo $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php echo $item_id; ?>]"><?php echo esc_html($item->description); // textarea_escaped  ?></textarea>
                        <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.'); ?></span>
                    </label>
                </p>        
                <!--#####################################################mega menu#####################################################-->
                <input type="button" class="button button-primary button-large icon-menus" title="در صورتی که منوی ساید بار را تغییر می دهید از این گزینه استفاده کنید." value="فعال کردن آیکن ها" />
                <?php $select_icon = $item->icon; ?>
                <div class="menu-icons-wrapper">
                    <div class="scat-icon">
                        <label for="c-deer-<?php echo $item_id; ?>" class="icon-animals c-deer"></label>
                        <input type="radio" id="c-deer-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]" <?php if($select_icon == 'deer') echo 'checked=""' ?> value="deer" />    
                    </div>
                    <div class="scat-icon">
                        <label for="c-pig-<?php echo $item_id; ?>" class="icon-animals c-pig"></label>
                        <input type="radio" id="c-pig-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]" <?php if($select_icon == 'pig') echo 'checked=""' ?> value="pig" />   
                    </div>
                    <div class="scat-icon">
                        <label for="c-mouse-<?php echo $item_id; ?>" class="icon-animals c-mouse"></label>
                        <input type="radio" id="c-mouse-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]" <?php if($select_icon == 'mouse') echo 'checked=""' ?> value="mouse" />    
                    </div>
                    <div class="scat-icon">
                        <label for="c-certificate-<?php echo $item_id; ?>" class="icon-animals c-certificate"></label>
                        <input type="radio" id="c-certificate-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]" <?php if($select_icon == 'certificate') echo 'checked=""' ?>  value="certificate" />  
                    </div>
                    <div class="scat-icon">
                        <label for="c-rabbit-<?php echo $item_id; ?>" class="icon-animals c-rabbit"></label>
                        <input type="radio" id="c-rabbit-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]" <?php if($select_icon == 'rabbit') echo 'checked=""' ?>  value="rabbit" />    
                    </div>
                    <div class="scat-icon">
                        <label for="c-cock-<?php echo $item_id; ?>" class="icon-animals c-cock"></label>
                        <input type="radio" id="c-cock-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]" <?php if($select_icon == 'cock') echo 'checked=""' ?> value="cock" />  
                    </div>
                    <div class="scat-icon">
                        <label for="c-horse-<?php echo $item_id; ?>" class="icon-animals c-horse"></label>
                        <input type="radio" id="c-horse-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]"  <?php if($select_icon == 'horse') echo 'checked=""' ?>  value="horse" />    
                    </div>
                    <div class="scat-icon">
                        <label for="c-goat-<?php echo $item_id; ?>" class="icon-animals c-goat"></label>
                        <input type="radio" id="c-goat-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]"  <?php if($select_icon == 'goat') echo 'checked=""' ?>  value="goat" />    
                    </div>
                    <div class="scat-icon">
                        <label for="c-fish-<?php echo $item_id; ?>" class="icon-animals c-fish"></label>
                        <input type="radio" id="c-fish-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]"  <?php if($select_icon == 'fish') echo 'checked=""' ?>  value="fish" />    
                    </div>
                    <div class="scat-icon">
                        <label for="c-dairy-<?php echo $item_id; ?>" class="icon-animals c-dairy"></label>
                        <input type="radio" id="c-dairy-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]"  <?php if($select_icon == 'dairy') echo 'checked=""' ?>  value="dairy" />  
                    </div>
                    <div class="scat-icon">
                        <label for="c-cattle-<?php echo $item_id; ?>" class="icon-animals c-cattle"></label>
                        <input type="radio" id="c-cattle-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]"  <?php if($select_icon == 'cattle') echo 'checked=""' ?>  value="cattle" />  
                    </div>
                    <div class="scat-icon">
                        <label for="c-bird-<?php echo $item_id; ?>" class="icon-animals c-bird"></label>
                        <input type="radio" id="c-bird-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]"  <?php if($select_icon == 'bird') echo 'checked=""' ?>  value="bird" />    
                    </div>
                    <!--new-->
                    <div class="scat-icon">
                        <label for="c-camel-<?php echo $item_id; ?>" class="icon-animals c-camel"></label>
                        <input type="radio" id="c-camel-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]"  <?php if($select_icon == 'camel') echo 'checked=""' ?>  value="camel" />    
                    </div>
                    <div class="scat-icon">
                        <label for="c-obird-<?php echo $item_id; ?>" class="icon-animals c-obird"></label>
                        <input type="radio" id="c-obird-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]"  <?php if($select_icon == 'obird') echo 'checked=""' ?>  value="obird" />    
                    </div>
                    <div class="scat-icon">
                        <label for="c-shome-<?php echo $item_id; ?>" class="icon-animals c-shome"></label>
                        <input type="radio" id="c-shome-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]"  <?php if($select_icon == 'shome') echo 'checked=""' ?>  value="shome" />    
                    </div>
                    <div class="scat-icon">
                        <label for="c-sheep-<?php echo $item_id; ?>" class="icon-animals c-sheep"></label>
                        <input type="radio" id="c-sheep-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]"  <?php if($select_icon == 'sheep') echo 'checked=""' ?>  value="sheep" />    
                    </div>
                    <div class="scat-icon">
                        <label for="c-ghome-<?php echo $item_id; ?>" class="icon-animals c-ghome"></label>
                        <input type="radio" id="c-ghome-<?php echo $item_id; ?>" name="icon[<?php echo $item_id; ?>]"  <?php if($select_icon == 'ghome') echo 'checked=""' ?>  value="ghome" />    
                    </div>
                </div><!--.menu-icons-wrapper-->
                <!--#####################################################mega menu#####################################################-->
                <div class="menu-item-actions description-wide submitbox">
                    <?php if ('custom' != $item->type && $original_title !== false) : ?>
                        <p class="link-to-original">
                            <?php printf(__('Original: %s'), '<a href="' . esc_attr($item->url) . '">' . esc_html($original_title) . '</a>'); ?>
                        </p>
                    <?php endif; ?>
                    <a class="item-delete submitdelete deletion" id="delete-<?php echo $item_id; ?>" href="<?php
                    echo wp_nonce_url(
                            add_query_arg(
                                    array(
                        'action' => 'delete-menu-item',
                        'menu-item' => $item_id,
                                    ), remove_query_arg($removed_args, admin_url('nav-menus.php'))
                            ), 'delete-menu_item_' . $item_id
                    );
                    ?>"><?php _e('Remove'); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php echo $item_id; ?>" href="<?php echo esc_url(add_query_arg(array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg($removed_args, admin_url('nav-menus.php'))));
                    ?>#menu-item-settings-<?php echo $item_id; ?>"><?php _e('Cancel'); ?></a>
                </div>

                <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php echo $item_id; ?>]" value="<?php echo $item_id; ?>" />
                <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->object_id); ?>" />
                <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->object); ?>" />
                <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->menu_item_parent); ?>" />
                <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->menu_order); ?>" />
                <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php echo $item_id; ?>]" value="<?php echo esc_attr($item->type); ?>" />
            </div><!-- .menu-item-settings-->
            <ul class="menu-item-transport"></ul>
        </li>
        <?php
        $output .= ob_get_clean();
    }

}
