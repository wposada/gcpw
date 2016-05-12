<?php
namespace App\Controller;
use Cake\Network\Http\Client;
use Cake\ORM\TableRegistry;
class PortalsController extends AppController
{
    
public function index($filtering=null)
    {
    $this -> Portals -> recursive = 0;
    $filtering=(empty($this->request->data('filtering')))?$this->request['url']['filtering']:$this->request->data('filtering');
    $this->set('_f', $filtering);
	$this -> set("filterPlayer",'');
	$this->paginate = array('paramType' => 'querystring',
		          'conditions' => array("Portals.name LIKE" => "%" . $filtering . "%"),
            		  'limit' => 15,
            		  'order' => array('id' => 'desc'));
        // we are using the 'User' model
    	$portals = $this->paginate('Portals');
       	// pass the value to our view.ctp
    	$this->set('portals', $portals);
    }
    
    public function index2()
    {
             $this->paginate = array(
            'conditions' => array(''),
            'limit' => 80,
            'order' => array('id' => 'desc')
            );
                 
    // we are using the 'User' model
    $portals = $this->paginate('Portals');
     
    // pass the value to our view.ctp
    $this->set('portals', $portals);
        /*$portals = $this->Portals->find('all');
        $this->set(compact('portals'));*/
    }
    
    public function update($fact=null,$lng=null,$lat=null,$agent=null,$name=null,$address=null,$guid=null)
    {

    $portals = TableRegistry::get('Portals');
    $conditions = array(
    'Portals.lat' => $lat,
    'Portals.lng' => $lng);
    $exists = $portals->exists($conditions);
if ($exists){
        $portal = $portals->get($conditions);
        $this->set('g', '1');
    }else{

        $portal = $portals->newEntity();$this->set('g', '2');
        $portal-> name =$name;
        $portal-> address =$address;
    }
    $portal-> agent = $agent;
    $portal-> faction =$fact;
    $portal-> lat = $lat;
    $portal-> lng =$lng;
    $portal-> guid =$guid;
    $portals->save($portal);
    }
    
    public function view($id = null)
    {
        //$portal = $this->Portals->findById('1');
        
        $portal = $this->Portals->get($id);
        $this->set(compact('portal'));

    }
public function addg($lng=null,$lat=null,$faction=null,$agent=null,$captured=null)
    {
        $guardiansTable = TableRegistry::get('Guardians');
        $guardian = $guardiansTable->newEntity();
        $guardian->lng = $lng;
        $guardian->lat = $lat;
        $guardian->faction = $faction;
        $guardian->agent = $agent;
        $guardian->captured = $captured;
        
        if ($guardiansTable->save($guardian)) {
            // The $article entity contains the id now
            $this->set('g', '1');
        }
    }
public function addmus($faction=null,$agent=null,$captured=null,$mus=0)
    {
        $musTable = TableRegistry::get('mus');
        $mu = $musTable->newEntity();
        $mu->faction = $faction;
        $mu->agent = $agent;
        $mu->captured = $captured;
        $mu->mus = $mus;
        if ($musTable->save($mu)) {
            // The $article entity contains the id now
            $this->set('g', '1');
        }
    }    
    public function timeportal()
    {
    	date_default_timezone_set('America/Bogota');
    	$guar = TableRegistry::get('Guardians');
    	$query = $guar->find();
	$query->select(['agent','captured'])->limit(10)->order(['captured' => 'DESC']);
	$res="";
	foreach ($query as $row) {
		
		$dat=date('Y-m-d h:i:s',$row->captured/1000);
    		$res=$res.$dat." ".$row->agent;
    		$res=$res." : ";
	}
        $this->set('g', $res);
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
