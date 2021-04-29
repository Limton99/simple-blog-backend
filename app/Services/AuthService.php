<?php


namespace App\Services;



use Illuminate\Http\Request;

interface AuthService
{
    public function register(Request $request);
    public function login(Request $request);
    public function logout();
}
