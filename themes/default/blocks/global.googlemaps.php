<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate Sun, 04 May 2014 12:41:32 GMT
 */

if( ! defined( 'NV_MAINFILE' ) ) die( 'Stop!!!' );


if( ! nv_function_exists( 'nv_menu_theme_maps' ) )
{
	function nv_menu_theme_maps_config( $module, $data_block, $lang_block )
	{
		$html = '<tr>';
		$html .= '	<td>' . $lang_block['toado'] . '</td>';
		$html .= '	<td><input type="text" name="config_toado" class="form-control" value="' . $data_block['toado'] . '"/></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '	<td>' . $lang_block['zoom'] . '</td>';
		$html .= '	<td><input type="text" name="config_zoom" class="form-control" value="' . $data_block['zoom'] . '"/></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '	<td>' . $lang_block['info'] . '</td>';
		$html .= '	<td><input type="text" name="config_info" class="form-control" value="' . $data_block['info'] . '"/></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '	<td>' . $lang_block['logo'] . '</td>';
		$html .= '	<td><input type="text" name="config_logo" class="form-control" value="' . $data_block['logo'] . '"/></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '	<td>' . $lang_block['title'] . '</td>';
		$html .= '	<td><input type="text" name="config_title" class="form-control" value="' . $data_block['title'] . '"/></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '	<td>' . $lang_block['width'] . '</td>';
		$html .= '	<td><input type="text" name="config_width" class="form-control" value="' . $data_block['width'] . '"/></td>';
		$html .= '</tr>';
		$html .= '<tr>';
		$html .= '	<td>' . $lang_block['height'] . '</td>';
		$html .= '	<td><input type="text" name="config_height" class="form-control" value="' . $data_block['height'] . '"/></td>';
		$html .= '</tr>';
		return $html;
	}

	function nv_menu_theme_maps_submit( $module, $lang_block )
	{
		global $nv_Request;
		$return = array();
		$return['error'] = array();
		$return['config']['toado'] = $nv_Request->get_title( 'config_toado', 'post' );
		$return['config']['zoom'] = $nv_Request->get_title( 'config_zoom', 'post' );
		$return['config']['info'] = $nv_Request->get_title( 'config_info', 'post' );
		$return['config']['logo'] = $nv_Request->get_title( 'config_logo', 'post' );
		$return['config']['title'] = $nv_Request->get_title( 'config_title', 'post' );
		$return['config']['width'] = $nv_Request->get_title( 'config_width', 'post' );
		$return['config']['height'] = $nv_Request->get_title( 'config_height', 'post' );
		return $return;
	}

	function nv_menu_theme_maps( $block_config )
	{
		global $global_config, $site_mods;

		if( file_exists( NV_ROOTDIR . '/themes/' . $global_config['module_theme'] . '/blocks/global.maps.tpl' ) )
		{
			$block_theme = $global_config['module_theme'];
		}
		elseif( file_exists( NV_ROOTDIR . '/themes/' . $global_config['site_theme'] . '/blocks/global.maps.tpl' ) )
		{
			$block_theme = $global_config['site_theme'];
		}
		else
		{
			$block_theme = 'default';
		}

		$xtpl = new XTemplate( 'global.maps.tpl', NV_ROOTDIR . '/themes/' . $block_theme . '/blocks' );
		$xtpl->assign( 'NV_BASE_SITEURL', NV_BASE_SITEURL );
		$xtpl->assign( 'BLOCK_THEME', $block_theme );
		$xtpl->assign( 'DATA', $block_config );
		$xtpl->parse( 'main' );
		return $xtpl->text( 'main' );
	}
}

if( defined( 'NV_SYSTEM' ) )
{
	$content = nv_menu_theme_maps( $block_config );
}