<?php

declare(strict_types=1);

namespace App\System\Admin\Service;

use \App\System\Admin\Define\Category\CategoryDef;

interface CategoryServiceInterface
{
    public function add(CategoryDef $category):bool ;
    public function info(int $cat_id): array ;
    public function update(CategoryDef $category): bool ;
}
