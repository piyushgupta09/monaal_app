<?php

namespace App\Http\Coordinators;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Coordinator extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
}
