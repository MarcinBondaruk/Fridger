<?php
declare(strict_types=1);

namespace App\Tests\unit\Core\SharedKernel\Domain\ValueObject;

use App\Core\SharedKernel\Domain\ValueObject\ProductId;
use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;
use Ramsey\Uuid\Uuid;

class ProductIdTest extends TestCase
{
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testCreateRecipeId(): void
    {
        // GIVEN
        $uuid = (string) Uuid::uuid4();

        // WHEN
        $productId = ProductId::create($uuid);

        // THEN
        $this->assertEquals($uuid, $productId->value);
    }

    /**
     * @param mixed $input
     * @return void
     * @dataProvider invalidInputProvider
     */
    public function testCreateRecipeIdShouldThrowAnException(mixed $input): void
    {
        $this->expectException(AssertionFailedException::class);
        $productId = ProductId::create($input);
    }

    public function testIsEqualShouldReturnTrue(): void
    {
        // GIVEN
        $uuid = (string) Uuid::uuid4();
        $productId = ProductId::create($uuid);

        // THEN
        $this->assertTrue($productId->isEqual(ProductId::create($uuid)));
    }

    public function testIsEqualShouldReturnFalse(): void
    {
        // GIVEN
        $uuid = (string) Uuid::uuid4();
        $anotherId = (string) Uuid::uuid4();

        $productId = ProductId::create($uuid);

        // THEN
        $this->assertFalse($productId->isEqual(ProductId::create($anotherId)));
    }

    public function invalidInputProvider(): array
    {
        return [
            'empty string' => [''],
            'empty string space' => [' '],
            '36 chars string' => ['45c401aa52367z4fdaXa017A1d9e1021fa37']
        ];
    }
}
