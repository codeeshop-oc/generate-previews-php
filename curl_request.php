function curl_get($url, array $options = array())
{
    $defaults = array(
        CURLOPT_URL => $url,
        CURLOPT_HEADER => TRUE,
        CURLOPT_FOLLOWLOCATION => TRUE,
        CURLOPT_RETURNTRANSFER => TRUE,
        CURLOPT_BINARYTRANSFER => TRUE,
        CURLOPT_AUTOREFERER => TRUE,
        CURLOPT_SSL_VERIFYPEER => FALSE,
        CURLOPT_REFERER => 'https://www.facebook.com',
        CURLOPT_USERAGENT => "Mozilla/5.0 (Windows NT 6.1; WOW64; rv:7.0.1) Gecko/20100101 Firefox/7.0.12011-10-16 20:23:00",
        // CURLOPT_NOBODY => TRUE,
        CURLOPT_TIMEOUT => 5
    );

    // CURLOPT_REFERER - Enter Your Referer Website

    $change_url = $url;
    $ch = curl_init();
    curl_setopt_array($ch, ($options + $defaults));
    if( ! $result = curl_exec($ch))
    {
        $result = '';
    } else {
        $change_url = curl_getinfo($ch, CURLINFO_EFFECTIVE_URL);
    }

    curl_close($ch);
    return [$change_url, $result];
}
