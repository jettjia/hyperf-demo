<?php

declare(strict_types=1);
/**
 * This file is part of Hyperf.
 *
 * @link     https://www.hyperf.io
 * @document https://hyperf.wiki
 * @contact  group@hyperf.io
 * @license  https://github.com/hyperf/hyperf/blob/master/LICENSE
 */

namespace App\System\Admin\Controller;

use Hyperf\Di\Annotation\Inject;
use Hyperf\HttpServer\Contract\RequestInterface;

use App\System\Admin\Request\Category\CategoryRequest;
use App\System\Admin\Define\Category\CategoryDef;
use App\System\Admin\Service\CategoryServiceInterface;

class CategoryController extends AbstractController
{

    /**
     * @Inject
     * @var CategoryRequest
     */
    private $CategoryRequest;

    /**
     * @Inject
     * @var CategoryServiceInterface
     */
    private $categoryService;

    public function add()
    {
        $category = new CategoryDef();
        $category->setCatName('test_cat_name');
        $category->setPid(0);
        $category->setDesc('');

        $res = $this->categoryService->add($category);

        return apiOk($res);
    }

    public function info()
    {
        $res = $this->categoryService->info((int)$this->request->input('id'));

        return apiOk($res);
    }

    public function update(RequestInterface $request)
    {
        $validatorResult = $this->CategoryRequest->checkUpdate($request);

        if ($validatorResult['state'] !== true) {
            return apiErr($validatorResult['data']);
        }
        $data = $validatorResult['data'];

        $category = new CategoryDef();
        $category->setCatId($data['cat_id']);
        $category->setCatName($data['cat_name']);
        $category->setPid($data['pid']);
        $category->setDesc($data['desc']);

        $res =  $this->categoryService->update($category);

        return apiOk($res);
    }

    public function updateSome(RequestInterface $request)
    {
        $data = $request->all();
        $category = new CategoryDef();
        $category->setCatId($data['cat_id']);
        $category->setDesc($data['desc']);

        $res =  $this->categoryService->update($category);

        return apiOk($res);
    }
}
