<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20220617192114 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE region (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(30) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE gite ADD region_id INT NOT NULL, DROP region');
        $this->addSql('ALTER TABLE gite ADD CONSTRAINT FK_B638C92C98260155 FOREIGN KEY (region_id) REFERENCES region (id)');
        $this->addSql('CREATE INDEX IDX_B638C92C98260155 ON gite (region_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE gite DROP FOREIGN KEY FK_B638C92C98260155');
        $this->addSql('DROP TABLE region');
        $this->addSql('DROP INDEX IDX_B638C92C98260155 ON gite');
        $this->addSql('ALTER TABLE gite ADD region VARCHAR(30) NOT NULL, DROP region_id');
    }
}
