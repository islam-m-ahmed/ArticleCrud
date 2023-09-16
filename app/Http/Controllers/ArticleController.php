<?php

/** --------------------------------------------------------------------------------
 * This controller manages all the business logic for articles
 *----------------------------------------------------------------------------------*/

namespace App\Http\Controllers;

use App\Http\Requests\Articles\ArticleRequest;
use App\Repositories\ArticleRepository;
use Illuminate\Http\Request;
use App\Methods\Helper;

class ArticleController extends Controller
{

    use Helper;

    /**
     * The article repository instance.
     * @var ArticleRepository
     */
    protected $articleRepo;


    public function __construct(ArticleRepository $articleRepo)
    {
        $this->articleRepo = $articleRepo;
    }


    /**
     * Display a listing of the resource.
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $articles = $this->articleRepo->all();
        return $this->responseJson(1, 'data loaded', $articles);
    }

    /**
     * Store a newly created resource in storage.
     * @param ArticleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(ArticleRequest $request)
    {
        if ($data = $this->articleRepo->create($request)) {
            return  $this->responseJson(1, 'Data added successfully');
        }
        return  $this->responseJson(0, 'Failed! Try again');
    }

    /**
     * Display the specified resource.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function show($id)
    {
        //
        $article = $this->articleRepo->show($id);
        return $this->responseJson(1, 'Data loaded', $article);
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function edit($id)
    {
        $article = $this->articleRepo->show($id);
        if ($article) {
            return $this->responseJson(1, 'Data loaded', $article);
        } else {
            return $this->responseJson(0, 'Failed! Try again', $article);
        }
    }

    /**
     * Update the specified resource in storage.
     * @param int $id
     * @param ArticleRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function update($id, ArticleRequest $request)
    {
        if ($data = $this->articleRepo->update($id, $request)) {
            return  $this->responseJson(1, 'Data updated successfully');
        }
        return  $this->responseJson(0, 'Failed! Try again');
    }

     /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        $article = $this->articleRepo->destroy($id);
        if ($article) {
            return  $this->responseJson(1, 'Data deleted successfully');
        }
        return  $this->responseJson(0, 'Faild! try again');
    }
}
