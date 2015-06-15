<?
namespace App\Controller;
use Cake\Network\Http\Client;

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
        $portalJson= $response ->json;
        $this->set(compact('portal'));
        $this->set(compact('portalJson'));
        foreach ($portalJson as $clave => $valor){
        echo $clave."-->"$valor."<br>";
            
        } 
    }
}
