<?php

namespace App\Http\Controllers\Admin;


use App\Http\Controllers\Controller;

class BsesController extends Controller
{
    protected $pagesize=10;
    public function __construct()
    {
        $this->pagesize=config('page.pagesize');
    }
}
