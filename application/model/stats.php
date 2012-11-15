<?
class stats_model {
	// Stats need to be used with a redirect URL in Serpent in order to pass a valid count
	//$stats = load::model( 'stats' )->add($get[0]->id, $get[0]->count);
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