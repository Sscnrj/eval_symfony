<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240105130701 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE lieu (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE releve ADD lieu_id INT NOT NULL, DROP lieu, CHANGE releve_brut releve_brut VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE releve ADD CONSTRAINT FK_DDABFF836AB213CC FOREIGN KEY (lieu_id) REFERENCES lieu (id)');
        $this->addSql('CREATE INDEX IDX_DDABFF836AB213CC ON releve (lieu_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE releve DROP FOREIGN KEY FK_DDABFF836AB213CC');
        $this->addSql('DROP TABLE lieu');
        $this->addSql('DROP INDEX IDX_DDABFF836AB213CC ON releve');
        $this->addSql('ALTER TABLE releve ADD lieu VARCHAR(255) NOT NULL, DROP lieu_id, CHANGE releve_brut releve_brut VARCHAR(20) NOT NULL');
    }
}
