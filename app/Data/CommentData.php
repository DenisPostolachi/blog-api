<?php

declare(strict_types=1);

namespace App\Data;

final class CommentData
{
    private string $text;

    public function getText(): string
    {
        return $this->text;
    }

    public function setText(string $text): self
    {
        $this->text = $text;

        return $this;
    }
}
