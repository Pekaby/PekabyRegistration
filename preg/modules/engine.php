<?
/**
 * database writers
 */
class engine extends pekaby_abstract_database
{
    public static function db_writer($values)
    {
        global $db;
        $id = false;
        foreach ($values as $key => $value) {
            if (in_array($key, $db)) {
                
            }else{
                if ($loging = true) {
                    if ($key != 'salt') {
                        echo "<b>[WARNING]</b> unexpected key $key";
                    }
                }
            }
            
        }
        $sql = "INSERT INTO `pekaby_db` (";
        $i = 0;
        foreach ($values as $key => $value) {
            $sql .= "`".$key."` ";
            if ($i < count($db)) {
                $sql .= ",";
            }
            $i++;
        }
        $sql .= ") VALUES (";
        $t = 0;
        foreach ($values as $key => $value) {
            $sql .= "'".$value."' ";
            if ($t < count($db)) {
                $sql .= ",";
            }
            $t++;
        }
        $sql .= ")";
        var_dump($sql);
        self::execute($sql);
        return true;
    }

    static public function to_hash($val)
    {
        global $salt;
        $hs = false;
        $new_val = array();
        foreach ($val as $key => $value) {
            $q = explode('.', $key);
            $salt_sys = system::random_str(15);
            if ($q[0] == 'hash') {
                $hs = true;
                $str_hash = $value.$salt_sys.$salt;
                $to = sha1(md5(md5(md5(md5($str_hash)))));
                $new_val[$q[1]] = $to;
                $new_val['salt'] = $salt_sys;
            }else{
                $new_val[$key] = $value;
            }
        }
        if (!$hs) {
            $new_val['salt'] = '0';
        }
        return $new_val;
    }
    public static function hash_str($str, $salt_sys)
    {
        global $salt;
        $str_hash = $str.$salt_sys.$salt;
        $to = sha1(md5(md5(md5(md5($str_hash)))));
        return $to;
    }
}