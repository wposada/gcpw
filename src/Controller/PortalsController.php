<?
namespace App\Controller;
use Cake\Network\Http\Client;
$http = new Client();
class PortalsController extends AppController
{
    public function index()
    {
        $portals = $this->Portals->find('all');
        $this->set(compact('portals'));
    }
    public function view($id = null)
    {
        $portal = $this->Portals->get($id);
        $me= $http->get('http://www.google.com');
        $this->set(compact('portal'));
        $this->set(compact('me'));
    }
}
