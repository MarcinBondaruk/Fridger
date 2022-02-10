<?php
declare(strict_types=1);

namespace App\Core\Component\CookingBook\Application\Write\Command\CreateTagCommand;

use App\Core\Component\CookingBook\Application\Write\Validation\TagValidationService;
use App\Core\Component\CookingBook\Domain\Entity\Tag\Tag;
use App\Core\Component\CookingBook\Domain\Repository\ITagRepository;
use App\Core\Port\Persistence\Exception\EmptyQueryResultException;
use App\Core\SharedKernel\Exception\AppRuntimeException;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class CreateTagCommandHandler
{
    public function __construct(
        private ITagRepository $tagRepository,
        private TagValidationService $validator
    ) {}

    public function __invoke(CreateTagCommand $command): void
    {
        $this->validateTagData($command->value());
        $this->tagRepository->add(new Tag($command->value()));
    }

    private function validateTagData(string $value): void
    {
        if ($this->tagExists($value)) {
            throw new AppRuntimeException("Tag {$value} already exists.");
        }

        $this->validator->validateValue($value);
    }

    private function tagExists(string $value): bool
    {
        try {
            $this->tagRepository->findOneByValue($value);
            return true;
        } catch(EmptyQueryResultException $e) {
            return false;
        }
    }
}
