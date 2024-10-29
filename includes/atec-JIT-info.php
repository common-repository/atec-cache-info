<?php
if (!defined( 'ABSPATH' )) { exit; }

class ATEC_JIT_info { function __construct($tools,$op_status) {	
	
$jit_size=$op_status['jit']['buffer_size'];
$jit_free=$op_status['jit']['buffer_free'];
$percent=$jit_free/$jit_size;

echo '
<table class="atec-table atec-table-tiny atec-table-td-first">
<tbody>
	<tr><td>JIT ', esc_attr__('config','atec-cache-info'), ':</td><td>', esc_attr(ini_get('opcache.jit')), '</td></tr>
	<tr><td>', esc_attr__('Memory','atec-cache-info'), ':</td><td>', esc_attr(size_format($jit_size)), '</td></tr>
	<tr><td>', esc_attr__('Used','atec-cache-info'), ':</td><td>', esc_attr(size_format($jit_size-$jit_free), ' ', sprintf(" (%.1f%%)",$percent)), '</td></tr>
</tbody>
</table>';

$tools->usage($percent);	
}}
?>