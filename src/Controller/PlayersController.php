<?php
namespace App\Controller;
use Cake\Network\Http\Client;
use Cake\ORM\TableRegistry;
use Cake\Datasource\ConnectionManager;
class PlayersController extends AppController
{
    
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
    
        public function guardian($agent=null)
    {
    	$connection = ConnectionManager::get('default');
	$results = $connection->execute('SELECT FROM_UNIXTIME(max(captured)/1000,"%Y-%m-%d %H:%i:%s") as captura 
,(SELECT agent from guardians g1 where 
  g1.lng=g2.lng and 
  g1.lat=g2.lat 
  order by captured desc 
  limit 1) as agente ,lng,lat 
  FROM guardians g2 where (SELECT agent from guardians g1 where g1.lng=g2.lng and g1.lat=g2.lat order by captured desc limit 1)
  like "%'.$agent.'%" group by lng,lat order by captura')->fetchAll('assoc');
        $this->set('g', $results);
    } 
    
}
