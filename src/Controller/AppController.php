<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Controller\Controller;

class AppController extends Controller
{

    public function beforeFilter(\Cake\Event\EventInterface $event)
    {
        parent::beforeFilter($event);

        $session = $this->request->getSession();
        $user = $session->read('Auth');

        $action = $this->request->getParam('action');
        $controller = $this->request->getParam('controller');

        // Cho phép login
        if ($controller === 'Teachers' && $action === 'login') {
            return;
        }

        // Nếu chưa login → redirect
        if (!$user) {
            return $this->redirect(['controller' => 'Teachers', 'action' => 'login']);
        }
    }
}

