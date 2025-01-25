<?php
function assamese_fonts_menu() {
    add_theme_page('Assamese Font', 'Assamese Font', 'manage_options', 'assamese-fonts', 'assamese_fonts_page');
}
add_action('admin_menu', 'assamese_fonts_menu');

function assamese_fonts_page() {
    ?>
    <div class="wrap" style="background: linear-gradient(to right, #ddffc552, #eeffe8); padding: 20px; border-radius: 8px;">
        <h1 style="color: black;">Assamese Font</h1>
        <form method="post" action="options.php">
            <?php
            settings_fields('assamese_fonts_options_group');
            do_settings_sections('assamese_fonts');
            ?>
            <table class="form-table">
                <tr valign="top">
                    <th scope="row" style="color: black;">Choose Your Font</th>
                    <td>
                        <select name="assamese_font" id="assamese_font" style="width: 20%; padding: 5px 16px;">
                            <option value="Jyotirupa" <?php selected(get_option('assamese_font'), 'Jyotirupa'); ?>>Jyotirupa</option>
                            <option value="Rangmon" <?php selected(get_option('assamese_font'), 'Rangmon'); ?>>Rangmon</option>
                        </select>
                    </td>
                </tr>
            </table>
            <?php submit_button(); ?>
        </form>

        <!-- Rating Section -->
        <div id="plugin-rating" style="margin-top: 30px;padding: 20px;background: #ffffff78;border-radius: 8px;width: 22%;">
            <h2 style="color: #4CAF50;">Rate this Plugin</h2>
            <form method="post" action="">
                <label for="rating" style="color: #333;">Your Rating (1 to 5 stars):</label>
                <select name="rating" id="rating">
                    <option value="5">⭐⭐⭐⭐⭐ - Excellent</option>
                    <option value="4">⭐⭐⭐⭐ - Good</option>
                    <option value="3">⭐⭐⭐ - Average</option>
                    <option value="2">⭐⭐ - Fair</option>
                    <option value="1">⭐ - Poor</option>
                </select>

                <br><br>
                <input type="submit" name="submit_rating" value="Submit Rating" class="button-primary" style="background-color: #76b300; border-color: #009d00;">
            </form>
            
            <?php
            if (isset($_POST['submit_rating'])) {
                $rating = sanitize_text_field($_POST['rating']);
                echo "<div style='color: green; margin-top: 10px;'>Thank you for your rating! You rated: $rating stars.</div>";
            }
            ?>
        </div>
        <footer style="margin-top: 20px; color: black;">
            <p>Powered by <a href="https://lachit.org/" target="_blank" style="color:green; font-weight: 600; font-size:14px;">Lachit</a></p>
            <p>We value your feedback! Reach us at: <a href="mailto:support@lachit.org" style="color: red;">support@lachit.org</a></p>
            <p>
                <a href="https://www.facebook.com/lachit" target="_blank" style="color: black;">Facebook</a> |
                <a href="#" style="color: black;">Twitter</a> |
                <a href="#" style="color: black;">Instagram</a>
            </p>
        </footer>
    </div>
    <?php
}

function assamese_fonts_register_settings() {
    register_setting('assamese_fonts_options_group', 'assamese_font');
    add_settings_section('notification_section', '', null, 'assamese_fonts');
    add_settings_field('notification', 'Notification', 'assamese_fonts_display_notification', 'assamese_fonts', 'notification_section');
}

function assamese_fonts_display_notification() {
    if (isset($_GET['settings-updated'])) {
        echo '<div style="color: green;border: 1px solid #c0cdc0;width: 30%;padding: 10px;background-color: #fdfce0;">Your font choice has been saved successfully!</div>';
    }
}
add_action('admin_init', 'assamese_fonts_register_settings');
?>
