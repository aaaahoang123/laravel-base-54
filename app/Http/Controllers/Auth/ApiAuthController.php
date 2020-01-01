<?php
/**
 * Created by PhpStorm.
 * User: hoang
 * Date: 12/31/19
 * Time: 4:03 PM
 */

namespace App\Http\Controllers\Auth;


use App\Auth\AuthService;
use App\Http\AuthorizedRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Services\Contracts\DtoBuilderService;
use Illuminate\Http\Request;

class ApiAuthController extends Controller
{
    use AuthorizedRequest;

    private $authService;
    private $dtoBuilder;

    public function __construct(
        AuthService $authService,
        DtoBuilderService $dtoBuilder
    )
    {
        $this->authService = $authService;
        $this->dtoBuilder = $dtoBuilder;
    }

    public function login(LoginRequest $req) {
        $user = $this->authService->attempt($req->only(['username', 'password']));
        $token = $this->authService->generateToken($user);
        return $this->dtoBuilder->buildUserDto($user, $token);
    }

    public function userData(Request $req) {
        $user = $this->user();
        $token = $req->bearerToken();
        return $this->dtoBuilder->buildUserDto($user, $token);
    }
}
