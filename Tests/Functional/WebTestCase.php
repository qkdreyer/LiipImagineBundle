<?php

/*
 * This file is part of the `liip/LiipImagineBundle` project.
 *
 * (c) https://github.com/liip/LiipImagineBundle/graphs/contributors
 *
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Liip\ImagineBundle\Tests\Functional;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase as BaseWebTestCase;

abstract class WebTestCase extends BaseWebTestCase
{
    /**
     * @return string
     */
    public static function getKernelClass()
    {
        require_once __DIR__.'/app/AppKernel.php';

        return 'Liip\ImagineBundle\Tests\Functional\app\AppKernel';
    }

    /**
     * @param string $name
     *
     * @return object
     */
    protected function getService($name)
    {
        if (!static::$kernel) {
            $this->createClient();
        }

        return static::$kernel->getContainer()->get($name);
    }

    /**
     * @param string $name
     *
     * @return mixed
     */
    protected function getParameter($name)
    {
        if (!static::$kernel) {
            $this->createClient();
        }

        return static::$kernel->getContainer()->getParameter($name);
    }
}
