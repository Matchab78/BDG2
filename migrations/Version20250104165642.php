<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250104165642 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Update contact table with datetime_immutable';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact MODIFY created_at DATETIME COMMENT \'(DC2Type:datetime_immutable)\' NOT NULL');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contact MODIFY created_at DATETIME NOT NULL');
    }
}
