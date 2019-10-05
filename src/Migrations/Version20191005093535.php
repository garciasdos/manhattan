<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20191005093535 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE TABLE event_photo (id UUID NOT NULL, event_id UUID NOT NULL, image VARCHAR(255) NOT NULL, title VARCHAR(200) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_55AC353471F7E88B ON event_photo (event_id)');
        $this->addSql('COMMENT ON COLUMN event_photo.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN event_photo.event_id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE event (id UUID NOT NULL, subcategory_id UUID DEFAULT NULL, title VARCHAR(70) NOT NULL, subtitle VARCHAR(255) NOT NULL, description VARCHAR(255) DEFAULT NULL, started_at DATE DEFAULT NULL, ended_at DATE DEFAULT NULL, updated_at TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, created_at TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_3BAE0AA75DC6FE57 ON event (subcategory_id)');
        $this->addSql('COMMENT ON COLUMN event.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN event.subcategory_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN event.started_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN event.ended_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('CREATE TABLE event_category (id UUID NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('COMMENT ON COLUMN event_category.id IS \'(DC2Type:uuid)\'');
        $this->addSql('CREATE TABLE event_subcategory (id UUID NOT NULL, category_id UUID NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_A65577C812469DE2 ON event_subcategory (category_id)');
        $this->addSql('COMMENT ON COLUMN event_subcategory.id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN event_subcategory.category_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE event_photo ADD CONSTRAINT FK_55AC353471F7E88B FOREIGN KEY (event_id) REFERENCES event (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT FK_3BAE0AA75DC6FE57 FOREIGN KEY (subcategory_id) REFERENCES event_subcategory (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE event_subcategory ADD CONSTRAINT FK_A65577C812469DE2 FOREIGN KEY (category_id) REFERENCES event_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE event_photo DROP CONSTRAINT FK_55AC353471F7E88B');
        $this->addSql('ALTER TABLE event_subcategory DROP CONSTRAINT FK_A65577C812469DE2');
        $this->addSql('ALTER TABLE event DROP CONSTRAINT FK_3BAE0AA75DC6FE57');
        $this->addSql('DROP TABLE event_photo');
        $this->addSql('DROP TABLE event');
        $this->addSql('DROP TABLE event_category');
        $this->addSql('DROP TABLE event_subcategory');
    }
}
