<?php

defined('PREVENT_DIRECT_ACCESS') OR exit('No direct script access allowed');

class AuthMiddleware
{
    public function handle(Closure $next)
    {
        $lava = lava_instance();
        $lava->call->library('session');

        if (!$lava->session->userdata('authenticated')) {
            redirect('login');
            exit;
        }

        return $next();
    }
}