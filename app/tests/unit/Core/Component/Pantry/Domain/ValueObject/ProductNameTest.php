<?php
declare(strict_types=1);

namespace App\Tests\unit\Core\Component\Pantry\Domain\ValueObject;

use App\Core\Component\Pantry\Domain\ValueObject\ProductName;
use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;

class ProductNameTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateRecipeName(): void
    {
        // GIVEN
        $name = 'ligawa';

        // WHEN
        $productName = ProductName::create($name);

        // THEN
        $this->assertEquals($name, $productName->value);
    }

    /**
     * @param string $input
     * @return void
     * @dataProvider invalidInputProvider
     */
    public function testCreateRecipeNameShouldThrowException(string $input): void
    {
        $this->expectException(AssertionFailedException::class);
        $productName = ProductName::create($input);
    }

    public function invalidInputProvider(): array
    {
        return [
            'empty string' => [''],
            'recipe name too short' => ['as'],
            'recipe name too long' => ['fDhLP8pOsFgpNe4TIyZyG77wSlzY0kCSQ9G0qFiL6M0vpmS2ftKyRduz9aKQjKJRuauYu'],
        ];
    }
}
