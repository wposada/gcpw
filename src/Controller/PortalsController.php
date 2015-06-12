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
        $portal = $this->Portals->get($id);
        $this->set(compact('portal'));
    }
}
