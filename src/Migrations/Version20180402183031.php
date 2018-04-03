<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180402183031 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE b_installed_sw DROP INDEX IDX_F2FEE139E6ADA943, ADD UNIQUE INDEX UNIQ_F2FEE139E6ADA943 (cat_id)');
        $this->addSql('ALTER TABLE b_installed_sw DROP INDEX IDX_F2FEE13980D12166, ADD UNIQUE INDEX UNIQ_F2FEE13980D12166 (subcat_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE b_installed_sw DROP INDEX UNIQ_F2FEE139E6ADA943, ADD INDEX IDX_F2FEE139E6ADA943 (cat_id)');
        $this->addSql('ALTER TABLE b_installed_sw DROP INDEX UNIQ_F2FEE13980D12166, ADD INDEX IDX_F2FEE13980D12166 (subcat_id)');
    }
}
