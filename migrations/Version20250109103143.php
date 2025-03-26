<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250109103143 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE annonce');
        $this->addSql('DROP TABLE finition');
        $this->addSql('DROP TABLE modele');
        $this->addSql('DROP TABLE pack_option');
        $this->addSql('ALTER TABLE evenement ADD createur_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE evenement ADD CONSTRAINT FK_B26681E73A201E5 FOREIGN KEY (createur_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_B26681E73A201E5 ON evenement (createur_id)');
        $this->addSql('ALTER TABLE user ADD is_verified TINYINT(1) NOT NULL');
        $this->addSql('ALTER TABLE voitures ADD marque_id INT DEFAULT NULL, ADD couleur_id INT DEFAULT NULL, ADD cat_voitures VARCHAR(255) DEFAULT NULL, DROP image2, DROP image3, DROP image4');
        $this->addSql('ALTER TABLE voitures ADD CONSTRAINT FK_8B58301B4827B9B2 FOREIGN KEY (marque_id) REFERENCES marque (id)');
        $this->addSql('ALTER TABLE voitures ADD CONSTRAINT FK_8B58301BC31BA576 FOREIGN KEY (couleur_id) REFERENCES couleur (id)');
        $this->addSql('CREATE INDEX IDX_8B58301B4827B9B2 ON voitures (marque_id)');
        $this->addSql('CREATE INDEX IDX_8B58301BC31BA576 ON voitures (couleur_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE annonce (id INT AUTO_INCREMENT NOT NULL, titre VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, descriptif VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE finition (id INT AUTO_INCREMENT NOT NULL, nom_finition VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE modele (id INT AUTO_INCREMENT NOT NULL, nom_modele VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('CREATE TABLE pack_option (id INT AUTO_INCREMENT NOT NULL, finition VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, carplay VARCHAR(255) CHARACTER SET utf8mb4 NOT NULL COLLATE `utf8mb4_unicode_ci`, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE evenement DROP FOREIGN KEY FK_B26681E73A201E5');
        $this->addSql('DROP INDEX IDX_B26681E73A201E5 ON evenement');
        $this->addSql('ALTER TABLE evenement DROP createur_id');
        $this->addSql('ALTER TABLE user DROP is_verified');
        $this->addSql('ALTER TABLE voitures DROP FOREIGN KEY FK_8B58301B4827B9B2');
        $this->addSql('ALTER TABLE voitures DROP FOREIGN KEY FK_8B58301BC31BA576');
        $this->addSql('DROP INDEX IDX_8B58301B4827B9B2 ON voitures');
        $this->addSql('DROP INDEX IDX_8B58301BC31BA576 ON voitures');
        $this->addSql('ALTER TABLE voitures ADD image3 VARCHAR(255) DEFAULT NULL, ADD image4 VARCHAR(255) DEFAULT NULL, DROP marque_id, DROP couleur_id, CHANGE cat_voitures image2 VARCHAR(255) DEFAULT NULL');
    }
}
