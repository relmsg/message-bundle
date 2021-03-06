<?php
/**
 * This file is a part of Relations Messenger Message Standard Bundle.
 * This package is a part of Relations Messenger.
 *
 * @link      https://github.com/relmsg/message-bundle
 * @link      https://dev.relmsg.ru/packages/message-bundle
 * @copyright Copyright (c) 2018-2020 Relations Messenger
 * @author    h1karo <h1karo@outlook.com>
 * @license   Apache License 2.0
 * @license   https://legal.relmsg.ru/licenses/message-bundle
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace RM\Bundle\MessageBundle\Tests\DependencyInjection;

use RM\Bundle\MessageBundle\Tests\Stub\Autowired;
use RM\Standard\Message\Format\JsonMessageFormatter;
use RM\Standard\Message\Format\MessageFormatterInterface;
use RM\Standard\Message\Serializer\ChainMessageSerializer;
use RM\Standard\Message\Serializer\MessageSerializerInterface;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

/**
 * Class AutowiringTest
 *
 * @package RM\Bundle\MessageBundle\Tests\DependencyInjection
 * @author  h1karo <h1karo@outlook.com>
 */
class AutowiringTest extends WebTestCase
{
    public function testAutowiring(): void
    {
        self::bootKernel();
        $autowired = self::$container->get(Autowired::class);

        $this->assertInstanceOf(MessageFormatterInterface::class, $autowired->getFormatter());
        $this->assertInstanceOf(JsonMessageFormatter::class, $autowired->getFormatter());
        $this->assertInstanceOf(MessageSerializerInterface::class, $autowired->getSerializer());
        $this->assertInstanceOf(ChainMessageSerializer::class, $autowired->getSerializer());
    }
}
