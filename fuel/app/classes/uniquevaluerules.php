<?php
class uniquevaluerules{
	static function checkNameFk($table,$fields,$values){
		/*
		 *  field[0] is name label , field[1] is Foreign Key label
		 *  value[0] is name value, value[1] is Foreign Key value
		**/
		$result = DB::select(DB::expr("LOWER (\"$fields[0]\")"))
        ->where($fields[0], '=', Str::lower($values[0]))
        ->where($fields[1], '=', $values[1])
        ->from($table)->execute();
        return ($result->count() > 0);
	}
}
?>
