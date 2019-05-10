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

        $this->addSql('INSERT INTO route (user_id, home_location, work_location)
                              VALUES
                               (1, "EiVQaWzEl27FsyBnYXR2xJcsIEFrYWRlbWlqYSwgTGl0aHVhbmlhIi4qLAoUChIJN3XNir8h50YRtzS026csNBoSFAoSCVEqEHrAIedGEa8GikwJD_YZ", "ChIJ5RuEQgEi50YR4OfyAOJqryU"), 
                               (2, "EixWaWVueWLEl3MgZ2F0dsSXIDMyLCBSYXVkb25kdmFyaXMsIExpdGh1YW5pYSIwEi4KFAoSCfMldP_nH-dGEfDGQbbnBc6PECAqFAoSCdmiJHroH-dGEV6EXZMM-zVf", "ChIJpY59qwgi50YRPYnjmtKlieg"), 
                               (3, "ChIJAQAkzg8i50YR0FSNJdHs2Vg", "ChIJGd-ishwa50YR3_J0NtUhwvY"), 
                               (4, "EipQdcWheW5vIGdhdHbElyAxMiwgUmF1ZG9uZHZhcmlzLCBMaXRodWFuaWEiMBIuChQKEgmLB9LM9h_nRhHl8a5bG62b-xAMKhQKEglFj18u8R_nRhG_M7AQi0kmYQ", "EiVNLiBEYXVrxaFvcyBnYXR2xJcsIEthdW5hcywgTGl0aHVhbmlhIi4qLAoUChIJY8K_qA8i50YR3wFBhRnh6CoSFAoSCUPTZ7FwIudGEbyLN8fg0Uth"), 
                               (5, "ChIJeYAg7ULm5kYRLUIRZ6uYSm0", "ChIJAQAkzg8i50YR0FSNJdHs2Vg"), 
                               (6, "Ei1CaXLFvmVsaW8gMjMtaW9zaW9zIGdhdHbElywgS2F1bmFzLCBMaXRodWFuaWEiLiosChQKEglh6GhZixjnRhGDkeCh7swqcBIUChIJQ9NnsXAi50YRvIs3x-DRS2E", "EiVFbGVrdHLEl27FsyBnYXR2xJcsIEthdW5hcywgTGl0aHVhbmlhIi4qLAoUChIJTTa9rzgY50YR6pMlzWBJ7OQSFAoSCUPTZ7FwIudGEbyLN8fg0Uth"), 
                               (7, "EidHYXJsaWF2b3MgcGxlbnRhcyAxMywgS2F1bmFzLCBMaXRodWFuaWEiMBIuChQKEgmhziIYsCPnRhEmlXWSO7PS9xANKhQKEgmv7WutuiPnRhEx4GLDNPxBYw", "Ei9TYXZhbm9yacWzIGcuIDEyMywgUmluZ2F1ZGFpLCBLYXVuYXMsIExpdGh1YW5pYQ"), 
                               (8, "EiNNYXJ2ZWzEl3MgZ2F0dsSXLCBLYXVuYXMsIExpdGh1YW5pYSIuKiwKFAoSCZdOZOL2IedGEexdndVRsZ2vEhQKEglD02excCLnRhG8izfH4NFLYQ", "ChIJC4qwJPcY50YRzK7Z33FdbEU"), 
                               (9, "ChIJ2YCWpo0i50YRnFqMeTQFo70", "ChIJC4qwJPcY50YRzK7Z33FdbEU"), 
                               (10, "Eh1PYmVsdSBnLiwgR2lyYWl0xJcsIExpdGh1YW5pYSIuKiwKFAoSCQmAkAsPH-dGEQux-PWplg9EEhQKEgnFyDDmGh_nRhFk-zBAoLXvDg", "ChIJyzilSw8i50YR6Vfzjt29zl4"), 
                               (11, "EiRLcmlhdcWhacWzIGdhdHbElywgS2F1bmFzLCBMaXRodWFuaWEiLiosChQKEgkZ8sHSCyLnRhGfSDfh7OcqPxIUChIJQ9NnsXAi50YRvIs3x-DRS2E", "EiNNYXJ2ZWzEl3MgZ2F0dsSXLCBLYXVuYXMsIExpdGh1YW5pYSIuKiwKFAoSCZdOZOL2IedGEexdndVRsZ2vEhQKEglD02excCLnRhG8izfH4NFLYQ")                 
                      ');

    }



    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE user DROP route_description, CHANGE age age INT DEFAULT NULL');
    }
}
