<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250104180100 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Recreate voitures table';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE voitures (
            id INT AUTO_INCREMENT NOT NULL,
            prix_v INT DEFAULT NULL,
            stock INT NOT NULL,
            description VARCHAR(255) DEFAULT NULL,
            description_v TEXT DEFAULT NULL,
            vitesse INT DEFAULT NULL,
            acceleration INT DEFAULT NULL,
            image VARCHAR(255) DEFAULT NULL,
            annee INT DEFAULT NULL,
            chevaux VARCHAR(255) DEFAULT NULL,
            moteur VARCHAR(255) NOT NULL,
            carburant VARCHAR(255) DEFAULT NULL,
            boite_auto VARCHAR(255) DEFAULT NULL,
            conso VARCHAR(255) DEFAULT NULL,
            co2 VARCHAR(255) DEFAULT NULL,
            PRIMARY KEY(id)
        ) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE voitures');
    }
}
