<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CookieController extends Controller
{
    public function index(Request $request): JsonResponse
    {
        return response()->json([
            'cookie_access' => $request->cookie('cookie_access')
        ]);
    }

    public function update(Request $request): JsonResponse
    {
        $access = $request->cookie('cookie_access');

        if ($access == 'y') {
            $cookie = cookie('cookie_access', 'n', 3660);
        } else {
            $cookie = cookie('cookie_access', 'y', 3660);
        }

        return response()->json([
            'cookie_access' => $cookie->getValue()
        ], 200)->withCookie($cookie);
    }
}
