<?php 
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://api-xyz.com/trueid/freefire/?id=".$id."&token=NguyenThuWan");
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 0);
    $result = curl_exec($ch);
    curl_close($ch);
    $res = json_decode($result,true);
    if(isset($res['nickname']))
    {
    $print = array(
                'result' => array(
                    'status' => '200',
                    'Author' => 'Nguyen Thu Wan'
                ),
                'nickname' => $res['nickname'],
                'userid' => $res['userid']
            );
        $hasil = json_encode($print, JSON_PRETTY_PRINT);
    }else{
        $print = array(
                'result' => array(
                    'status' => '400',
                    'Author' => 'Nguyen Thu Wan'
                ),
                'error_msg' => 'Invalid id'
            );
        $hasil = json_encode($print, JSON_PRETTY_PRINT);
    }
    print_r($hasil);
    }
?>