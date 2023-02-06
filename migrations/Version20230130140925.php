<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230130140925 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking ADD bookings_id INT DEFAULT NULL, ADD day DATE DEFAULT NULL, ADD guest_number INT DEFAULT NULL, ADD email VARCHAR(255) DEFAULT NULL, DROP surname, DROP date, DROP guests_number, CHANGE allergy allergy VARCHAR(255) NOT NULL, CHANGE hours hours TIME DEFAULT NULL');
        $this->addSql('ALTER TABLE booking ADD CONSTRAINT FK_E00CEDDEAAC0EC61 FOREIGN KEY (bookings_id) REFERENCES user (id)');
        $this->addSql('CREATE INDEX IDX_E00CEDDEAAC0EC61 ON booking (bookings_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE booking DROP FOREIGN KEY FK_E00CEDDEAAC0EC61');
        $this->addSql('DROP INDEX IDX_E00CEDDEAAC0EC61 ON booking');
        $this->addSql('ALTER TABLE booking ADD surname VARCHAR(50) NOT NULL, ADD date DATE NOT NULL, ADD guests_number INT NOT NULL, DROP bookings_id, DROP day, DROP guest_number, DROP email, CHANGE hours hours VARCHAR(255) NOT NULL, CHANGE allergy allergy VARCHAR(255) DEFAULT NULL');
    }
}
