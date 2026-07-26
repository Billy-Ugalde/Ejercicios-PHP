<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class AdminController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'IsAdmin',
        ];
    }

    public function index(Request $request)
    {
        return 'you are an administrator because you are seeing this page';
    }
}
