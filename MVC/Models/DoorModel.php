<?php

namespace Models;

class DoorModel
{
    public int $index;
    public string $content;
    public bool $isOpen;

    public function __construct(int $index, string $content)
    {
        $this->index = $index;
        $this->content = $content;
        $this->isOpen = false;
    }

    public function getAction(): string
    {
        return $this->content;
    }

    public function getIsOpen(): bool
    {
        return $this->isOpen;
    }

    public function setIsOpen(bool $isOpen): void
    {
        $this->isOpen = true;
    }

}