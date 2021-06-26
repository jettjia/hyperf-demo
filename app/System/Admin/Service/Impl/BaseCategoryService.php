<?php

declare(strict_types=1);

namespace App\System\Admin\Service\Impl;

use Hyperf\Di\Annotation\Inject;

use App\System\Admin\Service\CategoryServiceInterface;
use App\Dao\CategoryDao;
use App\System\Admin\Define\Category\CategoryDef;

class BaseCategoryService implements CategoryServiceInterface
{
    /**
     * @Inject
     * @var CategoryDao
     */
    private $CategoryDao;

    public function info(int $cat_id): array
    {
        $category = $this->CategoryDao->info($cat_id);
        if ($category) {
            return $category;
        }

        return [];
    }

    public function add(CategoryDef $category): bool
    {
        $flag = $this->CategoryDao->add($category);
        if ($flag) {
            return true;
        }

        return false;
    }

    public function update(CategoryDef $category): bool
    {
        $flag = $this->CategoryDao->update($category);
        if ($flag) {
            return true;
        }

        return false;
    }

}
