<?php
require_once YIVIC_SUITE_PLUGIN_DIR . '/includes/support.php';
class YivicSuiteAdmin {

    private $_menuSlug = 'yivic-suite-plugin-my-setting';
    private $_setting_options;

    public function __construct() {
        $this->_setting_options = get_option( 'yivic_suite_name', array() ); // Truyền data ban đầu vào biến toàn cục mặc định sẽ là mảng rỗng

        add_action( 'admin_menu', array( $this, 'settingMenu' ) );
        add_action( 'admin_init', array( $this, 'register_setting_and_fields' ) );
    }

    // Đăng ký phần setting với hệ thống wp và tạo các field nhập dữ liệu
    public function register_setting_and_fields() {
        register_setting( 'yivic_suite_plugin_options', 'yivic_suite_name', array( $this, 'validate_setting' ) );
        // Main setting
        $mainSection = 'yivic_suite_plugin_main_section';
        add_settings_section( $mainSection, 'Main Setting', array( $this, 'main_section_view' ), $this->_menuSlug );
        add_settings_field( 'yivic_suite_plugin_title_input', 'Site title', array( $this, 'create_form' ), $this->_menuSlug, $mainSection, array( 'name' => 'new_title_input' ) );
        add_settings_field( 'yivic_suite_plugin_logo', 'Logo', array( $this, 'create_form' ), $this->_menuSlug, $mainSection, array( 'name' => 'logo_input' ) );
    }

    public function create_form( $args ) {
        if( $args['name'] == 'new_title_input' ) {
            $valueTitleInput = !empty( $this->_setting_options['yivic_suite_plugin_title_input'] ) ? $this->_setting_options['yivic_suite_plugin_title_input'] : '';
            echo '<input type="text" name="yivic_suite_name[yivic_suite_plugin_title_input]" value="'.$valueTitleInput.'" />';
        }
        if( $args['name'] == 'logo_input' ) {
            echo '<input type="file" name="yivic_suite_plugin_logo"/>';
            if( !empty( $this->_setting_options['yivic_suite_plugin_logo'] ) ) {
                echo '<br/><br/><img src="'.$this->_setting_options['yivic_suite_plugin_logo'].'" width="200">';
            }
        }
    }

    public function main_section_view() {

    }

    public function validate_setting( $data_input ) {

        if( !empty( $_FILES['yivic_suite_plugin_logo']['name'] ) ) {
            if( !empty( $this->_setting_options['yivic_suite_plugin_logo_path'] ) ) {
                @unlink( $this->_setting_options['yivic_suite_plugin_logo_path'] );
            }
            $override = array(
                'test_form' => false
            );
            $time = NULL;
            $fileInfo = wp_handle_upload( $_FILES['yivic_suite_plugin_logo'], $override, $time );
            $data_input['yivic_suite_plugin_logo']          = $fileInfo['url'];
            $data_input['yivic_suite_plugin_logo_path']     = $fileInfo['file'];

        } else {
            $data_input['yivic_suite_plugin_logo']          = $this->_setting_options['yivic_suite_plugin_logo'];
            $data_input['yivic_suite_plugin_logo_path']     = $this->_setting_options['yivic_suite_plugin_logo_path'];
        }
        //die();
        return $data_input;

    }

    public function settingMenu() {
//        add_menu_page(
//            'My Setting title',
//            'My Setting',
//            'manage_options',
//            $this->_menuSlug,
//            array( $this, 'settingPage' )
//        );
        add_options_page(
            'My Setting title',
            'My Setting',
            'manage_options',
            $this->_menuSlug,
            array( $this, 'settingPage' )
        );
    }

    public function settingPage() {
        require_once YIVIC_SUITE_VIEWS_PLUGIN_DIR . '/setting-page.php';
    }
}