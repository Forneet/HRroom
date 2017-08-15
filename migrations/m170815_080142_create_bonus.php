<?php

use yii\db\Migration;

/**
 * Class m170815_080142_create_bonus
 */
class m170815_080142_create_bonus extends Migration
{
    /**
     * @inheritdoc
     */
    public function Up()
    {
        $this->createTable('{{%bonus}}', [
            'id' => $this->primaryKey(),
            'order_id' =>$this->integer()->notNull(),
            'employee_id' =>$this->integer()->notNull(),
            'cost' =>$this->integer()->notNull(),
        ]);

        $this->createIndex('idx-bonus-order_id','{{%bonus}}','order_id');
        $this->createIndex('idx-bonus-employee_id','{{%bonus}}','employee_id');

        $this->addForeignKey('fk-bonus-order','{{%bonus}}','order_id','{{%order}}','id','CASCADE','RESTRICT');
        $this->addForeignKey('fk-bonus-employee_id','{{%bonus}}','employee_id','{{%employee}}','id','CASCADE','RESTRICT');
    }

    /**
     * @inheritdoc
     */
    public function Down()
    {
        $this->dropTable('{{%bonus}}');
        echo "m170815_080142_create_bonus cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m170815_080142_create_bonus cannot be reverted.\n";

        return false;
    }
    */
}
