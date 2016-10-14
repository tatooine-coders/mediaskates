<?php
namespace App\Http\Controllers\Member;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{

    /**
     * Displays a list of CSS components
     */
    public function cssshow()
    {
        return view('css_show', [
            'pageTitle' => 'CSS list',
            'source' => 'member'
        ]);
    }
}
