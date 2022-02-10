<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Application\Write\Command\CreateIngredientCommand;

use App\Core\Component\CookingBook\Application\Write\Validation\IngredientValidationService;
use App\Core\Component\CookingBook\Domain\Entity\Ingredient\Ingredient;
use App\Core\Component\CookingBook\Domain\Repository\IIngredientRepository;
use App\Core\Port\Persistence\Exception\EmptyQueryResultException;
use App\Core\SharedKernel\Exception\AppRuntimeException;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CreateIngredientCommandHandler
{
    public function __construct(
        private IIngredientRepository $ingredientRepository,
        private IngredientValidationService $validator
    ) {}

    /**
     * @throws AppRuntimeException
     */
    public function __invoke(CreateIngredientCommand $command): void
    {
        $this->validateIngredientData($command->value());
        $this->ingredientRepository->add(new Ingredient($command->value()));
    }

    private function validateIngredientData(string $value): void
    {
        if ($this->ingredientExists($value)) {
            throw new AppRuntimeException("Ingredient {$value} already exists.");
        }

        $this->validator->validateValue($value);
    }

    private function ingredientExists(string $value): bool
    {
        try {
            $this->ingredientRepository->findOneByValue($value);
            return true;
        } catch (EmptyQueryResultException $e) {
            return false;
        }
    }
}
