<?php

namespace App\Http\Controllers\Shortener;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardShortenerController extends Controller
{

    /**
     * Displaying dashboard view
     * and query link for the authenticated user
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  alias  $alias
     * @return view
     */
    public function dashboard(Request $request)
    {
        $links = Link::all();

        return view('dashboard', [
            'links' => $links
        ]);
    }


    /**
     * Delete link
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  alias  $alias
     * @return view
     */
    public function delete(Request $request)
    {
        $link = Link::where("alias", $request->alias)->first();

        if (Auth::id() == $link->id) {
            $link->delete();
            return redirect('a/dashboard');
        }

        abort(401);
    }
}
