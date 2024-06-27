<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

//General (Mahasiswa & Admin) Auth Filter
class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        if (!$session->get('isLoggedIn')) {
            return redirect()->to(base_url('/'));
        }

        $userType = $session->get('user_type');
        if ((!$this->isMahasiswaLoggedIn()) && (!$this->isAdminLoggedIn())) {
            return response()->setJSON([
                'status' => 'error',
                'message' => 'Unauthorized access',
                'redirect_url' => '/',
                'session' => $session->get(),
            ])->setStatusCode(401);
        }
    }

    private function isMahasiswaLoggedIn()
    {
        $session = session();
        if ($session->get('user_type') === 'mahasiswa' && $session->get('isLoggedIn')) return true;

        return false;
    }

    private function isAdminLoggedIn()
    {
        $session = session();
        if ($session->get('user_type') === 'admin' && $session->get('isLoggedIn')) return true;

        return false;
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here if needed
    }
}
