<?php

namespace App\Http\Controllers\Shortener;

use App\Http\Controllers\Controller;
use App\Models\Link;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class LinkShortenerController extends Controller
{
     /**
     * Just showing the home page
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function home(Request $request)
    {
        return view('home');
    }


    /**
     * Retrive link by it's alias
     * then redirect the user to the 'real_link'
     * and increase the hit counter
     *
     * If the link not found return 404
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $alias
     * @return \Illuminate\View\Redirect
     */
    public function translate(Request $request, $alias) {

        // Check if the real link exist when not return 404
        if (!($link = Link::where('alias', $alias)->first())) {
            return response()->view('link-not-found')->setStatusCode(404);
        }

        $real_link = $link->real_link; // Retrive the real link (destination)

        // Check if the real link start with http(s)://
        if (!preg_match('/https?:\/\/(www\.)?[-a-zA-Z0-9@:%._\+~#=]{1,256}\.[a-zA-Z0-9()]{1,6}\b([-a-zA-Z0-9()@:%_\+.~#?&\/\/=]*)/', $real_link)) {
            $real_link = "http://".$real_link; // Add http:// to the begining of the real link
        }

        // Increase the hit counter then save it
        $link->hit_count += 1;
        $link->save();

        return redirect()->away($real_link);
    }

    /**
     * Save link to database
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function insert(Request $request)
    {

        $request->validate([
            'link' => ['required', 'regex:/(http(s)?:\/\/.)?(www\.)?[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,6}\b([-a-zA-Z0-9@:%_\+.~#?&\/\/\=]*)/'],
            'alias' => ['nullable', 'min:6', 'max:30', 'alpha_num', 'unique:App\Models\Link,alias']
        ]);

        // Check if user want to use cutom alias
        if (!$request->custom or empty($request->alias)) {
            // Creating random alias for link
            $alias = Hash::make($request->alias);
            $alias = preg_replace('/([^A-Za-z1-9])+/', '', $alias);
            $alias = mb_substr($alias, 3, 6);

        } else {
            $alias = $request->alias;
        }

        $link = new Link;
        $link->real_link = $request->link;
        $link->alias = $alias;

        if (Auth::check()) {
            $link->user_id = Auth::id();
        }

        $link->save();

        if ($request->origin == 'dashboard') {

            return redirect('a/dashboard');

        } else {
            return view('link-success', [
                'link' => $request->link,
                'alias' => $alias,
            ]);
        }

    }
}
