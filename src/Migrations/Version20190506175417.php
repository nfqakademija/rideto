<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190506175417 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, age INT DEFAULT NULL, description VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('INSERT INTO user (name, age, description, role)
                              VALUES
                               ("Jonas", 23, "Dirbu nuo 8:00 iki 17:00", "driver"), 
                               ("Genute", 56, "Dirbu nuo 10:00 iki 18:00", "client"), 
                               ("Monika", 19, "8:00 - 17:00", "client"), 
                               ("Vincas", 45, "Dirbu nuo 6:00 iki 15:00", "client"), 
                               ("Jurgis", 25, "Dirbu nuo 22:00 iki 6:00", "client"), 
                               ("Stasys", 22, "Dirbu nuo 6:00 iki 18:00", "client"), 
                               ("Petras", 37, "Dirbu nuo 8:00 iki 18:00", "driver"), 
                               ("Onute", 21, "Dirbu nuo 10:00 iki 22:00", "client"), 
                               ("Milda", 76, "Keturias dirbu, keturias nedirbu, nuo 6:00 iki 18:00", "client"), 
                               ("Algirdas", 50, "Kartais dirbu kartais nedirbu", "client"), 
                               ("Kazys", 30, "Dirbu nuo 10:00 iki 18:00", "driver")
                      ');

    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE user');
    }
}
