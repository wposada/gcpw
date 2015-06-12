<?
namespace App\Controller;

class PortalsController extends AppController
{
    public function index()
    {
        $portals = $this->Portals->find('all');
        $this->set(compact('portals'));
    }
    public function view($id = null)
    {
        use Cake\Network\Http\Client;

$http = new Client();

// Simple get
$response = $http->get('http://example.com/test.html');
        $portal = $this->Portals->get($id);
        $me= $response;
        $this->set(compact('portal'));
        $this->set(compact('me'));
    }
}
