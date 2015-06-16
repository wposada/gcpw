<?
namespace App\Controller;
use Cake\Network\Http\Client;
use Cake\ORM\TableRegistry;

class PortalsController extends AppController
{
    public function index()
    {
        $portals = $this->Portals->find('all');
        $this->set(compact('portals'));
    }
    public function view($id = null)
    {
         $http = new Client();

          // Simple get
        //$response = $http->get('http://cerebro.botnyx.com/a/portal/083a8841b05140dc8dd7dacd0024b265.16');////1portal
        $response= $http->get('http://cerebro.botnyx.com/a/portals/4.649456/-74.101633/1');
        $portal = $this->Portals->get($id);
        $portalJson= json_decode($response->body);
        //var_dump(json_decode($portalJson,true));
        foreach ($portalJson as $clave => $valor){
            //echo $clave;
            $portalsTable = TableRegistry::get('Portals');
            $portalSave = $portalsTable->newEntity();
            $portalSave->guid = $clave;
            foreach ($valor as $clave2 => $valor2){
                if($clave2=='title'){
                    $portalSave-> name = $valor2;
                }
                if($clave2=='team'){
                    $portalSave-> faction = $valor2=="RESISTANCE"?"RES":($valor2=="ALIENS"?"ENL":"N_N");
                }
                
            }
            $response = $http->get('http://cerebro.botnyx.com/a/portal/'.$portalSave->guid);
            $portalUpdate=json_decode($response->body);
            echo $portalUpdate;
            $portalsTable->save($portalSave);
        } 
        $this->set(compact('portal'));
        $this->set(compact('portalJson'));

    }
}
