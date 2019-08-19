<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190817202442 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE event (id INT AUTO_INCREMENT NOT NULL, section_id INT NOT NULL, name_fr VARCHAR(255) NOT NULL, name_en VARCHAR(255) NOT NULL, description_fr LONGTEXT NOT NULL, description_en LONGTEXT NOT NULL, date DATETIME NOT NULL, INDEX IDX_3BAE0AA7D823E37A (section_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bar_product (id INT AUTO_INCREMENT NOT NULL, type_id INT NOT NULL, name_fr VARCHAR(255) NOT NULL, name_en VARCHAR(255) NOT NULL, description_fr VARCHAR(255) DEFAULT NULL, description_en VARCHAR(255) DEFAULT NULL, price DOUBLE PRECISION NOT NULL, INDEX IDX_96D0D8B5C54C8C93 (type_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE bar_product_type (id INT AUTO_INCREMENT NOT NULL, name_fr VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE sport_planning (id INT AUTO_INCREMENT NOT NULL, sport_id INT DEFAULT NULL, start TIME NOT NULL, end TIME NOT NULL, color VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E23B404CAC78BCF8 (sport_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA7D823E37A FOREIGN KEY (section_id) REFERENCES section (id)');
        $this->addSql('ALTER TABLE bar_product ADD CONSTRAINT FK_96D0D8B5C54C8C93 FOREIGN KEY (type_id) REFERENCES bar_product_type (id)');
        $this->addSql('ALTER TABLE sport_planning ADD CONSTRAINT FK_E23B404CAC78BCF8 FOREIGN KEY (sport_id) REFERENCES sport (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE bar_product DROP FOREIGN KEY FK_96D0D8B5C54C8C93');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE bar_product');
        $this->addSql('DROP TABLE bar_product_type');
        $this->addSql('DROP TABLE sport_planning');
    }
}
