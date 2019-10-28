<?php

class DB
{
    protected static $host = DB_HOST;
    protected static $base = DB_NAME;
    protected static $user = DB_USER;
    protected static $pass = DB_PASSWORD;

    protected static $dsn;
    protected static $dbh;
    protected static $stmt;

    public static function getConection()
    {
        try {
            self::$dsn = "mysql:host=" . self::$host . ";dbname=" . self::$base . "; charset=utf8";
            self::$dbh = new PDO(self::$dsn, self::$user, self::$pass);
            self::$dbh->setAttribute(PDO::MYSQL_ATTR_INIT_COMMAND, "SET NAMES utf8");
            self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_SILENT);
            self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
            self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            self::$dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, FALSE);
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }

    public static function query($sql, $param = [])
    {
        try {
            self::getConection();
            $sql = trim($sql);
            self::$stmt = self::$dbh->prepare($sql);
            if (count($param) > 0) {
                for ($i = 0; $i < count($param); $i++) {
                    self::$stmt->bindParam($i + 1, $param[$i]);
                }
            }
            if (strtoupper(substr($sql, 0, 6)) === 'SELECT') {
                self::$stmt->execute();
                return self::$stmt->fetchAll(PDO::FETCH_ASSOC);
            } else {
                return self::$stmt->execute();
            }
        } catch (PDOException $e) {
            die("ERROR: " . $e->getMessage());
        }
    }
}
