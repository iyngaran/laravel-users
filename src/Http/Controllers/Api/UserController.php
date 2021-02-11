<?php


namespace Iyngaran\User\Http\Controllers\Api;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
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

    public function store(Request $request): JsonResponse
    {
        return response()->json([
            'name' => 'Abigail',
            'state' => 'CA',
        ]);
    }

    public function show($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
