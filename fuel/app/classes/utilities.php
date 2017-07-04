<?php
class utilities{
	static function trim2($str) {
	   return str_replace(" ","",$str);
  }
  static function uppercase2($str) {
	   return strtoupper($str);
  }
  static function standardize2($str) {
	   return self::trim2(self::uppercase2($str));
  }
  static function listOrderField($field){
  	  $s="<a href=\"".Uri::current()."?orderby=".$field."\">+</a><a href=\"".Uri::current()."?orderby=".$field."&order=desc\">-</a>";
  	  return $s;
  }
  static function adminActions($item,$controllerName,$aActions){
  	$t="";
		for($i=0;$i<count($aActions);$i++){
			if(Auth::has_access(Request::active()->controller.'.'.$aActions[$i][1])):
				$array=array("class" => "btn btn-primary");
				$parameter="";
				$faicon="";
				if(isset($aActions[$i][2])){
					if(isset($aActions[$i][2]["class"])){
						$array=array("class" => "btn btn-".$aActions[$i][2]["class"]);
						if($aActions[$i][2]["class"]=="danger")$array=array("class" => "btn btn-".$aActions[$i][2]["class"],"onclick" => "return confirm('Are you sure?')");
					}
					if(isset($aActions[$i][2]["parameter"]))$parameter=$aActions[$i][2]["parameter"];
					if(isset($aActions[$i][2]["faicon"]))$faicon=$aActions[$i][2]["faicon"];
				};
				if(empty($faicon)){
					switch ($aActions[$i][1]) {
						case "view":
							$faicon="sticky-note-o";
							break;
						case "edit":
							$faicon="pencil";
							break;
						case "delete":
							$faicon="trash-o";
							break;
					}
				}
				$t.=" ".Html::anchor('admin/'.$controllerName.'/'.$aActions[$i][1].'/'.$item->id.'/'.$parameter, "<i class=\"fa fa-".$faicon."\"></i> " . $aActions[$i][0],
						$array
					);
			endif;
		}
		return $t;
	}
  static function agrouplabel(){		
		// generate grouplabel array
		$grouplabel=array();
		foreach(Auth::group('Simplegroup')->groups() as $label => $value):
			//Debug::dump($value);
			array_push($grouplabel,array($value=>Auth::group('Simplegroup')->get_name($value)));
		endforeach;
		return $grouplabel;
	}
	static function alanguage(){		
		// generate grouplabel array
		$alanguage=array();
		foreach(Config::get('locales') as $label => $value):
			//Debug::dump($value);
			array_push($alanguage,array($label=>$value));
		endforeach;
		return $alanguage;
	}
}
?>
