<?php
class horder{
	static function orderExsistingBySchool($id){
		
		$students=DB::select('id')
			->from('students')
			->where('school_id',$id)
			->as_object()
			->execute()
			;
		foreach($students as $student){
			if(self::orderExsistingByStudent($student->id))return true;
		}
		return false;
	}
	static function orderExsistingByStudent($id){
		$result = DB::select('id')
			->where('student_id',$id)
			->from('models_students')
			->execute();
        return ($result->count() > 0);	
	}
	static function orderExsistingByModel($id){
		$result = DB::select('id')
        ->where('model_id',$id)
        ->from('models_students')
        ->execute();
        return ($result->count() > 0);
	}
	static function orderExsisting($a){
		
		$school_id=0;
		$student_id=0;
		$model_id=0;
		
		foreach($a as $l => $v){
			if($l=="school_id")$school_id=$v;
			if($l=="student_id")$student_id=$v;
			if($l=="model_id")$model_id=$v;
		}
		
		$wschool="0=0";
		$wstudent="0=0";
		$wmodel="0=0";
	
		if($school_id>0){
			$student=DB::select('id')
					->from('students')
					->where('school_id',$school_id)
					->execute()
					;
			return ! ($student->count() > 0);
		}
		
		if($model_id>0)$wmodel="'model_id',".$model_id;
		if($student_id>0)$wstudent="'student_id',".$student_id;
		
		$result = DB::select('id')
        ->where($wstudent)
        //->where($wmodel)
        ->where('model_id',$model_id)
        ->from('models_students')
        ->execute();

        return ! ($result->count() > 0);

	}
}
?>
