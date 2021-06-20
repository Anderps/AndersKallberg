<?php
/**
 * Theme info page
 *
 * @package ProWPTheme
 */

/**
 * Recommended plugins
 */
require PROWPTHEME_PATH . 'class-brooklyn-lite-recommended-plugins.php';

//Add the theme page
add_action('admin_menu', 'brooklyn_lite_add_theme_info', 9 );
function brooklyn_lite_add_theme_info(){
    if (!current_user_can('install_plugins')) {
        return;
    }

	$theme_info = add_menu_page(
		esc_html__( 'Brooklyn Lite Info', 'brooklyn-lite' ), // Page Title
		esc_html__( 'Brooklyn', 'brooklyn-lite' ),    // Menu Title
		'manage_options',
		'brooklyn-lite-info.php',
		'brooklyn_lite_info_page',
		BROOKLYN_LITE_THEME_URI . '/assets/images/icon.svg',
		4
	);

	add_submenu_page(
	    'brooklyn-lite-info.php',
	    esc_html__('Customize', 'brooklyn-lite'),
	    esc_html__('Customize', 'brooklyn-lite'),
	    'manage_options',
	    admin_url( '/customize.php?' )
	);

    add_action('load-' . $theme_info, 'brooklyn_lite_info_hook_styles');
}

//Callback
function brooklyn_lite_info_page(){

    $user = wp_get_current_user(); ?>
	<div class="info-container">
		<p class="hello-user"><?php echo sprintf(__('Hello, %s,', 'brooklyn-lite'), '<span>' . esc_html(ucfirst($user->display_name)) . '</span>'); ?></p>
		<h1 class="info-title"><?php echo sprintf(__('Welcome to %s', 'brooklyn-lite'), BROOKLYN_LITE_WP); ?><span class="info-version"><?php echo 'v' . BROOKLYN_LITE_VER; ?></span></h1>
		<p class="welcome-desc"><?php _e(
      'Brooklyn Lite is now installed and ready to go. To help you with the next step, we’ve gathered together on this page all the resources you might need. We hope you enjoy using Brooklyn Lite. You can always come back to this page by going to Menu <strong>Brooklyn > Brooklyn </strong>.',
      'brooklyn-lite'
  ); ?>
	

		<div class="brooklyn-lite-theme-tabs">

			<div class="brooklyn-lite-tab-nav nav-tab-wrapper">
				<a href="#begin" data-target="begin" class="nav-button nav-tab begin active"><?php esc_html_e('Getting started', 'brooklyn-lite'); ?></a>
				<a href="#support" data-target="support" class="nav-button support nav-tab"><?php esc_html_e('Support', 'brooklyn-lite'); ?></a>
				<a href="#table" data-target="table" class="nav-button table nav-tab"><?php esc_html_e('Free vs Pro', 'brooklyn-lite'); ?></a>
			</div>

			<div class="brooklyn-lite-tab-wrapper">

				<div id="#begin" class="brooklyn-lite-tab begin show">
					
					<div class="plugins-row">
						<h2><span class="step-number">1</span><?php esc_html_e('Install recommended plugins', 'brooklyn-lite'); ?></h2>
						<p><?php _e('Install one plugin at a time. Wait for each plugin to activate.', 'brooklyn-lite'); ?></p>

						<div style="margin: 0 -15px;overflow:hidden;display:flex;">

							<div class="plugin-block">
								<?php $plugin = 'elementor'; ?>
								<h3><?php esc_html_e('Elementor', 'brooklyn-lite'); ?></h3>
								<p><?php esc_html_e('Elementor will enable you to create pages by adding widgets to them using drag and drop.', 'brooklyn-lite'); ?>
								<?php
						        //If Elementor is active, show a link to Elementor's getting started video
						        $is_elementor_active = Brooklyn_Lite_Recommended_Plugins::instance()->check_plugin_state($plugin);
						        if ($is_elementor_active == 'deactivate') {
						            echo '<a target="_blank" href="https://www.youtube.com/watch?v=nZlgNmbC-Cw&feature=emb_title">' . __('First time Elementor user?', 'brooklyn-lite') . '</a>';
						        }
						        ?>
								</p>
								<?php echo Brooklyn_Lite_Recommended_Plugins::instance()->get_button_html($plugin); ?>
							</div>

							<div class="plugin-block">
								<?php $plugin = 'master-addons'; ?>
								<h3><?php esc_html_e('Master Addons', 'brooklyn-lite'); ?></h3>
								<p><?php esc_html_e('Create powerful website with Master Addons. It has 500+ pre-built ready templates. 50+ Addons & Extensions.', 'brooklyn-lite'); ?></p>
								<?php echo Brooklyn_Lite_Recommended_Plugins::instance()->get_button_html($plugin); ?>
							</div>

							<div class="plugin-block">
								<?php $plugin = 'one-click-demo-import'; ?>
								<h3><?php esc_html_e('One Click Demo Import', 'brooklyn-lite'); ?></h3>
								<p><?php esc_html_e('This plugin is useful for importing our demos. You can uninstall it after you\'re done with it.', 'brooklyn-lite'); ?></p>
								<?php echo Brooklyn_Lite_Recommended_Plugins::instance()->get_button_html($plugin); ?>
							</div>

							<div class="plugin-block">
								<?php $plugin = 'brooklyn-lite-demo-importer'; ?>
								<h3>Brooklyn Demo Importer</h3>
								<p><?php esc_html_e( 'Brooklyn Demo Importer is a free addon for the Brooklyn WordPress theme. It acts as an interface between the One Click Demo Import plugin and our theme.', 'brooklyn-lite' ); ?></p>
								<?php echo Brooklyn_Lite_Recommended_Plugins::instance()->get_button_html( $plugin ); ?>
							</div>

							<div class="plugin-block">
								<?php $plugin = 'kirki'; ?>
								<h3>Kirki</h3>
								<p><?php echo sprintf(__('Kirki is a framework for theme options. You need this plugin to access %s\'s options.', 'brooklyn-lite'), BROOKLYN_LITE_WP); ?></p>
								<?php echo Brooklyn_Lite_Recommended_Plugins::instance()->get_button_html($plugin); ?>
							</div>															
						</div>
					</div>
					<hr style="margin-top:25px;margin-bottom:25px;">
					
					<div class="import-row">
						<h2><span class="step-number">2</span><?php esc_html_e('Import demo content (optional)', 'brooklyn-lite'); ?></h2>
						<p><?php esc_html_e('Importing the demo will make your website look like our website.', 'brooklyn-lite'); ?></p>
						<?php
							$master_addons = 'master-addons';
							$is_brooklyn_lite_toolbox_active = Brooklyn_Lite_Recommended_Plugins::instance()->check_plugin_state($master_addons);

							$elementor = 'elementor';
							$is_elementor_active = Brooklyn_Lite_Recommended_Plugins::instance()->check_plugin_state($elementor);

							$one_click_demo_importer = 'one-click-demo-import';
							$is_ocdi_active = Brooklyn_Lite_Recommended_Plugins::instance()->check_plugin_state($one_click_demo_importer);

							$brooklyn_demo_importer = 'brooklyn-lite-demo-importer';
							$is_ocdi_active = Brooklyn_Lite_Recommended_Plugins::instance()->check_plugin_state($brooklyn_demo_importer);

							$kirki = 'kirki';
							$is_kirki_active = Brooklyn_Lite_Recommended_Plugins::instance()->check_plugin_state($kirki);
						?>
							<?php if ($is_brooklyn_lite_toolbox_active == 'deactivate' && $is_elementor_active == 'deactivate' && $is_ocdi_active == 'deactivate' && $is_kirki_active == 'deactivate'): ?>
								<a class="button button-primary button-large" href="<?php echo admin_url('admin.php?page=brooklyn-demo-import'); ?>"><?php esc_html_e('One Click Demo importer', 'brooklyn-lite'); ?></a>
							<?php else: ?>
								<p class="brooklyn-lite-notice"><?php esc_html_e('All recommended plugins need to be installed and activated for this step.', 'brooklyn-lite'); ?></p>
							<?php endif; ?>
					</div>
					<hr style="margin-top:25px;margin-bottom:25px;">

					<div class="customizer-row">
						<h2><span class="step-number">3</span><?php esc_html_e('Styling with the Customizer', 'brooklyn-lite'); ?></h2>
						<p><?php esc_html_e('Theme elements can be styled from the Customizer. Use the links below to go straight to the section you want.', 'brooklyn-lite'); ?></p>		
						<p><a target="_blank" href="<?php echo esc_url(admin_url('/customize.php?autofocus[section]=title_tagline')); ?>"><?php esc_html_e('Change your site title or add a logo', 'brooklyn-lite'); ?></a></p>
						<p><a target="_blank" href="<?php echo esc_url(admin_url('/customize.php?autofocus[section]=brooklyn_lite_section_menu')); ?>"><?php esc_html_e('Header options', 'brooklyn-lite'); ?></a></p>
						<p><a target="_blank" href="<?php echo esc_url(admin_url('/customize.php?autofocus[section]=brooklyn_lite_section_colors')); ?>"><?php esc_html_e('Color options', 'brooklyn-lite'); ?></a></p>
						<p><a target="_blank" href="<?php echo esc_url(admin_url('/customize.php?autofocus[section]=brooklyn_lite_section_fonts')); ?>"><?php esc_html_e('Font options', 'brooklyn-lite'); ?></a></p>
						<p><a target="_blank" href="<?php echo esc_url(admin_url('/customize.php?autofocus[section]=brooklyn_lite_section_blog_index')); ?>"><?php esc_html_e('Blog options', 'brooklyn-lite'); ?></a></p>		
					</div>


				</div>

				<div id="#support" class="brooklyn-lite-tab support">
					<div class="column-wrapper">
						<div class="tab-column">
						<span class="dashicons dashicons-sos"></span>
						<h3><?php esc_html_e('Visit our forums', 'brooklyn-lite'); ?></h3>
						<p><?php esc_html_e('Need help? Go ahead and visit our support forums and we\'ll be happy to assist you with any theme related questions you might have', 'brooklyn-lite'); ?></p>
							<a href="<?php echo esc_url_raw('https://prowptheme.com/support/');?>" target="_blank"><?php esc_html_e('Visit the forums', 'brooklyn-lite'); ?></a>				
							</div>
						<div class="tab-column">
						<span class="dashicons dashicons-book-alt"></span>
						<h3><?php esc_html_e('Documentation', 'brooklyn-lite'); ?></h3>
						<p><?php esc_html_e('Our documentation can help you learn how to use the theme and also provides you with premade code snippets and answers to FAQs.', 'brooklyn-lite'); ?></p>
						<a href="<?php echo esc_url_raw('https://prowptheme.com/docs/brooklyn/');?>" target="_blank"><?php esc_html_e('See the Documentation', 'brooklyn-lite'); ?></a>
						</div>
					</div>
				</div>
				<div id="#table" class="brooklyn-lite-tab table">
					<table class="widefat fixed featuresList">
					    <thead>
					        <tr>
					            <td>
					                <strong>
					                    <h3><?php esc_html_e('Feature', 'brooklyn-lite'); ?></h3>
					                </strong>
					            </td>
					            <td style="width: 20%;">
					                <strong>
					                    <h3><?php esc_html_e('Brooklyn Lite', 'brooklyn-lite'); ?></h3>
					                </strong>
					            </td>
					            <td style="width: 20%;">
					                <strong>
					                    <h3><?php esc_html_e('Brooklyn Pro', 'brooklyn-lite'); ?></h3>
					                </strong>
					            </td>
					        </tr>
					    </thead>
					    <tbody>
					        <tr>
					            <td><?php esc_html_e('Elementor Support', 'brooklyn-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Master Addons Support', 'brooklyn-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Access to all Google Fonts', 'brooklyn-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Fully Responsive', 'brooklyn-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Motion Effects', 'brooklyn-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Parallax backgrounds', 'brooklyn-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Social Icons', 'brooklyn-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Translation ready', 'brooklyn-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('WPML ready', 'brooklyn-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Learnpress compatible', 'brooklyn-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>					        
					        <tr>
					            <td><?php esc_html_e('Color options', 'brooklyn-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Blog options', 'brooklyn-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Widgetized footer', 'brooklyn-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Background Image support', 'brooklyn-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('WooCommerce compatible', 'brooklyn-lite'); ?></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Growing collection of premium demos', 'brooklyn-lite'); ?></td>
					            <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Footer Credits option', 'brooklyn-lite'); ?></td>
					            <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Footer background image', 'brooklyn-lite'); ?></td>
					            <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Extra Elementor blocks', 'brooklyn-lite'); ?></td>
					            <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Extra blog layouts (List, Masonry, Carousel)', 'brooklyn-lite'); ?></td>
					            <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Extended WooCommerce options', 'brooklyn-lite'); ?></td>
					            <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					        <tr>
					            <td><?php esc_html_e('Priority support', 'brooklyn-lite'); ?></td>
					            <td class="redFeature"><span class="dashicons dashicons-no-alt dash-red"></span></td>
					            <td class="greenFeature"><span class="dashicons dashicons-yes dash-green"></span></td>
					        </tr>
					    </tbody>
					</table>

				  <p style="text-align: right;"><a class="button button-primary button-large" href="https://prowptheme.com/themes/brooklyn/?utm_source=theme_table&utm_medium=button&utm_campaign=Brooklyn"><?php esc_html_e(
          'View Brooklyn Lite Pro',
          'brooklyn-lite'
      ); ?></a></p>
				</div>		
			</div>
		</div>

		<div class="brooklyn-lite-theme-sidebar">
			<div class="brooklyn-lite-sidebar-widget">
				<h3><?php echo sprintf(__('Review %s', 'brooklyn-lite'), BROOKLYN_LITE_WP); ?></h3>
				<p><?php echo esc_html__('It makes us happy to hear from our users. We would appreciate a review.', 'brooklyn-lite'); ?> </p>	
				<p><a target="_blank" href="https://wordpress.org/support/theme/brooklyn-lite/reviews/"><?php echo esc_html__('Submit a review here', 'brooklyn-lite'); ?></a></p>		
			</div>
			<hr style="margin-top:25px;margin-bottom:25px;">
			<div class="brooklyn-lite-sidebar-widget">
				<h3><?php esc_html_e('Changelog', 'brooklyn-lite'); ?></h3>
				<p><?php echo esc_html__('Keep informed about each theme update.', 'brooklyn-lite'); ?> </p>	
				<p><a target="_blank" href="<?php echo esc_url_raw('https://prowptheme.com/changelog/brooklyn/');?>"><?php echo esc_html__('See the changelog', 'brooklyn-lite'); ?></a></p>		
			</div>	
			<hr style="margin-top:25px;margin-bottom:25px;">
			<div class="brooklyn-lite-sidebar-widget">
				<h3><?php esc_html_e('Upgrade to Brooklyn Lite Pro', 'brooklyn-lite'); ?></h3>
				<p><?php echo esc_html__('Take Brooklyn Lite to a whole other level by upgrading to the Pro version.', 'brooklyn-lite'); ?> </p>	
				<p><a target="_blank" href="https://prowptheme.com/themes/brooklyn/?utm_source=theme_info&utm_medium=link&utm_campaign=Brooklyn"><?php echo esc_html__('Discover Brooklyn Lite Pro', 'brooklyn-lite'); ?></a></p>		
			</div>									
		</div>
	</div>
<?php
}


// Styles & Scripts
function brooklyn_lite_info_hook_styles(){
    add_action('admin_enqueue_scripts', 'brooklyn_lite_info_page_styles');
}

function brooklyn_lite_info_page_styles(){
    wp_enqueue_style('brooklyn-lite-theme-info', PROWPTHEME_THEME_URI . 'css/theme-info.css', [], true);

    wp_enqueue_script('brooklyn-lite-theme-info', PROWPTHEME_THEME_URI . 'js/theme-info.js', ['jquery'], '', true);
}