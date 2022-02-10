<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Domain\Repository;

use App\Core\Component\CookingBook\Domain\Entity\Tag\Tag;

interface ITagRepository
{
    public function add(Tag $tag): void;
    public function findOneByValue(string $value): Tag;
}
