<?php
declare(strict_types=1);

namespace App\Core\Component\Pantry\Domain\Entity;

use App\Core\Component\Pantry\Domain\ValueObject\ProductName;
use App\Core\SharedKernel\Domain\Enum\Unit;
use App\Core\SharedKernel\Domain\ValueObject\ProductId;

final class Product
{
    public function __construct(
        private readonly ProductId $productId,
        private ProductName $productName,
        private readonly Unit $unit
    ) {
    }
}
