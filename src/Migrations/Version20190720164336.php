<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190720164336 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE house (id INT AUTO_INCREMENT NOT NULL, address VARCHAR(255) NOT NULL, town VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE request_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE marriage_type (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE marriage ADD marriage_type_id INT NOT NULL, ADD economic_system_id INT NOT NULL, ADD registry_id INT NOT NULL, ADD partner_first_id INT NOT NULL, ADD partner_second_id INT NOT NULL, ADD house_id INT NOT NULL, CHANGE place town VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE marriage ADD CONSTRAINT FK_DEAA431E2394D2A3 FOREIGN KEY (marriage_type_id) REFERENCES marriage_type (id)');
        $this->addSql('ALTER TABLE marriage ADD CONSTRAINT FK_DEAA431ECD6B1CCA FOREIGN KEY (economic_system_id) REFERENCES economic_system (id)');
        $this->addSql('ALTER TABLE marriage ADD CONSTRAINT FK_DEAA431E4CB707ED FOREIGN KEY (registry_id) REFERENCES registry (id)');
        $this->addSql('ALTER TABLE marriage ADD CONSTRAINT FK_DEAA431E8B8CE4E5 FOREIGN KEY (partner_first_id) REFERENCES partner (id)');
        $this->addSql('ALTER TABLE marriage ADD CONSTRAINT FK_DEAA431ED44180D8 FOREIGN KEY (partner_second_id) REFERENCES partner (id)');
        $this->addSql('ALTER TABLE marriage ADD CONSTRAINT FK_DEAA431E6BB74515 FOREIGN KEY (house_id) REFERENCES house (id)');
        $this->addSql('CREATE INDEX IDX_DEAA431E2394D2A3 ON marriage (marriage_type_id)');
        $this->addSql('CREATE INDEX IDX_DEAA431ECD6B1CCA ON marriage (economic_system_id)');
        $this->addSql('CREATE INDEX IDX_DEAA431E4CB707ED ON marriage (registry_id)');
        $this->addSql('CREATE INDEX IDX_DEAA431E8B8CE4E5 ON marriage (partner_first_id)');
        $this->addSql('CREATE INDEX IDX_DEAA431ED44180D8 ON marriage (partner_second_id)');
        $this->addSql('CREATE INDEX IDX_DEAA431E6BB74515 ON marriage (house_id)');
        $this->addSql('ALTER TABLE child ADD marriage_id INT NOT NULL');
        $this->addSql('ALTER TABLE child ADD CONSTRAINT FK_22B354299DAE1DA4 FOREIGN KEY (marriage_id) REFERENCES marriage (id)');
        $this->addSql('CREATE INDEX IDX_22B354299DAE1DA4 ON child (marriage_id)');
        $this->addSql('ALTER TABLE request ADD request_type_id INT NOT NULL, ADD marriage_id INT NOT NULL, CHANGE city town VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9FEF68FEC4 FOREIGN KEY (request_type_id) REFERENCES request_type (id)');
        $this->addSql('ALTER TABLE request ADD CONSTRAINT FK_3B978F9F9DAE1DA4 FOREIGN KEY (marriage_id) REFERENCES marriage (id)');
        $this->addSql('CREATE INDEX IDX_3B978F9FEF68FEC4 ON request (request_type_id)');
        $this->addSql('CREATE INDEX IDX_3B978F9F9DAE1DA4 ON request (marriage_id)');
        $this->addSql('ALTER TABLE registry CHANGE place town VARCHAR(255) NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE marriage DROP FOREIGN KEY FK_DEAA431E6BB74515');
        $this->addSql('ALTER TABLE request DROP FOREIGN KEY FK_3B978F9FEF68FEC4');
        $this->addSql('ALTER TABLE marriage DROP FOREIGN KEY FK_DEAA431E2394D2A3');
        $this->addSql('DROP TABLE house');
        $this->addSql('DROP TABLE request_type');
        $this->addSql('DROP TABLE marriage_type');
        $this->addSql('ALTER TABLE child DROP FOREIGN KEY FK_22B354299DAE1DA4');
        $this->addSql('DROP INDEX IDX_22B354299DAE1DA4 ON child');
        $this->addSql('ALTER TABLE child DROP marriage_id');
        $this->addSql('ALTER TABLE marriage DROP FOREIGN KEY FK_DEAA431ECD6B1CCA');
        $this->addSql('ALTER TABLE marriage DROP FOREIGN KEY FK_DEAA431E4CB707ED');
        $this->addSql('ALTER TABLE marriage DROP FOREIGN KEY FK_DEAA431E8B8CE4E5');
        $this->addSql('ALTER TABLE marriage DROP FOREIGN KEY FK_DEAA431ED44180D8');
        $this->addSql('DROP INDEX IDX_DEAA431E2394D2A3 ON marriage');
        $this->addSql('DROP INDEX IDX_DEAA431ECD6B1CCA ON marriage');
        $this->addSql('DROP INDEX IDX_DEAA431E4CB707ED ON marriage');
        $this->addSql('DROP INDEX IDX_DEAA431E8B8CE4E5 ON marriage');
        $this->addSql('DROP INDEX IDX_DEAA431ED44180D8 ON marriage');
        $this->addSql('DROP INDEX IDX_DEAA431E6BB74515 ON marriage');
        $this->addSql('ALTER TABLE marriage DROP marriage_type_id, DROP economic_system_id, DROP registry_id, DROP partner_first_id, DROP partner_second_id, DROP house_id, CHANGE town place VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE registry CHANGE town place VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
        $this->addSql('ALTER TABLE request DROP FOREIGN KEY FK_3B978F9F9DAE1DA4');
        $this->addSql('DROP INDEX IDX_3B978F9FEF68FEC4 ON request');
        $this->addSql('DROP INDEX IDX_3B978F9F9DAE1DA4 ON request');
        $this->addSql('ALTER TABLE request DROP request_type_id, DROP marriage_id, CHANGE town city VARCHAR(255) NOT NULL COLLATE utf8mb4_unicode_ci');
    }
}
