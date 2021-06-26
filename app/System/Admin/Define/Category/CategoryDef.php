<?php

declare(strict_types=1);

namespace App\System\Admin\Define\Category;


use App\Shared\Define\Category\CategoryShared;

class CategoryDef extends CategoryShared
{
    public function toArrayFilter() {
        $data = [
            'cat_id' => $this->cat_id,
            'cat_name' => $this->cat_name,
            'pid' => $this->pid,
            'desc' => $this->desc,
        ];

        foreach ($data as $k => &$v) {
            if ($v === NULL) {
                unset($data[$k]);
            }
        }
        return $data;
    }

}
