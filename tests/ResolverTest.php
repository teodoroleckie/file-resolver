<?php

namespace Tleckie\FileResolver\Tests;

use PHPUnit\Framework\TestCase;
use Tleckie\FileResolver\Resolver;

/**
 * Class ResolverTest
 *
 * @package Tleckie\FileResolver\Tests
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
class ResolverTest extends TestCase
{
    /**
     * @test
     */
    public function default(): void
    {
        $resolver = new Resolver(
            $this->retrievePath(),
            $this->retrieveHash(),
            $this->retrieveExtension()
        );

        static::assertEquals(sprintf('%s.%s', $this->retrieveHash(), $this->retrieveExtension()), $resolver->file());
        static::assertEquals(rtrim($this->retrievePath(), '/'), $resolver->basePath());
        static::assertEquals(3, $resolver->chars());
        static::assertEquals(2, $resolver->deep());
        static::assertEquals($this->retrieveHash(), $resolver->hash());
        static::assertEquals($this->retrieveExtension(), $resolver->extension());

        $fullName = rtrim($this->retrievePath(), '/')
            .'/da3/9a3/'
            .sprintf('%s.%s', $this->retrieveHash(), $this->retrieveExtension());

        static::assertEquals($fullName, $resolver->fullName());


        $fullPath = rtrim($this->retrievePath(), '/')            .'/da3/9a3/';

        static::assertEquals($fullPath, $resolver->fullPath());
    }

    /**
     * @test
     */
    public function changeValues(): void
    {
        $resolver = new Resolver(
            $this->retrievePath(),
            $this->retrieveHash(),
            $this->retrieveExtension()
        );

        $resolver->changeHash('de9f2c7fd25e1b3afad3e85a0bd17d9b100db4b3');
        $resolver->changeChars(4);
        $resolver->changeExtension('json');
        $resolver->changeDeep(4);
        $resolver->changeBasePath('/tmp/');

        static::assertEquals(
            '/tmp/de9f/2c7f/d25e/1b3a/de9f2c7fd25e1b3afad3e85a0bd17d9b100db4b3.json',
            $resolver->fullName()
        );
    }


    /**
     * @return string
     */
    private function retrievePath(): string
    {
        return '/var/www/data/pase-path//';
    }

    /**
     * @return string
     */
    private function retrieveHash(): string
    {
        return 'da39a3ee5e6b4b0d3255bfef95601890afd80709';
    }

    /**
     * @return string
     */
    private function retrieveExtension(): string
    {
        return 'data';
    }
}
