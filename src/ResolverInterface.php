<?php

namespace Tleckie\FileResolver;

/**
 * Interface ResolverInterface
 *
 * @package Tleckie\FileResolver
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
interface ResolverInterface
{
    /**
     * @return int
     */
    public function chars(): int;

    /**
     * @param int $chars
     * @return $this
     */
    public function changeChars(int $chars): self;

    /**
     * @return string
     */
    public function hash(): string;

    /**
     * @param string $hash
     * @return $this
     */
    public function changeHash(string $hash): self;

    /**
     * @return string
     */
    public function extension(): string;

    /**
     * @param string $extension
     * @return $this
     */
    public function changeExtension(string $extension): self;

    /**
     * @return int
     */
    public function deep(): int;

    /**
     * @param int $deep
     * @return $this
     */
    public function changeDeep(int $deep): self;

    /**
     * @return string
     */
    public function basePath(): string;

    /**
     * @param string $basePath
     * @return $this
     */
    public function changeBasePath(string $basePath): self;

    /**
     * @return string
     */
    public function fullName(): string;


    /**
     * @return string
     */
    public function fullPath(): string;

    /**
     * @return string
     */
    public function file(): string;
}
