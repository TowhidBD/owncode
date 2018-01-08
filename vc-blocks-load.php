<?php
if (!defined('ABSPATH')) die('-1');
// Class started
class stockVCExtendAddonClass {
    function __construct() {
        // We safely integrate with VC with this hook
        add_action( 'init', array( $this, 'stockIntegrateWithVC' ) );
    }
 
    public function stockIntegrateWithVC() {
        // Checks if Visual composer is not installed
        if ( ! defined( 'WPB_VC_VERSION' ) ) {
            add_action('admin_notices', array( $this, 'stockShowVcVersionNotice' ));
            return;
        }
 
        // visual composer addons.
        include STOCK_ACC_PATH . '/vc-addons/vc-slides.php';
    }
    // show visual composer version
    public function stockShowVcVersionNotice() {
        $theme_data = wp_get_theme();
        echo '
        <div class="notice notice-warning">
          <p>'.sprintf(__('<strong>%s</strong> recommends <strong><a href="'.site_url().'/wp-admin/themes.php?page=tgmpa-install-plugins" target="_blank">Visual Composer</a></strong> plugin to be installed and activated on your site.', 'stock-aminulhchy'), $theme_data->get('Name')).'</p>
        </div>';
    }
}
// Finally initialize code
new stockVCExtendAddonClass();
