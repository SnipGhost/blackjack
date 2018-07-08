<?php

class CabModel extends Model
{
    public function updateUserFile($nowid,$filename)
    {
        $res = true;
        try
        {
                $q = "UPDATE users
                        SET `file` = \"$filename\" 
                        WHERE `id` = $nowid";
                    $result = $this->db->query($q);
        }
        catch (DataBaseException $e)
        {
            $res = false;
        }
        return $res;
    }
    
}
