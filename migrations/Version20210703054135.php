<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210703054135 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE tickets (id INT AUTO_INCREMENT NOT NULL, user_id INT DEFAULT NULL, status SMALLINT NOT NULL, tag INT NOT NULL, end DATETIME NOT NULL, INDEX IDX_54469DF4A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE tickets ADD CONSTRAINT FK_54469DF4A76ED395 FOREIGN KEY (user_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE projects ADD tickets_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE projects ADD CONSTRAINT FK_5C93B3A48FDC0E9A FOREIGN KEY (tickets_id) REFERENCES tickets (id)');
        $this->addSql('CREATE INDEX IDX_5C93B3A48FDC0E9A ON projects (tickets_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE projects DROP FOREIGN KEY FK_5C93B3A48FDC0E9A');
        $this->addSql('DROP TABLE tickets');
        $this->addSql('DROP INDEX IDX_5C93B3A48FDC0E9A ON projects');
        $this->addSql('ALTER TABLE projects DROP tickets_id');
    }
}
