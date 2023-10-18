<?php

namespace Filament\Support\Concerns;

use Closure;
use Filament\Support\Enums\Alignment;

trait HasAlignment
{
    protected Alignment | string | Closure | null $alignment = null;

    public function alignment(Alignment | string | Closure | null $alignment): static
    {
        $this->alignment = $alignment;

        return $this;
    }

    public function alignStart(bool | Closure $condition = true): static
    {
        return $this->alignment(static fn (): ?Alignment => value($condition) ? Alignment::Start : null);
    }

    public function alignCenter(bool | Closure $condition = true): static
    {
        return $this->alignment(static fn (): ?Alignment => value($condition) ? Alignment::Center : null);
    }

    public function alignEnd(bool | Closure $condition = true): static
    {
        return $this->alignment(static fn (): ?Alignment => value($condition) ? Alignment::End : null);
    }

    public function alignJustify(bool | Closure $condition = true): static
    {
        return $this->alignment(static fn (): ?Alignment => value($condition) ? Alignment::Justify : null);
    }

    public function alignLeft(bool | Closure $condition = true): static
    {
        return $this->alignment(static fn (): ?Alignment => value($condition) ? Alignment::Left : null);
    }

    public function alignRight(bool | Closure $condition = true): static
    {
        return $this->alignment(static fn (): ?Alignment => value($condition) ? Alignment::Right : null);
    }

    public function getAlignment(): Alignment | string | null
    {
        return $this->evaluate($this->alignment);
    }
}
