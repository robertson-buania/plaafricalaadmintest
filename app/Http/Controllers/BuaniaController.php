<?php

namespace App\Http\Controllers;

use App\Models\Newsletter;
use App\Http\Requests\StoreexpertiseRequest;
use App\Http\Requests\UpdateexpertiseRequest;

class BuaniaController extends Controller
{
    public function newsletter()
    {
        $news=Newsletter::all();
        return view("newsletter.newsletter",["newsletters"=>$news]);
    }

}
