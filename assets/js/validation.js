var $str = "";
function validate_username($str) 
{
    $allowed = array(".", "-", "_"); // you can add here more value, you want to allow.
    if(ctype_alnum(str_replace($allowed, '', $str ))) {
        return $str;
    } else {
        $str = "Invalid Username";
        return $str;
    }
}