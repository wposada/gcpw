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
            $portal = $portalsTable->newEntity();
            $portal->guid = $clave;
            //$portalsTable->save($portal);
            foreach ($valor as $clave2 => $valor2){
                echo $clave2."-->".$valor2;
            }
        } 
        $this->set(compact('portal'));
        $this->set(compact('portalJson'));

    }
}
