<?php

use yii\db\Migration;

/**
 * Class m170815_080027_create_order
 */
class m170815_080027_create_order extends Migration
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
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'date' =>$this->date()->notNull(),
        ], $tableOption);
    }

    /**
     * @inheritdoc
     */
    public function Down()
    {
        $this->dropTable('{{%order}}');
        echo "m170815_080027_create_order cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170815_080027_create_order cannot be reverted.\n";

        return false;
    }
    */
}
