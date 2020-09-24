<?php

class m200923_175353_create_table_tbl_productos extends CDbMigration
{
	private $table = 'tbl_productos';
	public function up()
	{
		$this->createTable($this->table,[
			'id'=>'pk',
			'description' => 'string NOT NULL',// VARCHAR(248)
			'reference' => 'string NOT NULL',// VARCHAR(30)
			'stock' =>'integer NOT NULL',// INT(11)
			'currency' =>'string NOT NULL',// SET(USD, COP)
			'price' =>'double NOT NULL',// DOUBLE(15)
		]);
	}

	public function down()
	{
		$this->dropTable($this->table);
	}

	/*
	// Use safeUp/safeDown to do migration with transaction
	public function safeUp()
	{
	}

	public function safeDown()
	{
	}
	*/
}