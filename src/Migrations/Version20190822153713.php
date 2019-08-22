<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190822153713 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE agreement (id INT AUTO_INCREMENT NOT NULL, custody_id INT NOT NULL, pick_up_id INT DEFAULT NULL, partner_id INT DEFAULT NULL, alternate_weeks INT DEFAULT NULL, INDEX IDX_2E655A2443B1ACE2 (custody_id), INDEX IDX_2E655A24C030C75 (pick_up_id), INDEX IDX_2E655A249393F8FE (partner_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE pick_up (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE custody (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE agreement ADD CONSTRAINT FK_2E655A2443B1ACE2 FOREIGN KEY (custody_id) REFERENCES custody (id)');
        $this->addSql('ALTER TABLE agreement ADD CONSTRAINT FK_2E655A24C030C75 FOREIGN KEY (pick_up_id) REFERENCES pick_up (id)');
        $this->addSql('ALTER TABLE agreement ADD CONSTRAINT FK_2E655A249393F8FE FOREIGN KEY (partner_id) REFERENCES partner (id)');
        $this->addSql('ALTER TABLE marriage CHANGE date date DATE NOT NULL');
        $this->addSql('ALTER TABLE request CHANGE request_type_id request_type_id INT DEFAULT NULL, CHANGE date date DATE NOT NULL');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE agreement DROP FOREIGN KEY FK_2E655A24C030C75');
        $this->addSql('ALTER TABLE agreement DROP FOREIGN KEY FK_2E655A2443B1ACE2');
        $this->addSql('DROP TABLE agreement');
        $this->addSql('DROP TABLE pick_up');
        $this->addSql('DROP TABLE custody');
        $this->addSql('ALTER TABLE marriage CHANGE date date DATE DEFAULT NULL');
        $this->addSql('ALTER TABLE request CHANGE request_type_id request_type_id INT NOT NULL, CHANGE date date DATE DEFAULT NULL');
    }
}
