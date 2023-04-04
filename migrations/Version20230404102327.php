<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230404102327 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie ADD genre_id INT NOT NULL, ADD top_actor_id INT NOT NULL');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26F4296D31F FOREIGN KEY (genre_id) REFERENCES genre (id)');
        $this->addSql('ALTER TABLE movie ADD CONSTRAINT FK_1D5EF26FB1EF3806 FOREIGN KEY (top_actor_id) REFERENCES top_actor (id)');
        $this->addSql('CREATE INDEX IDX_1D5EF26F4296D31F ON movie (genre_id)');
        $this->addSql('CREATE INDEX IDX_1D5EF26FB1EF3806 ON movie (top_actor_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26F4296D31F');
        $this->addSql('ALTER TABLE movie DROP FOREIGN KEY FK_1D5EF26FB1EF3806');
        $this->addSql('DROP INDEX IDX_1D5EF26F4296D31F ON movie');
        $this->addSql('DROP INDEX IDX_1D5EF26FB1EF3806 ON movie');
        $this->addSql('ALTER TABLE movie DROP genre_id, DROP top_actor_id');
    }
}
