<?php
// app/classes/hvalidation.php
class Hvalidation{
	
    public static function _validation_unique($val, $options){

		$validation = \Validation::active();

        list($table, $field) = explode('.', $options);
        $result = DB::select(DB::expr("LOWER (\"$field\")"))
        ->where($field, '=', Str::lower($val))
        ->where($table.".id", '<>',  $validation->input('id'))
        ->from($table)->execute();

        return ! ($result->count() > 0);
    }

    // note this is a non-static method
    public function _validation_is_upper($val)
    {
        return $val === strtoupper($val);
    }

}
?>
