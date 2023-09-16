<?php

/** --------------------------------------------------------------------------------
 * This repository class manages all the data absctration for category
 *----------------------------------------------------------------------------------*/


namespace App\Repositories;

use App\Models\category;

class CategoryRepository
{
    /**
     * The category repository instance.
     * @var category
     */
    protected $category;

    public function __construct(category $category)
    {
        $this->category = $category;
    }

    /**
     * Get all categories.
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return $this->category->all();
    }

    /**
     * Create a new category.
     * @param \Illuminate\Http\Request $request
     * @return bool
     */
    public function create($request)
    {
        $this->category->create($request->all());
        return true;
    }

    /**
     * Update a category by ID.
     * @param int $id
     * @param array $data
     * @return bool
     */
    public function update($id, $data)
    {
        $category = $this->category->find($id);

        if (!$category) {
            return false;
        }

        $category->update($data);
        return true;
    }

    /**
     * Delete a category by ID.
     * @param int $id
     * @return bool
     */
    public function destroy($id)
    {
        $category = $this->category->find($id);

        if (!$category) {
            return false;
        }

        $category->delete();
        return true;
    }
}
