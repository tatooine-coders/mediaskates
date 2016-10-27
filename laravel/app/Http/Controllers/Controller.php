<?php
namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests,
        DispatchesJobs,
        ValidatesRequests;

    /**
     * Creates a random filename
     *
     * @param string $ext
     *
     * @return string
     */
    protected function createFileName($ext = null)
    {
        $basename = md5(microtime());
        if (!is_null($ext)) {
            $basename .= '.' . $ext;
        }
        return strtolower($basename);
    }
}
