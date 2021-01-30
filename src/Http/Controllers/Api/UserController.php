<?php


namespace Iyngaran\User\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Routing\Controller;

class UserController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA',
        ]);
    }
}
