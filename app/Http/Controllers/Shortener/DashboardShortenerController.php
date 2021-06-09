<?php

namespace App\Http\Controllers\Shortener;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;

class DashboardShortenerController extends Controller
{

    public function dashboard(Request $request)
    {
        $links = Link::all();

        return view('dashboard', [
            'links' => $links
        ]);
    }
}
