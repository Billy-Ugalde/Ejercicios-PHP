<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;

class HomeController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            'auth',
        ];
    }

    public function index(Request $request)
    {
        // $request->session()->put(['billy' => 'master instructor']);

        // $request->session()->get('billy');

        // session(['billy2' => 'your student

        // return session('billy2');

        // $request->session()->forget('billy2');

        $request->session()->flush();

        return $request->session()->all();
    }
}
