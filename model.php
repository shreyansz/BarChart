<?php   

class Model
{
    static function getMySQLConnection()
    {
        $mysqli = new mysqli("localhost", "root", "", "eshdb");
        if ($mysqli->connect_errno) 
        {
            trigger_error("Failed to connect to MySQL: (" . $mysqli->connect_errno . ") " . $mysqli->connect_error, E_USER_ERROR);
        }
        return $mysqli;
    }

    static function getMySQLData()
    {
        $mysqli = Model::getMySQLConnection();

        $sql="SELECT ben, AVG(cost/(CASE 
        				  WHEN measure='k' THEN bandwidth/1000
        				  WHEN measure='g' THEN bandwidth*1000
        				  WHEN measure='t' THEN bandwidth*1000000
        				  ELSE bandwidth END)) as costPerMB
        				  FROM school_purchases GROUP BY ben";
        $rs=$mysqli->query($sql);
        if($rs === false) 
        {
          trigger_error('Wrong SQL: ' . $sql . ' Error: ' . $conn->error, E_USER_ERROR);
        } 
        else 
        {
        	$arr = array();
        	while($row = $rs->fetch_assoc())
        	{
        		$arr[$row['ben']] = $row['costPerMB'];
        	}	
        }
        $mysqli->close();
        return $arr;
    }

    static function getMongoData()
    {
        $m = new MongoClient();
        $db = $m->test;
        $collection = $db->organizations;
        $cursor = $collection->find();
        $arr = array();
        foreach ($cursor as $document) 
        {
        	$totalCost = 0;
            foreach ($document['purchases'] as $purchase) 
            {
            	switch ($purchase['measure']) 
            	{
            		case 'k':
            			$bandwidth = $purchase['bandwidth']/1000;
            			break;
            		case 'g':
            			$bandwidth = $purchase['bandwidth']*1000;
            			break;
            		case 't':
            			$bandwidth = $purchase['bandwidth']*1000000;
            			break;
            		default:
            			$bandwidth = $purchase['bandwidth'];
            			break;
            	}
            	$totalCost += $purchase['cost']/$bandwidth; 
            }
            $arr[$document['ben']] = $totalCost / count($document['purchases']);
        }
        return $arr;
    }
}