<?php
namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Services\AuthService;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    protected $authService;

    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }


    public function login(Request $request) {
        try {
            return response($this->authService->login($request), 200);
        }catch (\Exception $e) {
            return response($e->getMessage(), 401);
        }
    }

    public function register(Request $request) {
        try {
            return response($this->authService->register($request), 200);
        } catch (\Exception $e) {
            return response($e->getMessage(), 409);
        }

    }

    public function logout() {
        return response($this->authService->logout());
    }

}
