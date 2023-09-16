<?php

namespace App\Http\Controllers;

use App\Http\Requests\Categories\CategoryRequest;
use Illuminate\Http\Request;
use App\Methods\Helper;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
   /**
     * trait
     */
    use Helper;

    /**
     * The category repository instance.
     */
    protected $categoRyrepo;


    public function __construct(CategoryRepository $categoRyrepo)
    {
        $this->categoRyrepo = $categoRyrepo;
    }

    /**
     * Store a newly created resource in storage.
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(CategoryRequest $request)
    {
        $category = $this->categoRyrepo->create($request);
        if($category){
            return $this->responseJson(1, 'Data added successfully');
        }
        return $this->responseJson(0, 'falid! try again');

    }
}
