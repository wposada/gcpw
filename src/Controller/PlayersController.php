<?php
namespace App\Controller;
use Cake\Network\Http\Client;
use Cake\ORM\TableRegistry;
class PlayersController extends AppController
{
       public function index($filtering=null)
    {
        $this -> Players -> recursive = 0;
        $filtering=(empty($this->request['url']['filtering']))?$this->request->data('filtering'):$this->request['url']['filtering'];
        $this->set('_f', $filtering);
	$this -> set("filterPlayer",'');
	$this->paginate = array('paramType' => 'querystring',
		          'conditions' => array("Players.nick LIKE" => "%" . $filtering . "%"),
            		  'limit' => 5,
            		  'order' => array('id' => 'desc'));
        // we are using the 'User' model
    	$players = $this->paginate('Players');
       	// pass the value to our view.ctp
    	$this->set('players', $players);
	//$this -> set("players", $this -> Paginator -> paginate('Players', array('Players.id >' => '0')));
	$this->paginate['your'] = "foo";
    }
    
    
    public function index2()
    {
             $this->paginate = array(
            'conditions' => array(''),
            'limit' => 2,
            'order' => array('id' => 'desc')
            );
                 
    // we are using the 'User' model
    $players = $this->paginate('Players');
     
    // pass the value to our view.ctp
    $this->set('players', $players);
        /*$portals = $this->Portals->find('all');
        $this->set(compact('portals'));*/
    }
    
    public function update($lng=null,$lat=null,$name=null)
    {
        $portals = TableRegistry::get('Portals');
        $portal = $portals->get(2);
        $portal-> lng = $lng;
        $portal-> lat =$lat;
        $portal-> name =$name;
        $portals->save($portal);
        
    }
    
    public function view($id = null)
    {
        //$portal = $this->Portals->findById('1');
        
        $player = $this->Playerss->get($id);
        $this->set(compact('player'));
  
        
        
    }
    public function view2($id = null)
    {
         $http = new Client();
          // Simple get
        //$response = $http->get('http://cerebro.botnyx.com/a/portal/083a8841b05140dc8dd7dacd0024b265.16');////1portal
        //$response= $http->get('http://cerebro.botnyx.com/a/portals/4.649456/-74.101633/1');
        $portal = $this->Portals->get($id);
        //$portalJson= json_decode($response->body);
        //var_dump(json_decode($portalJson,true));
        foreach ($portalJson as $clave => $valor){
            //echo $clave;
            $portalsTable = TableRegistry::get('Portals');
           
            
            $portals = TableRegistry::get('Portals');
            $total = $portals->find()->where(['guid' => $clave])->count();
            if($total){
                $query = $portals->find();
                $query->select(['id'])->where(['guid' => $clave])->limit(1);
                foreach ($query as $row) {
                    $portalSave = $portals->get($row->id);
                }
            }else{
                $portalSave = $portalsTable->newEntity();
                $portalSave->guid = $clave;
            }
            
            foreach ($valor as $clave2 => $valor2){
                if($clave2=='title'){
                    $portalSave-> name = $valor2;
                }
                if($clave2=='team'){
                    $portalSave-> faction = $valor2=="RESISTANCE"?"RES":($valor2=="ALIENS"?"ENL":"N_N");
                }
                
            }
            $response = $http->get('http://cerebro.botnyx.com/a/portal/'.$clave);
            $portalUpdate=json_decode($response->body);
            //echo $portalUpdate->owner;
            $portalSave-> agent= $portalUpdate->owner;
            $portalSave-> lng= 0;
            $portalSave-> lng= 0;
            
            $portalsTable->save($portalSave);
        } 
        $this->set(compact('portal'));
       // $this->set(compact('portalJson'));
    }
}
