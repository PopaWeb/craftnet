<?php

namespace craft\contentmigrations;

use Craft;
use craft\db\Migration;

/**
 * m180315_122041_developer_table migration.
 */
class m180315_122041_developer_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function safeUp()
    {
        $this->createTable('craftcom_developers', [
            'id' => $this->integer()->notNull(),
            'country' => $this->char(2)->null(),
            'balance' => $this->decimal(14, 4)->notNull()->defaultValue(0),
            'stripeAccessToken' => $this->text()->null(),
            'stripeAccount' => $this->string()->null(),
            'payPalEmail' => $this->string()->null(),
            'PRIMARY KEY([[id]])',
        ]);

        $this->addForeignKey(null, 'craftcom_developers', ['id'], '{{%users}}', ['id'], 'CASCADE', null);
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        echo "m180315_122041_developer_table cannot be reverted.\n";
        return false;
    }
}