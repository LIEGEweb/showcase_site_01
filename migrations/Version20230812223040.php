<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230812223040 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photos_album ADD is_home TINYINT(1) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_EE02A61F989D9B62 ON photos_album (slug)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX UNIQ_EE02A61F989D9B62 ON photos_album');
        $this->addSql('ALTER TABLE photos_album DROP is_home');
    }
}
