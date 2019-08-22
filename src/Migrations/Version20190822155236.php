<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190822155236 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE marriage CHANGE date date DATE NOT NULL');
        $this->addSql('ALTER TABLE agreement ADD request_id INT NOT NULL');
        $this->addSql('ALTER TABLE agreement ADD CONSTRAINT FK_2E655A24427EB8A5 FOREIGN KEY (request_id) REFERENCES request (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_2E655A24427EB8A5 ON agreement (request_id)');
        $this->addSql('ALTER TABLE request CHANGE request_type_id request_type_id INT DEFAULT NULL, CHANGE date date DATE NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE agreement DROP FOREIGN KEY FK_2E655A24427EB8A5');
        $this->addSql('DROP INDEX UNIQ_2E655A24427EB8A5 ON agreement');
        $this->addSql('ALTER TABLE agreement DROP request_id');
        $this->addSql('ALTER TABLE marriage CHANGE date date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE request CHANGE request_type_id request_type_id INT NOT NULL, CHANGE date date DATE DEFAULT NULL');
    }
}
