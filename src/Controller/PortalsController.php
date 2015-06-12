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
$response = $http->get('https://cerebro.botnyx.com/a/portal/083a8841b05140dc8dd7dacd0024b265.16');
        $portal = $this->Portals->get($id);
        $me= $response;
        $this->set(compact('portal'));
        $this->set(compact('me'));
    }
}
