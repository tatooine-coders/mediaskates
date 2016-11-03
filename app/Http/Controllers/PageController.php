<?php
namespace App\Http\Controllers;

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
