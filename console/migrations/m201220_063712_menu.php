<?php

use yii\db\Migration;

/**
 * Class m201220_063712_menu
 */
class m201220_063712_menu extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            // http://stackoverflow.com/questions/766809/whats-the-difference-between-utf8-general-ci-and-utf8-unicode-ci
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%menu}}', [
            'id_menu' => $this->primaryKey(),
            'nama' => $this->string()->notNull(),
            'url' => $this->string()->notNull(),
            'parent' => $this->integer()->Null(),
            'no_urut' => $this->integer()->notNull(),
            'icon' => $this->string()->notNull(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%menu}}');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201220_063712_menu cannot be reverted.\n";

        return false;
    }
    */
}
