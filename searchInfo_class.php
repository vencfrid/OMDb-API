<?php 

class SearchInfo extends sHistory 
{
	private $s;
	private $type;
	private $y;
	private $data;
	
	public function __construct($data) // přebere data z includu
	{
		$this->data=$data;
	}	

	public function getInfo()
	{
		$this->updateSearch($this->data);
		$ResultAPI = $this->APIInfo($this->data);
		return $ResultAPI;
	}

	protected function APIInfo($data)
	{
		$extension ='';
		foreach ($data as $key => $value) 
		{		
			$index = $key;
    		$extension =$extension.'&'.$index.'='.str_replace(" ","+",$value).'';
		}
		$API = 'http://www.omdbapi.com/?apikey=bc468fda&'.$extension;
		$result = file_get_contents($API);  
		$result = json_decode($result);
		return $result;
	}	
}