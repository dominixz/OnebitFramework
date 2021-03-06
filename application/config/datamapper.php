<?php	if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Data Mapper Configuration
 *
 * Global configuration settings that apply to all DataMapped models.
 */

$config['prefix'] = '';
$config['join_prefix'] = '';
$config['error_prefix'] = '<p>';
$config['error_suffix'] = '</p>';
$config['created_field'] = 'created_at';
$config['updated_field'] = 'updated_at';
$config['local_time'] = TRUE;
$config['unix_timestamp'] = FALSE;
$config['timestamp_format'] = '';
$config['lang_file_format'] = 'model_${model}';
$config['field_label_lang_format'] = '${model}_${field}';
$config['auto_transaction'] = FALSE;
$config['auto_populate_has_many'] = TRUE;
$config['auto_populate_has_one'] = TRUE;
$config['all_array_uses_ids'] = FALSE;
// set to FALSE to use the same DB instance across the board (breaks subqueries)
// Set to any acceptable parameters to $CI->database() to override the default.
$config['db_params'] = '';
// Uncomment to enable the production cache
// $config['production_cache'] = APPPATH.'cache/datamapper/';
$config['extensions_path'] = 'datamapper';
$config['extensions'] = array('array','json','key');

/* End of file datamapper.php */
/* Location: ./application/config/datamapper.php */