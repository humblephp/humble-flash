<?php

namespace Humble\Flash;

class Flash
{
    const STORAGE_KEY = 'flash';

    private $storage;
    private $previous;
    private $next;

    public function __construct(\ArrayAccess $storage)
    {
        $this->storage = $storage;
        $this->previous = $this->storage->offsetGet(self::STORAGE_KEY) ?? array();
        $this->next = $this->previous;
    }

    public function hasMessages(): bool
    {
        return !empty($this->previous);
    }

    public function getMessages(): array
    {
        $this->next = array_diff_key($this->next, $this->previous);
        $this->storage->offsetSet(self::STORAGE_KEY, $this->next);

        return $this->previous;
    }

    public function addMessage(string $messageType, $messageBody)
    {
        $this->next[] = [
            'type' => $messageType,
            'body' => $messageBody,
        ];

        $this->storage->offsetSet(self::STORAGE_KEY, $this->next);
    }
}
