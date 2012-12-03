<?
class stats_model {
	public function add( $id, $count = '' )
	{
		$entries = db('extension');
		
		$stats = $entries->update(array(
			'count'	=>$count + 1
		))		
			->where( 'id', '=', $id )
			->execute();
	}
	
}