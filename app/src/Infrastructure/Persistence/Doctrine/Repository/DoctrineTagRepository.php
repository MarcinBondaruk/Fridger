<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Core\Component\CookingBook\Domain\Entity\Tag\Tag;
use App\Core\Component\CookingBook\Domain\Repository\ITagRepository;
use App\Core\Port\Persistence\Exception\EmptyQueryResultException;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineTagRepository implements ITagRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    public function add(Tag $tag): void
    {
        $this->entityManager->persist($tag);
    }

    /**
     * @inheritDoc
     */
    public function findOneByValue(string $value): Tag
    {
        /** @var Tag $result */
        $result = $this->entityManager->getRepository(Tag::class)
            ->findOneBy(['value' => $value]);

        if (empty($result)) {
            throw new EmptyQueryResultException("No tag {$value} found.");
        }

        return $result;
    }
}
