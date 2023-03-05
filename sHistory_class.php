<?php 

class sHistory extends Dbh
{
	
	protected function updateSearch($data)
	{
		$stmt = $this->connect()->prepare('SELECT * FROM searchhistory WHERE dotaz = ?');
		if(!$stmt->execute(array($data['s'])))
		{
			$stmt = null;
			header("location: ../index.php?error=stmtfailed");
			exit();
			$stmt = null;
			setDotaz($data);
		}

		$resultCheck;
		if($stmt->rowCount()>0)
		{
			$stmt = null;
			$this->updateDotaz($data);				
		}
		else
		{
			$stmt = null;
			$this->setDotaz($data);
		}
		return $resultCheck;
	}


	protected function setDotaz($data)
	{
		$stmt = $this->connect()->prepare('INSERT INTO searchhistory (dotaz, pocet_dotaz) VALUES (?, ?);');		
		if(!$stmt->execute(array($data['s'], 1)))
		{
			$stmt = null;
			header("location: ../index.php?error=stmtfailed");
			exit();
		}
		$stmt = null; // vynulování stmt pro bezpečnost injekce
	}

	protected function updateDotaz($data)
	{
		$stmt = $this->connect()->prepare('UPDATE searchhistory set pocet_dotaz=pocet_dotaz+1 where dotaz = ?;');
	
		if(!$stmt->execute(array($data['s'])))
		{
			$stmt = null;
			header("location: ../index.php?error=stmtfailed");
			exit();
		}

		$stmt = null; // vynulování stmt pro bezpečnost injekce
	}

	public function getWordCloud()
	{
		$stmt = $this->connect()->prepare('SELECT * FROM searchhistory ORDER BY pocet_dotaz DESC LIMIT 30;');
		
		if(!$stmt->execute())
		{
			$stmt = null;
			header("location: ../wordCloud.php?error=stmtfailed");
			exit();
		}
		if($stmt->rowCount()>0)
		{
			$wordCloudData = $stmt->fetchAll(PDO::FETCH_ASSOC);
			$stmt = null;
			return $wordCloudData;				
		}
		else
		{
			$wordCloudData = array();
			$stmt = null;
			return $wordCloudData;		
		}
		
	}
	
}