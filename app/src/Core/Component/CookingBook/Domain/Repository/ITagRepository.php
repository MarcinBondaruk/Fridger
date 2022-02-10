<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Domain\Repository;

use App\Core\Component\CookingBook\Domain\Entity\Tag\Tag;
use App\Core\Port\Persistence\Exception\EmptyQueryResultException;

interface ITagRepository
{
    public function add(Tag $tag): void;

    /**
     * @param string $value
     * @return Tag
     *
     * @throws EmptyQueryResultException
     */
    public function findOneByValue(string $value): Tag;
}