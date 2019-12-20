<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;


// Used to share controller logic
class Controller extends BaseController {
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


}
