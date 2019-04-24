<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190424114242 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        $this->addSql('INSERT INTO work_shift (name, description) VALUES ("8:00-17:00","iprasta pamaina")');
        $this->addSql('INSERT INTO work_shift (name, description) VALUES ("6:00-15:00","rytine pamaina")');
        $this->addSql('INSERT INTO work_shift (name, description) VALUES ("15:00-23:00","popietine pamaina")');
        $this->addSql('INSERT INTO work_shift (name, description) VALUES ("6:00-18:00","12 val rytine pamaina")');
        $this->addSql('INSERT INTO work_shift (name, description) VALUES ("18:00-6:00","12 val naktine pamaina")');
        $this->addSql('INSERT INTO work_shift (name, description) VALUES ("9:00-18:00","")');
        $this->addSql('INSERT INTO work_shift (name, description) VALUES ("10:00-18:00","")');
        $this->addSql('INSERT INTO work_shift (name, description) VALUES ("Darbas pamainomis: rytine ir popietine","")');
        $this->addSql('INSERT INTO work_shift (name, description) VALUES ("Slenkantis grafikas","")');

    }

    public function down(Schema $schema) : void
    {

    }
}
