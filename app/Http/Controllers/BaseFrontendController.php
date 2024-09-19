<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class BaseFrontendController extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected $data;

    public function __construct() 
    {
        $this->data["categories"] = Category::all();
    }
}
