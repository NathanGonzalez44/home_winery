<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210219100426 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE cave (id INT AUTO_INCREMENT NOT NULL, owner_id INT NOT NULL, INDEX IDX_57F6D417E3C61F9 (owner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE wine (id INT AUTO_INCREMENT NOT NULL, cave_id INT NOT NULL, name VARCHAR(100) NOT NULL, millesime VARCHAR(5) NOT NULL, date_mise_en_cave DATE NOT NULL, color VARCHAR(10) NOT NULL, potentiel_de_garde DATE NOT NULL, INDEX IDX_560C64687F05B85 (cave_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cave ADD CONSTRAINT FK_57F6D417E3C61F9 FOREIGN KEY (owner_id) REFERENCES `user` (id)');
        $this->addSql('ALTER TABLE wine ADD CONSTRAINT FK_560C64687F05B85 FOREIGN KEY (cave_id) REFERENCES cave (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE wine DROP FOREIGN KEY FK_560C64687F05B85');
        $this->addSql('ALTER TABLE cave DROP FOREIGN KEY FK_57F6D417E3C61F9');
        $this->addSql('DROP TABLE cave');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE wine');
    }
}
