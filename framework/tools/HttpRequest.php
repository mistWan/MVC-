<?php


namespace framework\tools;

class HttpRequest
{
    private $url = '';

    private $is_return = 1;

    public function __construct($url, $is_return = 1)
    {
        $this->url = $url;
        $this->is_return = $is_return;
    }

    public function __set($name, $value)
    {
        if (property_exists($this, $pro)) {
            $this->$pro = $val;
        }
    }

    public function send($data = array())
    {
        # 1.如果传递数据了，说明向服务器提交数据(post)，如果没有传递数据，认为从服务器读取资源(get)
        $ch = curl_init();
        # 2.不管是get、post，跳过证书的验证
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        # 3.设置请求的服务器地址
        curl_setopt($ch, CURLOPT_URL, $this->url);
        # 4.判断是get还是post
        if (!empty($data)) {
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, true);
        }
        # 5.是否返回数据
        if ($this->is_return === 1) {
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($ch);
            curl_close($ch);
            return $result;
        } else {
            curl_exec($ch);
            curl_close($ch);
        }
    }
}
