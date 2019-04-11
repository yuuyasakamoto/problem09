<?php
class Migration_Add_codes extends CI_Migration {

    public function __construct()
    {   
        parent::__construct();
    }

    // アップデート処理
    public function up()
    {   
        $sql = "CREATE TABLE codes(id int unsigned NOT NULL AUTO_INCREMENT,
                code varchar(50) NOT NULL,
                void TINYINT UNSIGNED NOT NULL DEFAULT 0,
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
        $this->dbforge->drop_table('codes');
    }
}
