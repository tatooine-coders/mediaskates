<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class PageController extends Controller
{
    /**
     * Display a a page
     *
     * @param string $page Page to display
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(string $page)
    {
        /*
         * TODO : Check if file exists
         */
        return view($page);
    }
}
