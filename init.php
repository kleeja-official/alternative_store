<?php
// Kleeja Plugin
// ALTERNATIVE_STORE
// Version: 1.0
// Developer: Kleeja Team

// Prevent illegal run
if (! defined('IN_PLUGINS_SYSTEM')) {
    exit();
}

// Plugin Basic Information
$kleeja_plugin['alternative_store']['information'] = [
    // The casual name of this plugin, anything can a human being understands
    'plugin_title' => [
        'en' => 'Alternative Store',
        'ar' => 'المتجر البديل'
    ],
    // Who wrote this plugin?
    'plugin_developer' => 'Kleeja Team',
    // This plugin version
    'plugin_version' => '1.0',
    // Explain what is this plugin, why should I use it?
    'plugin_description' => [
        'en' => 'Alternative Store for kleeja',
        'ar' => 'المتجر البديل ل kleeja'
    ],
    // Min version of Kleeja that's requiered to run this plugin
    'plugin_kleeja_version_min' => '3.1.4',
    // Max version of Kleeja that support this plugin, use 0 for unlimited
    'plugin_kleeja_version_max' => '3.9',
    // Should this plugin run before others?, 0 is normal, and higher number has high priority
    'plugin_priority' => 0
];

//after installation message, you can remove it, it's not requiered
$kleeja_plugin['alternative_store']['first_run']['ar'] = '

';
$kleeja_plugin['kj_comment']['first_run']['en'] = '
Alternative Store for kleeja
';


// Plugin Installation function
$kleeja_plugin['alternative_store']['install'] = function ($plg_id) {
};


//Plugin update function, called if plugin is already installed but version is different than current
$kleeja_plugin['alternative_store']['update'] = function ($old_version, $new_version) {
};


// Plugin Uninstallation, function to be called at unistalling
$kleeja_plugin['alternative_store']['uninstall'] = function ($plg_id) {
};


// Plugin functions
$kleeja_plugin['alternative_store']['functions'] = [
    'require_admin_page_begin_j_plugins' => function ($args) {
        global $config;

        $include = false;

        $alternative_store_url = str_replace('j_plugins', 'alternative_plugins', kleeja_get_page());

        redirect($alternative_store_url);
        exit;

        return compact('include');
    },
    'require_admin_page_begin_m_styles' => function ($args) {
        global $config;

        $include = false;

        $alternative_store_url = str_replace('m_styles', 'alternative_styles', kleeja_get_page());

        redirect($alternative_store_url);
        exit;

        return compact('include');
    },
    'not_exists_alternative_plugins' => function ($args) {
        $include_alternative = dirname(__FILE__) . '/alternative_plugins.php';
        return compact('include_alternative');
    },
    'not_exists_alternative_styles' => function ($args) {
        $include_alternative = dirname(__FILE__) . '/alternative_styles.php';
        return compact('include_alternative');
    },
    'begin_admin_page' => function ($args) {
        global $lang, $olang;
        
        $adm_extensions = array_filter($args['adm_extensions'], function ($ele) {
            return ! in_array($ele, ['j_plugins', 'm_styles']);
        });

        $ext_icons = $args['ext_icons'];
        $adm_extensions[] = 'alternative_plugins';
        $adm_extensions[] = 'alternative_styles';
        $ext_icons['alternative_plugins'] = 'plug';
        $ext_icons['alternative_styles'] = 'paint-brush';

        $olang['R_ALTERNATIVE_PLUGINS'] = $lang['R_PLUGINS'];
        $olang['R_ALTERNATIVE_STYLES'] = $lang['R_STYLES'];

        return compact('adm_extensions', 'ext_icons', 'olang');
    }
];
