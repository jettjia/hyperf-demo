<?php

declare(strict_types=1);

namespace App\System\Admin\Request\Category;

use Hyperf\Di\Annotation\Inject;
use Hyperf\Validation\Contract\ValidatorFactoryInterface;

class CategoryRequest
{
    /**
     * @Inject()
     * @var ValidatorFactoryInterface
     */
    protected $validationFactory;

    public function checkUpdate($request)
    {
        $validator = $this->validationFactory->make($request->all(),
            [
                'cat_id' => 'required',
            ],
            [
                'cat_name.required' => 'cat_name 必填',
            ]
        );
        if ($validator->fails()) {
            $errorMessage = $validator->errors()->first();
            return ['state' => false, 'data' => $errorMessage];
        }
        $postData = $request->post();

        return ['state' => true, 'data' => $postData];
    }

}


