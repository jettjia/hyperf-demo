<?php

declare(strict_types=1);

namespace App\Dao;

use App\Model\Category;
use App\System\Admin\Define\Category\CategoryDef;

class CategoryDao
{

    public function add(CategoryDef $category)
    {
        $model = new Category();

        return $model->insertGetId($category->toArray());
    }

    public function updateOrigin(CategoryDef $category)
    {
        return Category::where('cat_id', $category->getCatId())->update($category->toArray());
    }


    public function update(CategoryDef $category)
    {
        return Category::where('cat_id', $category->getCatId())->update($category->toArray());
    }

    public function info(int $cat_id) : array
    {
        $cat = Category::query()->where('cat_id', $cat_id)->select('*')->first();
        if ($cat) {
            return $cat->toArray();
        }

        return [];
    }

}
