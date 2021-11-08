<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20211103134324 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create table user_photo';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE user_photo_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE user_photo (id INT NOT NULL, user_entity_id INT NOT NULL, name VARCHAR(255) NOT NULL, size INT NOT NULL, original_name VARCHAR(255) NOT NULL, mime_type VARCHAR(255) NOT NULL, type VARCHAR(255) DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_F6757F4081C5F0B9 ON user_photo (user_entity_id)');
        $this->addSql('COMMENT ON COLUMN user_photo.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE user_photo ADD CONSTRAINT FK_F6757F4081C5F0B9 FOREIGN KEY (user_entity_id) REFERENCES "user" (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE user_photo_id_seq CASCADE');
        $this->addSql('DROP TABLE user_photo');
    }
}
