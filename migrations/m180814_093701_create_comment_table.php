<?php

use yii\db\Migration;

/**
 * Handles the creation of table `comment`.
 */
class m180814_093701_create_comment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('comment', [
            'id' => $this->primaryKey(),
            'text' => $this->string(),
            'user_id' => $this->integer(),
            'article_id' => $this->integer(),
            'status'=>$this->integer()
        ]);
    

    //creates index for column `user_id`
    $this->createIndex(
        'idx_post-user_id',
        'comment',
        'user_id'
    );

    //add FK for table `user`
    $this->addForeignKey(
        'fk-post-user_id',
        'comment',
        'user_id',
        'user',
        'id',
        'CASCADE'
    );

    //creates index for column `article_id`
        $this->createIndex(
        'idx_article_id',
        'comment',
        'user_id'
    );

    //add FK for table `article`
    $this->addForeignKey(
        'fk-article_id',
        'comment',
        'user_id',
        'user',
        'id',
        'CASCADE'
    );

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('comment');
    }
}
