<?php namespace Bukvy\Parse;

class InstaDb {

    private static $table_name = 'instagram_posts';

    public function createInstaTable(){

        $fields = [
            'id'            => "BIGINT(20) UNSIGNED NOT NULL PRIMARY KEY AUTO_INCREMENT",
            'insta_id'      => "BIGINT(255) UNSIGNED NOT NULL",
            'media_type'    => "MEDIUMTEXT NULL",
            'media_url'     => "MEDIUMTEXT NULL",
            'caption'       => "MEDIUMTEXT NULL",
            'timestamp'     => "CHAR(50) NULL",
            'thumbnail_url' => "MEDIUMTEXT NULL",
            'permalink'     => "MEDIUMTEXT NULL",
        ];

        $indexes = [
            'insta_id' => true
        ];

        \DbGlobal::createTable( static::$table_name, $fields, $indexes );
    }

    public function addColumn( $column_name, $column_type ){
        \DbGlobal::addCol( static::$table_name, $column_name, $column_type );
    }

    public static function insertData( $data ){
        \DbGlobal::insert( static::$table_name, $data );
    }

    public static function updateData( $data, $where ){
        \DbGlobal::update( static::$table_name, $data, $where );
    }

    public static function getDataRow( $where = [], $column_name = "*" ){
        return \DbGlobal::getRow( static::$table_name, $where, $column_name );
    }

    public static function getDataResults( $where = [], $column_name = "*" ){
        return \DbGlobal::getResults( static::$table_name, $where, $column_name );
    }

}
new InstaDb;

class_alias( 'Bukvy\Parse\InstaDb', 'InstaDb' );