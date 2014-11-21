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
}