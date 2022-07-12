<?php
declare(strict_types=1);

namespace App\Tests\unit\Core\Component\Pantry\Domain\ValueObject;

use App\Core\Component\Pantry\Domain\ValueObject\NutritionalValues;
use Assert\AssertionFailedException;
use PHPUnit\Framework\TestCase;

class NutritionalValuesTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();
    }

    /**
     * @return void
     * @dataProvider validInputProvider
     */
    public function testShouldCrateNutritionalVO($prot, $carbs, $fats): void
    {
        // WHEN
        $nutritionalValues = NutritionalValues::create($prot, $carbs, $fats);

        // THEN
        $this->assertEquals($nutritionalValues->proteins, $prot);
        $this->assertEquals($nutritionalValues->carbohydrates, $carbs);
        $this->assertEquals($nutritionalValues->fats, $fats);
    }

    /**
     * @param $prot
     * @param $carbs
     * @param $fats
     * @return void
     * @dataProvider invalidInputProvider
     */
    public function testShouldFailWhenInvalidAmountsAreProvided($prot, $carbs, $fats): void
    {
        $this->expectException(AssertionFailedException::class);
        $nutritionalValues = NutritionalValues::create($prot, $carbs, $fats);
    }

    public function invalidInputProvider(): array
    {
        return [
            'invalid proteins amount' => [-1, 1.2, 20],
            'invalid carbohydrates amount' => [1.5, -2.2, 3],
            'invalid fats amount' => [1.5, 2.2, -3],
        ];
    }

    public function validInputProvider(): array
    {
        return [
            'all zero input' => [0, 0, 0],
            'valid data' => [1.1, 2, 1.7],
        ];
    }
}
