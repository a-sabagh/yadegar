<?php

function rng_update_user() {
    if (isset($_POST['update_user_meta']) && isset($_POST['update_user_meta_hidden']) && $_POST['update_user_meta_hidden'] == 'update_true') {
        $is_valid_nonce = (isset($_POST['update_meta_nonce']) && wp_verify_nonce($_POST['update_meta_nonce'], 'update_meta_nonce_true')) ? TRUE : FALSE;
        if ($is_valid_nonce) {
            $current_user = wp_get_current_user();
            $user_id = $current_user->ID;
            $firstname = sanitize_text_field($_POST['profile_fname']);
            $lname = sanitize_text_field($_POST['profile_lname']);
            $nicename = sanitize_text_field($_POST['profile_nicname']);
            $email = sanitize_text_field($_POST['profile_email']);
            $website = sanitize_text_field($_POST['profile_website']);
            $job = sanitize_text_field($_POST['profile_job']);
            $description = sanitize_text_field($_POST['profile_description']);
            global $wpdb;
            $wpdb->update($wpdb->users, array('user_url' => $website), array('ID' => $user_id));
            if (is_email($email))
                $wpdb->update($wpdb->users, array('user_email' => $email), array('ID' => $user_id));
            update_user_meta($user_id, 'nickname', $nicename);
            update_user_meta($user_id, 'last_name', $lname);
            update_user_meta($user_id, 'first_name', $firstname);
            update_user_meta($user_id, 'job', $job);
            update_user_meta($user_id, 'description', $description);
        }
    }
}

function rng_profile_field($user) {
    $user_id = $user->ID;
    $user_activation_key = get_user_meta($user_id, 'status', TRUE);
    switch ($user_activation_key):
        case '1':
            $user_activation = 'فعال';
            break;
        case '0':
            $user_activation = 'غیرفعال';
            break;
        default :
            $user_activation = 'شما به عنوان مدیر کل وارد شده اید';
    endswitch;
    ?>
    <table class="form-table">
        <tbody>
            <tr>
                <th><label for="user_activation">وضعیت کاربری: </label></th>
                <td><?php echo $user_activation; ?></td>
            </tr>
            <tr>
                <th>شغل</th>
                <td><input type="text" name="profile_job" value="<?php echo $job; ?>" ></td>
            </tr>
            <tr>
                <th><label for="user_tickets">تیکت: </label></th>
                <td>
                    <table>
                        <tr class="row ticket-header">
                            <td class="col-md-2 ticket-header-subject">موضوع</td>
                            <td class="col-md-2 ticket-header-department">دپارتمان</td>
                            <td class="col-md-2 ticket-header-date">تاریخ</td>
                            <td class="col-md-6 ticket-header-content">متن تیکت</td>
                        </tr><!--.ticket-header-->
                        <?php
                        global $wpdb;
                        $user_tickets = $wpdb->get_results("SELECT meta_value FROM  {$wpdb->usermeta} WHERE user_id={$user_id} AND meta_key = 'ticket'");
                        if (!empty($user_tickets)):

                            foreach ($user_tickets as $user_ticket): //ticket
                                $user_ticket_elements = explode(',', $user_ticket->meta_value);
                                $counter = 1;
                                echo '<tr class="row ticket-body">';
                                foreach ($user_ticket_elements as $user_ticket_element):
                                    if ($user_ticket_element == 'finacial') {
                                        $user_ticket_element = 'امور مالی';
                                    } elseif ($user_ticket_element == 'support') {
                                        $user_ticket_element = 'پشتیبانی';
                                    } elseif ($user_ticket_element == 'other') {
                                        $user_ticket_element = 'سایر';
                                    }
                                    switch ($counter):
                                        case 1:
                                            echo '<td class="col-md-2 ticket-body-subject">' . $user_ticket_element . '</td>';
                                            break;
                                        case 2:
                                            echo '<td class="col-md-2 ticket-body-department">' . $user_ticket_element . '</td>';
                                            break;
                                        case 3:
                                            echo '<td class="col-md-2 ticket-body-date">' . $user_ticket_element . '</td>';
                                            break;
                                        case 4:
                                            echo '<td class="col-md-6 ticket-header-content">' . $user_ticket_element . '</td>';
                                            break;
                                    endswitch;
                                    $counter++;
                                endforeach;
                                echo '</tr>';
                            endforeach;
                        endif;
                        ?>
                    </table>
                    <br><br>
                    <h3>افزودن تیکت</h3>
                    <div class="row">
                        <div class="col-md-6"><label>موضوع: <input type="text" name="ticket_subject" placeholder="" ></label></div>
                        <div class="col-md-6">
                            <label>
                                دپارتمان:
                                <select name="ticket_department">
                                    <option value="finacial" >امور مالی</option>
                                    <option value="support" >پشتیبانی</option>
                                    <option value="other" >سایر</option>
                                </select>
                            </label>

                        </div>
                    </div><!--.row-->
                    <div class="row" >
                        <div class="col-md-12">
                            <textarea name="ticket_text" placeholder="متن تیکت"></textarea>
                        </div>
                    </div><!--.row-->
                </td>
            </tr>
        </tbody>
    </table>
    <?php
}

function rng_save_profile_field($user_id) {
    if (!current_user_can('edit_user', $user_id)) {
        return FALSE;
    } else {
        $job = get_post_meta($post_id, 'status', TRUE);
        if (!empty($job)) {
            update_user_meta($user_id, 'job', $_POST['profile_job']);
        } else {
            add_post_meta($post_id, 'job', $_POST['profile_job']);
        }
        $subject = $_POST['ticket_subject'];
        $department = $_POST['ticket_department'];
        $date = jdate("Y/m/d H:i:s");
        $text = $_POST['ticket_text'];
        $ticket = implode(',', array($subject, $department, $date, $text));
        $meta_key = 'ticket';
        add_user_meta($user_id, $meta_key, $ticket);
    }
}

add_action('template_redirect', 'rng_update_user');
add_action('show_user_profile', 'rng_profile_field');
add_action('edit_user_profile', 'rng_profile_field');
add_action('personal_options_update', 'rng_save_profile_field');
add_action('edit_user_profile_update', 'rng_save_profile_field');
