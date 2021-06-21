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

namespace App\System\Admin;

use App\System\Admin\Controller\AbstractController;

class IndexController extends AbstractController
{


    public function index()
    {
        $user = $this->request->input('user', 'Hyperf');
        $method = $this->request->getMethod();

        return [
            'method' => $method,
            'message' => "Hello {$user}.！！！",
        ];
    }

    public function actuator()
    {
        $url = (string)$this->request->url();
        $jsonData = [
            '_links' => [
                'self' => [
                    'href' => $url,
                    'templated' => false
                ],
                'health-path' => [
                    'href' => $url.'/health/{*path}',
                    'templated' => true
                ],
                'health' => [
                    'href' => $url.'/health',
                    'templated' => false
                ],
                'info' => [
                    'href' => $url.'/info',
                    'templated' => false
                ],
            ]
        ];
        return $this->response->json($jsonData);
    }
}
