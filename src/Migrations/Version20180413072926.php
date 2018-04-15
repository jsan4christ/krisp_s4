<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180413072926 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE b_cmds');
        $this->addSql('DROP TABLE b_sw_cat_subcat');
        $this->addSql('ALTER TABLE b_sw_expert DROP PRIMARY KEY');
        $this->addSql('CREATE INDEX IDX_6FDF8FF6BF396750 ON b_sw_expert (id)');
        $this->addSql('ALTER TABLE b_sw_expert ADD PRIMARY KEY (id, sw_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE b_cmds (cmd_id INT AUTO_INCREMENT NOT NULL, cmd_name VARCHAR(25) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(cmd_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_sw_cat_subcat (cat_id INT NOT NULL, subcat_id INT NOT NULL, UNIQUE INDEX ix_ReversePK (subcat_id, cat_id), PRIMARY KEY(cat_id, subcat_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP INDEX IDX_6FDF8FF6BF396750 ON b_sw_expert');
        $this->addSql('ALTER TABLE b_sw_expert DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE b_sw_expert ADD PRIMARY KEY (id)');
    }
}
