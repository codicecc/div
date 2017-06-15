<?php
class hsize{
	static function getSize($student_id=null,$bodyPartId=null,$sizeValue=null) {
		// Join Query - 1706151620
		$query = DB::select('sizes.reference')->from('students');
		$query->join('measures');
		$query->on('students.id', '=', 'measures.student_id');
		$query->join('body_parts');
		$query->on('body_parts.id', '=', 'measures.body_part_id');
		$query->join('sizes');
		$query->on('body_parts.id', '=', 'sizes.body_part_id');
		$query->where('students.id',$student_id);
		$query->where('body_parts.id',$bodyPartId);
		$query->where('sizes.min','<=',$sizeValue);
		$query->where('sizes.max','>=',$sizeValue);
		
		$rows=$query->execute();
		
		
		//debug::dump($rows[0]["reference"]);
		
		return $rows[0]["reference"]?$rows[0]["reference"]:"-";
	}
}
?>
