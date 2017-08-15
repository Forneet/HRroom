<?php

use yii\db\Migration;

/**
 * Class m170815_080002_create_contract
 */
class m170815_080002_create_contract extends Migration
{
    /**
     * @inheritdoc
     */
    public function Up()
    {
        $tableOption = null;
        if ($this->db->driverName ==='mysql'){
            $tableOption = 'CHARACTER SET utf8 COLLATE  utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%contract}}', [
            'id' => $this->primaryKey(),
            'employee_id' =>$this->integer()->notNull(),
            'first_name' =>$this->string()->notNull(),
            'last_name' =>$this->string()->notNull(),
            'date_open' =>$this->date()->notNull(),
            'date_close' =>$this->date()->notNull(),
            'close_reason' =>$this->text(),
        ], $tableOption);
    }

    /**
     * @inheritdoc
     */
    public function Down()
    {
        $this->dropTable('{{%contract}}');
        echo "m170815_075951_create_contract cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170815_080002_create_contract cannot be reverted.\n";

        return false;
    }
    */
}
