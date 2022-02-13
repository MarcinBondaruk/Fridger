<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Application\Write\Command\CreateRecipeCommand;

use App\Core\Component\CookingBook\Application\Write\Validation\RecipeValidationService;
use App\Core\Component\CookingBook\Domain\Entity\Recipe;
use App\Core\Component\CookingBook\Domain\Repository\IIngredientRepository;
use App\Core\Component\CookingBook\Domain\Repository\IRecipeRepository;
use App\Core\Port\IdentityProvider\IdentityProvider;
use App\Core\SharedKernel\Exception\AppRuntimeException;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CreateRecipeCommandHandler
{
    public function __construct(
        private IdentityProvider $identityProvider,
        private IIngredientRepository $ingredientRepository,
        private IRecipeRepository $recipeRepository,
        private RecipeValidationService $validator
    ) {}

    public function __invoke(CreateRecipeCommand $command): void
    {
        $this->validateRecipeData(
            $command->title(),
            $command->description(),
            $command->ingredientIds()
        );

        $this->recipeRepository->add(new Recipe(
            $this->identityProvider->generate(),
            $command->title(),
            $command->description(),
            $this->ingredientRepository->findManyByIds($command->ingredientIds())
        ));
    }

    private function validateRecipeData(string $title, string $description, array $ingredientIds): void
    {
        $this->validator->validateTitle($title);
        $this->validator->validateDescription($description);
        $this->validator->validateIngredients($ingredientIds);

        if (!$this->doesAllExist($ingredientIds)) {
            throw new AppRuntimeException("There are ingredients that do not exist on a list. Add them first.");
        }
    }

    private function doesAllExist(array $ingredientIds): bool
    {
        $ingredients = $this->ingredientRepository->findManyByIds($ingredientIds);
        return count($ingredientIds) === count($ingredients);
    }
}
