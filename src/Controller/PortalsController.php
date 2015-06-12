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
        $me="mee";
        $this->set(compact('portal'));
        $this->set(compact('me'));
    }
}
