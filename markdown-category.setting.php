<div class="wrap">
    <h2>Markdown Category Setting</h2>

        <form method="post" action="options.php">
            <?php wp_nonce_field('update-options'); ?>

            <table class="form-table">

                <tr valign="top">
                    <th scope="row">Target Class Name</th>
                    <td><input type="text" name="category_list" value="<?php echo get_option('category_list'); ?>" /></td>
                </tr>

                <tr valign="top">
                    <th scope="row">Theme</th>
                    <td>
                        <input type="text" name="skin" value="<?php echo get_option('skin'); ?>" /><br>
                        (ex) default, desert, sons-of-obsidian, sunburst, doxy<br>
                        <a href="http://google-code-prettify.googlecode.com/svn/trunk/styles/index.html">http://google-code-prettify.googlecode.com/svn/trunk/styles/index.html</a>
                    </td>
                </tr>
         
            </table>

            <input type="hidden" name="action" value="update" />
            <input type="hidden" name="page_options" value="category_list,skin" />

            <p class="submit">
                <input type="submit" class="button-primary" value="<?php _e('Save Changes') ?>" />
            </p>

        </form>
</div>