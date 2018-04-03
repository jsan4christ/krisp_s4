<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180403113947 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE b_sw_cmds DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE b_sw_cmds ADD cmd_name VARCHAR(25) NOT NULL, ADD cmd_active INT NOT NULL, CHANGE sw_id sw_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE b_sw_cmds ADD CONSTRAINT FK_C87F7D8817B8E905 FOREIGN KEY (sw_id) REFERENCES b_installed_sw (sw_id)');
        $this->addSql('CREATE INDEX IDX_C87F7D8817B8E905 ON b_sw_cmds (sw_id)');
        $this->addSql('ALTER TABLE b_sw_cmds ADD PRIMARY KEY (cmd_id)');
        $this->addSql('ALTER TABLE b_sw_inst_locn CHANGE sw_id sw_id INT NOT NULL');
        $this->addSql('ALTER TABLE b_sw_inst_locn ADD CONSTRAINT FK_4A50F12617B8E905 FOREIGN KEY (sw_id) REFERENCES b_installed_sw (sw_id)');
        $this->addSql('CREATE INDEX IDX_4A50F12617B8E905 ON b_sw_inst_locn (sw_id)');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE b_sw_cmds DROP FOREIGN KEY FK_C87F7D8817B8E905');
        $this->addSql('DROP INDEX IDX_C87F7D8817B8E905 ON b_sw_cmds');
        $this->addSql('ALTER TABLE b_sw_cmds DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE b_sw_cmds DROP cmd_name, DROP cmd_active, CHANGE sw_id sw_id INT NOT NULL');
        $this->addSql('ALTER TABLE b_sw_cmds ADD PRIMARY KEY (sw_id, cmd_id)');
        $this->addSql('ALTER TABLE b_sw_inst_locn DROP FOREIGN KEY FK_4A50F12617B8E905');
        $this->addSql('DROP INDEX IDX_4A50F12617B8E905 ON b_sw_inst_locn');
        $this->addSql('ALTER TABLE b_sw_inst_locn CHANGE sw_id sw_id SMALLINT NOT NULL');
    }
}
