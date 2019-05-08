<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190508141211 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('INSERT INTO route (user_id, home_location, work_location)
                              VALUES
                               (1, "EiVQaWzEl27FsyBnYXR2xJcsIEFrYWRlbWlqYSwgTGl0aHVhbmlhIi4qLAoUChIJN3XNir8h50YRtzS026csNBoSFAoSCVEqEHrAIedGEa8GikwJD_YZ", "ChIJ5RuEQgEi50YR4OfyAOJqryU"), 
                               (2, "EixWaWVueWLEl3MgZ2F0dsSXIDMyLCBSYXVkb25kdmFyaXMsIExpdGh1YW5pYSIwEi4KFAoSCfMldP_nH-dGEfDGQbbnBc6PECAqFAoSCdmiJHroH-dGEV6EXZMM-zVf", "ChIJpY59qwgi50YRPYnjmtKlieg"), 
                               (3, "ChIJAQAkzg8i50YR0FSNJdHs2Vg", "ChIJGd-ishwa50YR3_J0NtUhwvY"), 
                               (4, "EipQdcWheW5vIGdhdHbElyAxMiwgUmF1ZG9uZHZhcmlzLCBMaXRodWFuaWEiMBIuChQKEgmLB9LM9h_nRhHl8a5bG62b-xAMKhQKEglFj18u8R_nRhG_M7AQi0kmYQ", "EiVNLiBEYXVrxaFvcyBnYXR2xJcsIEthdW5hcywgTGl0aHVhbmlhIi4qLAoUChIJY8K_qA8i50YR3wFBhRnh6CoSFAoSCUPTZ7FwIudGEbyLN8fg0Uth"), 
                               (5, "ChIJeYAg7ULm5kYRLUIRZ6uYSm0", "ChIJeYAg7ULm5kYRLUIRZ6uYSm0"), 
                               (6, "Ei1CaXLFvmVsaW8gMjMtaW9zaW9zIGdhdHbElywgS2F1bmFzLCBMaXRodWFuaWEiLiosChQKEglh6GhZixjnRhGDkeCh7swqcBIUChIJQ9NnsXAi50YRvIs3x-DRS2E", "EiVFbGVrdHLEl27FsyBnYXR2xJcsIEthdW5hcywgTGl0aHVhbmlhIi4qLAoUChIJTTa9rzgY50YR6pMlzWBJ7OQSFAoSCUPTZ7FwIudGEbyLN8fg0Uth"), 
                               (7, "EidHYXJsaWF2b3MgcGxlbnRhcyAxMywgS2F1bmFzLCBMaXRodWFuaWEiMBIuChQKEgmhziIYsCPnRhEmlXWSO7PS9xANKhQKEgmv7WutuiPnRhEx4GLDNPxBYw", "Ei9TYXZhbm9yacWzIGcuIDEyMywgUmluZ2F1ZGFpLCBLYXVuYXMsIExpdGh1YW5pYQ"), 
                               (8, "EiNNYXJ2ZWzEl3MgZ2F0dsSXLCBLYXVuYXMsIExpdGh1YW5pYSIuKiwKFAoSCZdOZOL2IedGEexdndVRsZ2vEhQKEglD02excCLnRhG8izfH4NFLYQ", "ChIJC4qwJPcY50YRzK7Z33FdbEU"), 
                               (9, "ChIJ2YCWpo0i50YRnFqMeTQFo70", "ChIJC4qwJPcY50YRzK7Z33FdbEU"), 
                               (10, "Eh1PYmVsdSBnLiwgR2lyYWl0xJcsIExpdGh1YW5pYSIuKiwKFAoSCQmAkAsPH-dGEQux-PWplg9EEhQKEgnFyDDmGh_nRhFk-zBAoLXvDg", "ChIJyzilSw8i50YR6Vfzjt29zl4"), 
                               (11, "EiRLcmlhdcWhacWzIGdhdHbElywgS2F1bmFzLCBMaXRodWFuaWEiLiosChQKEgkZ8sHSCyLnRhGfSDfh7OcqPxIUChIJQ9NnsXAi50YRvIs3x-DRS2E", "EiRKb25hdm9zIGdhdHbElyAxOSwgS2F1bmFzLCBMaXRodWFuaWEiMBIuChQKEgmnDbJACCLnRhE6KifpFq8iqBATKhQKEgm53cJEsBjnRhFWRcKYq57Ceg")                 
                      ');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

    }
}
