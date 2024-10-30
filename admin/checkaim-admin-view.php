<div class="wrap" id="checkaim">
    <h1 class="wp-heading-inline"><strong>CheckAIM</strong> - AI Anti Fraud Protection</h1>

    <h2 class="title">Enter your customer account identification (Account Number)</h2>

    <form method="post" action="options.php">
        <?php
        settings_fields( 'checkaim' );
        do_settings_sections( 'checkaim' );
        ?>
        <table class="form-table">
            <tr>
                <th scope="row"><label for="checkaim_auid">MID</label></th>
                <td>
                    <input type="text" id="checkaim_auid" name="checkaim_mid" value="<?php echo esc_attr( get_option( 'checkaim_mid' ) ); ?>" />
                    <p class="description" id="new-admin-email-description">For get auid go to <a href="https://checkaim.com/dashboard/index.php?Act=trackingcode" target="_blank">site</a> and authorized. <strong>MID get in tracking code page.</strong></p>
                </td>
            </tr>
        </table>
        <?php
        submit_button();
        ?>
    </form>
</div>