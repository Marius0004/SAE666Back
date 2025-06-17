<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250617094958 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            CREATE TABLE signalements (id INT AUTO_INCREMENT NOT NULL, user_id_id INT NOT NULL, titre VARCHAR(255) NOT NULL, tags VARCHAR(255) NOT NULL, etat VARCHAR(255) NOT NULL, description LONGTEXT DEFAULT NULL, latitude VARCHAR(255) DEFAULT NULL, longitude VARCHAR(255) DEFAULT NULL, INDEX IDX_120AE279D86650F (user_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB
        SQL);
        $this->addSql(<<<'SQL'
            ALTER TABLE signalements ADD CONSTRAINT FK_120AE279D86650F FOREIGN KEY (user_id_id) REFERENCES user (id)
        SQL);
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql(<<<'SQL'
            ALTER TABLE signalements DROP FOREIGN KEY FK_120AE279D86650F
        SQL);
        $this->addSql(<<<'SQL'
            DROP TABLE signalements
        SQL);
    }
}
