<?php
class TZ_Helper{
	
	public static function htmlCss($fileCss){
		$xhtml = '<link href="'.WEBROOT_URL.'css/'.$fileCss.'.css" rel="stylesheet" />';
		return $xhtml;
	}
	public static function htmlJs($fileJs){
		$xhtml = '<script type="text/javascript" src="'.WEBROOT_URL.'js/'.$fileJs.'.js" ></script>';
		return $xhtml;
	}
	public static function getUrlImage($imageName){
		$src = WEBROOT_URL.'images/'.$imageName;
		return $src;
	}
	public static function getUrl($module,$controller,$action,$arrGET = null){
		$url = base_url("index.php/{$module}/{$controller}/{$action}");
		if($arrGET != null){
			foreach ($arrGET as $get){
				$url .= "/{$get}";
			}
		}
		return $url;
	}
	
	public static function getCurrentPageURL() {
		$pageURL = 'http';
		if (!empty($_SERVER['HTTPS'])) {if($_SERVER['HTTPS'] == 'on'){$pageURL .= "s";}}
		$pageURL .= "://";
		if ($_SERVER["SERVER_PORT"] != "80") {
			$pageURL .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
		} else {
			$pageURL .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
		}
		return $pageURL;
	}
}