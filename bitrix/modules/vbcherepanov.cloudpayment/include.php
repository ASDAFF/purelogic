<?
class VBCHCLPAY{
public static function Object_to_array($data)
{
    if (is_array($data) || is_object($data))
    {
        $result = array();
        foreach ($data as $key => $value)
        {
            $result[$key] = self::Object_to_array($value);
        }
        return $result;
    }
    return $data;
}
}
?>