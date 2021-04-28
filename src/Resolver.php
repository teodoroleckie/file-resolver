<?php

namespace Tleckie\FileResolver;

/**
 * Class Resolver
 *
 * @package Tleckie\FileResolver
 * @author  Teodoro Leckie Westberg <teodoroleckie@gmail.com>
 */
class Resolver
{
    /** @var int */
    private const DEFAULT_DEEP = 2;

    /** @var int  */
    private const DEFAULT_CHARS = 3;

    /** @var string */
    private string $basePath;

    /** @var string */
    private string $hash;

    /** @var string */
    private string $extension;

    /** @var int */
    private int $deep;

    /** @var int */
    private int $chars;

    /**
     * Resolver constructor.
     *
     * @param string $basePath
     * @param string $hash
     * @param string $extension
     * @param int    $deep
     * @param int    $chars
     */
    public function __construct(
        string $basePath,
        string $hash,
        string $extension = '',
        int $deep = self::DEFAULT_DEEP,
        int $chars = self::DEFAULT_CHARS
    ) {
        $this->changeBasePath($basePath);
        $this->changeHash($hash);
        $this->changeExtension($extension) ;
        $this->changeDeep($deep);
        $this->changeChars($chars);
    }

    /**
     * @return int
     */
    public function chars(): int
    {
        return $this->chars;
    }

    /**
     * @param int $chars
     * @return $this
     */
    public function changeChars(int $chars): self
    {
        $this->chars = $chars;

        return $this;
    }

    /**
     * @return string
     */
    public function hash(): string
    {
        return $this->hash;
    }

    /**
     * @param string $hash
     * @return $this
     */
    public function changeHash(string $hash): self
    {
        $this->hash = $hash;

        return $this;
    }

    /**
     * @return string
     */
    public function extension(): string
    {
        return $this->extension;
    }

    /**
     * @param string $extension
     * @return $this
     */
    public function changeExtension(string $extension): self
    {
        $this->extension = $extension;

        return $this;
    }

    /**
     * @return int
     */
    public function deep(): int
    {
        return $this->deep;
    }

    /**
     * @param int $deep
     * @return $this
     */
    public function changeDeep(int $deep): self
    {
        $this->deep = $deep;

        return $this;
    }

    /**
     * @return string
     */
    public function basePath(): string
    {
        return $this->basePath;
    }

    /**
     * @param string $basePath
     * @return $this
     */
    public function changeBasePath(string $basePath): self
    {
        $this->basePath = rtrim($basePath, DIRECTORY_SEPARATOR);

        return $this;
    }

    /**
     * @return string
     */
    public function fullName(): string
    {
        return sprintf(
            '%s%s',
            $this->fullPath(),
            $this->file()
        );
    }

    /**
     * @return string
     */
    public function fullPath(): string
    {
        $path = sprintf(
            '%s%s%s%s',
            $this->basePath,
            DIRECTORY_SEPARATOR,
            $this->split(),
            DIRECTORY_SEPARATOR
        );

        return $this->normalize($path);
    }

    /**
     * @return string
     */
    private function split(): string
    {
        $parts = str_split($this->hash, $this->chars);

        return implode(
            DIRECTORY_SEPARATOR,
            array_slice($parts, 0, $this->deep)
        );
    }

    /**
     * @return string
     */
    public function file(): string
    {
        if ($this->hasExtension()) {
            return sprintf('%s.%s', $this->hash, $this->extension);
        }

        return $this->hash;
    }

    /**
     * @return bool
     */
    private function hasExtension(): bool
    {
        return !empty($this->extension);
    }

    /**
     * @param string $value
     * @return string
     */
    private function normalize(string $value): string
    {
        return preg_replace(
            sprintf('#%s{2,}#', DIRECTORY_SEPARATOR),
            DIRECTORY_SEPARATOR,
            $value
        );
    }
}
