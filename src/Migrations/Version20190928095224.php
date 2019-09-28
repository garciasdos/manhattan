<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190928095224 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE event DROP CONSTRAINT fk_3bae0aa712469de2');
        $this->addSql('DROP INDEX idx_3bae0aa712469de2');
        $this->addSql('ALTER TABLE event ADD started_at DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE event ADD ended_at DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE event DROP category_id');
        $this->addSql('ALTER TABLE event DROP start_date');
        $this->addSql('ALTER TABLE event DROP end_date');
        $this->addSql('ALTER TABLE event ALTER title TYPE VARCHAR(70)');
        $this->addSql('ALTER TABLE event ALTER subtitle SET NOT NULL');
        $this->addSql('ALTER TABLE event ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE event ALTER created_at DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN event.started_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN event.ended_at IS \'(DC2Type:date_immutable)\'');
        $this->addSql('COMMENT ON COLUMN event.created_at IS NULL');
        $this->addSql('ALTER TABLE event_subcategory ADD category_id UUID NOT NULL');
        $this->addSql('COMMENT ON COLUMN event_subcategory.category_id IS \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE event_subcategory ADD CONSTRAINT FK_A65577C812469DE2 FOREIGN KEY (category_id) REFERENCES event_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_A65577C812469DE2 ON event_subcategory (category_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'postgresql', 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE event ADD category_id UUID DEFAULT NULL');
        $this->addSql('ALTER TABLE event ADD start_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE event ADD end_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE event DROP started_at');
        $this->addSql('ALTER TABLE event DROP ended_at');
        $this->addSql('ALTER TABLE event ALTER title TYPE VARCHAR(255)');
        $this->addSql('ALTER TABLE event ALTER subtitle DROP NOT NULL');
        $this->addSql('ALTER TABLE event ALTER created_at TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE event ALTER created_at DROP DEFAULT');
        $this->addSql('COMMENT ON COLUMN event.category_id IS \'(DC2Type:uuid)\'');
        $this->addSql('COMMENT ON COLUMN event.start_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN event.end_date IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('COMMENT ON COLUMN event.created_at IS \'(DC2Type:datetime_immutable)\'');
        $this->addSql('ALTER TABLE event ADD CONSTRAINT fk_3bae0aa712469de2 FOREIGN KEY (category_id) REFERENCES event_category (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_3bae0aa712469de2 ON event (category_id)');
        $this->addSql('ALTER TABLE event_subcategory DROP CONSTRAINT FK_A65577C812469DE2');
        $this->addSql('DROP INDEX IDX_A65577C812469DE2');
        $this->addSql('ALTER TABLE event_subcategory DROP category_id');
    }
}
