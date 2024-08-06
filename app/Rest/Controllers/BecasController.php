<?php

namespace App\Rest\Controllers;

use App\Models\Beca;
use App\Rest\Controller as RestController;
use App\Rest\Resources\BecaResource;

class BecasController extends RestController
{
    /**
     * The resource the controller corresponds to.
     *
     * @var class-string<\Lomkit\Rest\Http\Resource>
     */
    public static $resource = BecaResource::class;

    public function index()
    {
        $becas = Beca::all();
        return view('becas.index', compact('becas'));

    }
}
