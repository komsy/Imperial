<?php

use yii\db\Migration;

/**
 * Class m210310_083639_create_fulltext_index_on_doctor
 */
class m210310_083639_create_fulltext_index_on_doctor extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->execute("ALTER TABLE{{%doctor}} ADD FULLTEXT(doctorName, address)");
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m210310_083639_create_fulltext_index_on_doctor cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m210310_083639_create_fulltext_index_on_doctor cannot be reverted.\n";

        return false;
    }
    */
}
