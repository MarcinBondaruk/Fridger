<?php
declare(strict_types=1);

namespace App\Infrastructure\Persistence\Doctrine\Repository;

use App\Core\Component\CookingBook\Domain\Entity\Ingredient\Ingredient;
use App\Core\Component\CookingBook\Domain\Repository\IIngredientRepository;
use App\Core\Port\Persistence\Exception\EmptyQueryResultException;
use Doctrine\ORM\EntityManagerInterface;

class DoctrineIngredientRepository implements IIngredientRepository
{
    public function __construct(
        private EntityManagerInterface $entityManager
    ) {}

    public function add(Ingredient $ingredient): void
    {
        $this->entityManager->persist($ingredient);
    }

    public function findOneByValue(string $value): Ingredient
    {
        $result = $this->entityManager->getRepository(Ingredient::class)
            ->findOneBy(['value' => $value]);

        if (empty($result)) {
            throw new EmptyQueryResultException("No tag {$value} found.");
        }

        return $result;
    }
}
