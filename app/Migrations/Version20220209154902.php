<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220209154902 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Init database';
    }

    public function up(Schema $schema): void
    {
        $this->addSql("CREATE TABLE IF NOT EXISTS users (id SERIAL PRIMARY KEY, uuid CHAR(36) NOT NULL UNIQUE, username VARCHAR(30) NOT NULL UNIQUE, password CHAR(60) NOT NULL, email VARCHAR(255) NOT NULL UNIQUE, roles JSON NOT NULL)");
    }

    public function down(Schema $schema): void
    {
    }
}
