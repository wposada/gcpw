<?
namespace App\Controller;

class GuardianssController extends AppController
{

    public function index()
    {
         $this->set('guardians', $this->Guardians->find('all'));
    }

    public function view($id = null)
    {
        $article = $this->Articles->get($id);
        $this->set(compact('article'));
    }
    
    public function add($id = null)
    {
        $guardiansTable = TableRegistry::get('Guardians');
        $guardian = $articlesTable->newEntity();
        $guardian->lng = '1';
        $guardian->lat = '2';
        $guardian->faction = 'RES';
        $guardian->captured = '1234567890';
        
        if ($guardiansTable->save($guardian)) {
            // The $article entity contains the id now
            $id = $guardian->id;
        }
    }
    
}
