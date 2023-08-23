<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Equipamentos Controller
 *
 * @property \App\Model\Table\EquipamentosTable $Equipamentos
 *
 * @method \App\Model\Entity\Equipamento[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class EquipamentosController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
        $this->loadModel('Users');
        $this->loadModel('Funcionarios');

        $this->paginate = [
            'contain' => ['Funcionarios.Users'],
        ];
        $equipamentos = $this->paginate($this->Equipamentos);

        $this->set(compact('equipamentos'));
    }

    /**
     * View method
     *
     * @param string|null $id Equipamento id.
     * @return \Cake\Http\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $equipamento = $this->Equipamentos->get($id, [
            'contain' => ['Funcionarios.Users'],
        ]);

        $this->set('equipamento', $equipamento);
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->loadModel('Users');
        $this->loadModel('Funcionarios');
        $equipamento = $this->Equipamentos->newEntity();

        if ($this->request->is('post')) {
            $equipamento = $this->Equipamentos->patchEntity($equipamento, $this->request->getData());

            // debug($equipamento); exit;
            if ($this->Equipamentos->save($equipamento)) {
                $this->Flash->success(__('Equipamento adicionado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O equipamento não pôde ser adicionado. Por favor, tente novamente.'));
        }
        
        // Cria uma nova consulta para buscar os funcionários e incluir os usuários associados
        $func = $this->Funcionarios->find('all', [
            'limit' => 200,
            'contain' => ['Users'] // Aqui você especifica as associações que deseja buscar
        ]);

        // No seu controller, onde você busca os funcionários ajustados
        $funcionarios = [];
        foreach ($func as $funcionario) {
            $funcionarios[$funcionario->id] = $funcionario->user->nome;
        }     
        
        $this->set(compact('equipamento', 'funcionarios'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Equipamento id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {

        $this->loadModel('Users');
        $this->loadModel('Funcionarios');
        $equipamento = $this->Equipamentos->get($id, [
            'contain' => ['Funcionarios.Users'],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $equipamento = $this->Equipamentos->patchEntity($equipamento, $this->request->getData());
            if ($this->Equipamentos->save($equipamento)) {
                $this->Flash->success(__('Equipamento atualizado com sucesso.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('O equipamento não pôde ser atualizado. Por favor, tente novamente.'));
        }
        $func = $this->Funcionarios->find('all', [
            'limit' => 200,
            'contain' => ['Users'] // Aqui você especifica as associações que deseja buscar
        ]);

        // No seu controller, onde você busca os funcionários ajustados
        $funcionarios = [];
        foreach ($func as $funcionario) {
            $funcionarios[$funcionario->id] = $funcionario->user->nome;
        } 
        
        $this->set(compact('equipamento', 'funcionarios'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Equipamento id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $equipamento = $this->Equipamentos->get($id);
        if ($this->Equipamentos->delete($equipamento)) {
            $this->Flash->success(__('Equipamento deletado com sucesso.'));
        } else {
            $this->Flash->error(__('O equipamento não pôde ser deletado. Por favor, tente novamente'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
