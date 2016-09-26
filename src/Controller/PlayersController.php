<?php
namespace App\Controller;
use Cake\Network\Http\Client;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
class PlayersController extends AppController
{
	
    public function initialize()
    {
        parent::initialize();
        $this->loadComponent('RequestHandler');
    }
public function getTimeCapture($lng,$lat){
	$lng=$lng/1000000;
	$lat=$lat/1000000;
	$connection = ConnectionManager::get('default');
	$sql="SELECT * FROM `guardians` WHERE `lng` = '.$lng.' AND `lat` = '.$lat.' ORDER BY `guardians`.`captured` DESC limit 5";
	$results = $connection->execute($sql)->fetchAll('assoc');
	
	//SELECT * FROM `guardians` WHERE `lng` = -74.114352 AND `lat` = 4.602126 ORDER BY `guardians`.`captured` DESC
	$agente=$results[0]['agent'];
	$fc=$results[0]["captured"]/1000;
        $fa=time();
        $total=($fa-$fc)/86400;
        $dias=number_format($total, 2, '.', '');
	//$agente=print_r($results,1);	
	 $this->RequestHandler->renderAs($this, 'json');
	$output = array(
    "address" => "lng:".$lng."lat:".$lat,
    "iris_id" => ".$sql.",
    "age" => $dias."días, x ".$agente
);
$this->set('output', $output);
	
}
    
public function index($filtering=null)
    {
    $this -> Players -> recursive = 0;
    $filtering=(empty($this->request->data('filtering')))?$this->request['url']['filtering']:$this->request->data('filtering');
    $this->set('_f', $filtering);
	$this -> set("filterPlayer",'');
	$this->paginate = array('paramType' => 'querystring',
		          'conditions' => array("Players.nick LIKE" => "%" . $filtering . "%"),
            		  'limit' => 15,
            		  'order' => array('id' => 'desc'));
        // we are using the 'User' model
    	$players = $this->paginate('Players');
       	// pass the value to our view.ctp
    	$this->set('players', $players);
    }
    
        public function guardian($agent=null,$flag=0)
    {
    	$connection = ConnectionManager::get('default');
	/*$results = $connection->execute('SELECT FROM_UNIXTIME(max(captured)/1000,"%Y-%m-%d %H:%i:%s") as captura 
,(SELECT agent from guardians g1 where 
  g1.lng=g2.lng and 
  g1.lat=g2.lat 
  order by captured desc 
  limit 1) as agente ,lng,lat 
  FROM guardians g2 where (SELECT agent from guardians g1 where g1.lng=g2.lng and g1.lat=g2.lat order by captured desc limit 1)
  like "%'.$agent.'%" group by lng,lat order by captura')->fetchAll('assoc');*/
  if($flag==1){
  	  $results = $connection->execute('SELECT max(captured) as captura 
,(SELECT agent from guardians g1 where 
  g1.lng=g2.lng and 
  g1.lat=g2.lat 
  order by captured desc 
  limit 1) as agente ,lng,lat 
  FROM guardians g2 group by lng,lat order by captura limit 5')->fetchAll('assoc');
  	
  }else{
  $results = $connection->execute('SELECT max(captured) as captura 
,(SELECT agent from guardians g1 where 
  g1.lng=g2.lng and 
  g1.lat=g2.lat 
  order by captured desc 
  limit 1) as agente ,lng,lat 
  FROM guardians g2 where (SELECT agent from guardians g1 where g1.lng=g2.lng and g1.lat=g2.lat order by captured desc limit 1)
  = "'.$agent.'" group by lng,lat order by captura limit 20')->fetchAll('assoc');
  }
  
  
        $this->set('g', $results);
    } 
    
}
