<?php
class Migration_Add_applicant_ids extends CI_Migration 
{

    public function __construct()
    {   
        parent::__construct();
    }

    // アップデート処理
    public function up()
    {   
        $sql = "CREATE TABLE applicant_ids(id int unsigned NOT NULL AUTO_INCREMENT,
                a int(4) ZEROFILL NOT NULL DEFAULT 0,
                b int(4) ZEROFILL NOT NULL DEFAULT 0,
                c int(4) ZEROFILL NOT NULL DEFAULT 0,
                d int(4) ZEROFILL NOT NULL DEFAULT 0,
                e int(4) ZEROFILL NOT NULL DEFAULT 0,
                f int(4) ZEROFILL NOT NULL DEFAULT 0,
                deleted datetime NULL comment 'NULL = 削除されていない',
                created datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                modified datetime NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
                PRIMARY KEY (id)) DEFAULT CHARSET=utf8;
                ";
        $this->db->query($sql);
    }
    // ロールバック処理
    public function down()
    {   
        $this->dbforge->drop_table('applicant_ids');
    }
}
