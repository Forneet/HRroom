<?php

use yii\db\Migration;

/**
 * Class m170815_080016_create_position
 */
class m170815_080016_create_position extends Migration
{
    /**
     * @inheritdoc
     */
    public function Up()
    {
        $tableOption = null;
        if ($this->db->driverName ==='mysql'){
            $tableOption = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }
        $this->createTable('{{%position}}', [
            'id' => $this->primaryKey(),
            'name' =>$this->string()->notNull(),
        ], $tableOption);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%position}}');
        echo "m170815_080016_create_position cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170815_080016_create_position cannot be reverted.\n";

        return false;
    }
    */
}
