<?php declare(strict_types = 1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20180425125442 extends AbstractMigration
{
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP INDEX id ON symfony_demo_tag');
        $this->addSql('ALTER TABLE symfony_demo_tag ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE b_sw_expert DROP INDEX IDX_6FDF8FF6BF396750, ADD UNIQUE INDEX UNIQ_6FDF8FF6BF396750 (id)');
        $this->addSql('ALTER TABLE b_sw_expert DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE b_sw_expert CHANGE id id CHAR(36) NOT NULL COMMENT \'(DC2Type:uuid)\'');
        $this->addSql('ALTER TABLE b_sw_expert ADD PRIMARY KEY (id)');
        $this->addSql('ALTER TABLE s_user CHANGE password password VARCHAR(64) NOT NULL');
        $this->addSql('ALTER TABLE b_publications CHANGE journal journal VARCHAR(50) DEFAULT NULL, CHANGE file file VARCHAR(50) DEFAULT NULL, CHANGE issn issn TINYTEXT DEFAULT NULL, CHANGE feature feature VARCHAR(1) DEFAULT NULL');
    }

    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE b_cmds (cmd_id INT AUTO_INCREMENT NOT NULL, cmd_name VARCHAR(25) NOT NULL COLLATE utf8_unicode_ci, PRIMARY KEY(cmd_id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('DROP TABLE b_webadmin_users');
        $this->addSql('DROP TABLE b_webadmin_main_orgn_info');
        $this->addSql('DROP TABLE b_webadmin_object_profile');
        $this->addSql('DROP TABLE b_webadmin_user_profiles');
        $this->addSql('DROP TABLE b_webadmin_profiles');
        $this->addSql('DROP TABLE software_categories');
        $this->addSql('ALTER TABLE b_publications CHANGE journal journal CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE file file CHAR(50) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE issn issn VARCHAR(10) DEFAULT NULL COLLATE latin1_swedish_ci, CHANGE feature feature CHAR(1) DEFAULT \'\' COLLATE latin1_swedish_ci');
        $this->addSql('ALTER TABLE b_sw_expert DROP INDEX UNIQ_6FDF8FF6BF396750, ADD INDEX IDX_6FDF8FF6BF396750 (id)');
        $this->addSql('ALTER TABLE b_sw_expert DROP PRIMARY KEY');
        $this->addSql('ALTER TABLE b_sw_expert CHANGE id id INT NOT NULL');
        $this->addSql('ALTER TABLE b_sw_expert ADD PRIMARY KEY (id, sw_id)');
        $this->addSql('ALTER TABLE s_user CHANGE password password VARCHAR(255) NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('ALTER TABLE symfony_demo_tag MODIFY id INT NOT NULL');
        $this->addSql('ALTER TABLE symfony_demo_tag DROP INDEX primary, ADD UNIQUE INDEX id (id)');
        $this->addSql('DROP INDEX UNIQ_4D5855405E237E06 ON symfony_demo_tag');
    }
}
