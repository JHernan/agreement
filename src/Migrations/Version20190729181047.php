<?php

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20190729181047 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE marriage DROP INDEX IDX_DEAA431E4CB707ED, ADD UNIQUE INDEX UNIQ_DEAA431E4CB707ED (registry_id)');
        $this->addSql('ALTER TABLE request DROP INDEX IDX_3B978F9F9DAE1DA4, ADD UNIQUE INDEX UNIQ_3B978F9F9DAE1DA4 (marriage_id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE marriage DROP INDEX UNIQ_DEAA431E4CB707ED, ADD INDEX IDX_DEAA431E4CB707ED (registry_id)');
        $this->addSql('ALTER TABLE request DROP INDEX UNIQ_3B978F9F9DAE1DA4, ADD INDEX IDX_3B978F9F9DAE1DA4 (marriage_id)');
    }
}
