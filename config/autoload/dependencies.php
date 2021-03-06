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

// config/autoload/dependencies.php  完成关系绑定
$dependencies = array_merge(
    require BASE_PATH . '/config/autoload/depend/admin.php',
    require BASE_PATH . '/config/autoload/depend/api.php'
);

return $dependencies;
