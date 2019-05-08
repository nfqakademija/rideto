<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190508143444 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');
        $this->addSql('ALTER TABLE user ADD route_description VARCHAR(255) NOT NULL, CHANGE age age INT DEFAULT NULL');
        $this->addSql('INSERT INTO user (name, age, description, route_description, role)
                              VALUES
                               ("Jonas", 23, "Dirbu nuo 8:00 iki 17:00", "Važiuoju iš Pilėnų g. į Brastos g.", "client"), 
                               ("Genute", 56, "Dirbu nuo 10:00 iki 18:00","Iš Raudondvario į Kauno pilį","client"), 
                               ("Monika", 19, "8:00 - 17:00","Daukšos g. - Kauno oro uostas", "client"), 
                               ("Vincas", 45, "Dirbu nuo 6:00 iki 15:00","Iš Raudondvario į Daukšos g.", "client"), 
                               ("Jurgis", 25, "Dirbu nuo 22:00 iki 6:00","Vilkija - Daukšos g. galiu sustoti paimti Raudondvaryje", "client"), 
                               ("Stasys", 22, "Dirbu nuo 6:00 iki 18:00","Birželio 23 g. - Elektrėnų g., Kaunas", "client"), 
                               ("Petras", 37, "Dirbu nuo 8:00 iki 18:00","Garliava - Ringaudai","client"), 
                               ("Onute", 21, "Dirbu nuo 10:00 iki 22:00","Marvele - Savanorių pr. 350","client"), 
                               ("Milda", 76, "Keturias dirbu, keturias nedirbu, nuo 6:00 iki 18:00","Šančiai - Mūravos sankryža","client"), 
                               ("Algirdas", 50, "Kartais dirbu kartais nedirbu","Giraitė - Jonavos gatvė", "client"), 
                               ("Kazys", 30, "Dirbu nuo 10:00 iki 18:00","Kriaušių gatvė - Marvelė","client")
                      ');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP route_description, CHANGE age age INT DEFAULT NULL');
    }
}
