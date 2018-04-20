<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180418091209 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE b_cmds');
        $this->addSql('DROP TABLE b_sw_cat_subcat');
        $this->addSql('ALTER TABLE b_sw_inst_locn DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE b_sw_inst_locn ADD id INT AUTO_INCREMENT NOT NULL, CHANGE sw_id sw_id INT DEFAULT NULL, CHANGE svr_id svr_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE b_sw_inst_locn ADD CONSTRAINT FK_4A50F12612D0BF96 FOREIGN KEY (svr_id) REFERENCES b_server (svr_id)');
        $this->addSql('CREATE INDEX IDX_4A50F12612D0BF96 ON b_sw_inst_locn (svr_id)');
        $this->addSql('ALTER TABLE b_sw_inst_locn ADD PRIMARY KEY (id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE b_cmds (cmd_id INT AUTO_INCREMENT NOT NULL, cmd_name VARCHAR(25) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(cmd_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE b_sw_cat_subcat (cat_id INT NOT NULL, subcat_id INT NOT NULL, UNIQUE INDEX ix_ReversePK (subcat_id, cat_id), PRIMARY KEY(cat_id, subcat_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE b_sw_inst_locn MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE b_sw_inst_locn DROP FOREIGN KEY FK_4A50F12612D0BF96');
        $this->addSql('DROP INDEX IDX_4A50F12612D0BF96 ON b_sw_inst_locn');
        $this->addSql('ALTER TABLE b_sw_inst_locn DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE b_sw_inst_locn DROP id, CHANGE sw_id sw_id INT NOT NULL, CHANGE svr_id svr_id SMALLINT NOT NULL');
        $this->addSql('ALTER TABLE b_sw_inst_locn ADD PRIMARY KEY (sw_id, svr_id)');
    }
}
