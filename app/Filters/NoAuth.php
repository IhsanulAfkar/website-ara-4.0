<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class NoAuth implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session()->get('isLoggedIn')) {
            if (session()->get('is_admin')) {
                if (session()->get('lomba') == "ctf") {
                    return redirect()->to(base_url('dashboard/admin-ctf'));
                }
                if (session()->get('lomba') == "olim") {
                    return redirect()->to(base_url('dashboard/admin-olim'));
                }
                if (session()->get('lomba') == "exploit") {
                    return redirect()->to(base_url('dashboard/admin-exploit'));
                }
            }
            if (session()->get('is_admin') == false) {
                if (session()->get('lomba') == "ctf") {
                    return redirect()->to(base_url('dashboard/user-ctf'));
                }
                if (session()->get('lomba') == "olim") {
                    return redirect()->to(base_url('dashboard/user-olim'));
                }
                if (session()->get('lomba') == "exploit") {
                    return redirect()->to(base_url('dashboard/user-exploit'));
                }
            }
        }
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}
