<?php

/** --------------------------------------------------------------------------------
 * This repository class manages all the data absctration for Articles
 *----------------------------------------------------------------------------------*/


namespace App\Repositories;

use App\Models\Article;

class ArticleRepository
{
    /**
     * The article repository instance.
     * @var Article
     */
    protected $article;

    public function __construct(Article $article)
    {
        $this->article = $article;
    }

    /**
     * Get all articles.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->article->all();
    }

    /**
     * Create a new article.
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function create($request)
    {
        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images/article', $image_name);
        } else {
            $image_name = null;
        }

        $created = $this->article->create([
            'image'       => $image_name,
            'title'       => $request->title,
            'description' => $request->description,
            'category_id' => $request->category_id,
        ]);

        return $created ? true : false;
    }

     /**
     * Get an article by ID.
     * @param int $id
     * @return \App\Models\Article|null
     */
    public function show($id)
    {
        $article = $this->article->find($id);
        return  $article;
    }

    /**
     * Update an article.
     * @param int  $id
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function update($id, $request)
    {
        $article = $this->article->find($id);

        if (!$article) {
            return false;
        }

        // Check if an image is uploaded
        if ($request->hasFile('image')) {
            $image_path = public_path().'/images/article/'.$article->image;
            if (file_exists($image_path)) {
                unlink($image_path);
            }

            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('images/article', $image_name);

            $updated = $article->update([
                'image'       => $image_name,
                'title'       => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
            ]);
        } else {
            $updated = $article->update([
                'title'       => $request->title,
                'description' => $request->description,
                'category_id' => $request->category_id,
            ]);
        }

        return $updated ? true : false;
    }


    /**
     * Delete an article by ID.
     * @param int $id
     * @return bool
     */
    public function destroy($id)
    {
        $article = $this->article->find($id);

        if (!$article) {
            return false;
        }

        $image_path = public_path().'/images/article/'.$article->image;
        if (file_exists($image_path)) {
            unlink($image_path);
        }

        $article->delete();

        return true;
    }
}
