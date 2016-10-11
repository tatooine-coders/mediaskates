<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

use App\Http\Controllers\Controller;

class AdminController extends Controller
{
    /*
     * Logique ici pour contrôler les accès
     */

    /**
     * Displays a list of CSS components
     */
    public function cssshow(){
      return view('css_show', [
        'pageTitle'=>'CSS list',
        'source'=>'admin'
      ]);
    }
}
