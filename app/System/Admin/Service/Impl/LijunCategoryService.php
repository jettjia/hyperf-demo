<?php

declare(strict_types=1);

namespace App\System\Admin\Service\Impl;

use Hyperf\Di\Annotation\Inject;

class LijunCategoryService extends BaseCategoryService
{
    public function findCategoryPage(int $cur_page, int $per_page, string $cat_name) {
        return ['这是自己单独实现的方法'];
    }
}
