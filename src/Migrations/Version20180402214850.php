<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180402214850 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX IDX_6FDF8FF6BF396750 ON b_sw_expert');
        $this->addSql('ALTER TABLE b_sw_expert DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE b_sw_expert ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE b_sw_expert DROP PRIMARY KEY');
        $this->addSql('CREATE INDEX IDX_6FDF8FF6BF396750 ON b_sw_expert (id)');
        $this->addSql('ALTER TABLE b_sw_expert ADD PRIMARY KEY (id, sw_id)');
    }
}
