<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230813213118 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE photos_album_photos_image DROP FOREIGN KEY FK_3D0748BE4BFAD572');
        $this->addSql('ALTER TABLE photos_album_photos_image DROP FOREIGN KEY FK_3D0748BE67685BD0');
        $this->addSql('DROP TABLE photos_album_photos_image');
        $this->addSql('ALTER TABLE photos_image ADD album_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE photos_image ADD CONSTRAINT FK_12A7CC031137ABCF FOREIGN KEY (album_id) REFERENCES photos_album (id)');
        $this->addSql('CREATE INDEX IDX_12A7CC031137ABCF ON photos_image (album_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE photos_album_photos_image (photos_album_id INT NOT NULL, photos_image_id INT NOT NULL, INDEX IDX_3D0748BE4BFAD572 (photos_image_id), INDEX IDX_3D0748BE67685BD0 (photos_album_id), PRIMARY KEY(photos_album_id, photos_image_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE photos_album_photos_image ADD CONSTRAINT FK_3D0748BE4BFAD572 FOREIGN KEY (photos_image_id) REFERENCES photos_image (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photos_album_photos_image ADD CONSTRAINT FK_3D0748BE67685BD0 FOREIGN KEY (photos_album_id) REFERENCES photos_album (id) ON UPDATE NO ACTION ON DELETE CASCADE');
        $this->addSql('ALTER TABLE photos_image DROP FOREIGN KEY FK_12A7CC031137ABCF');
        $this->addSql('DROP INDEX IDX_12A7CC031137ABCF ON photos_image');
        $this->addSql('ALTER TABLE photos_image DROP album_id');
    }
}
