<?php
date_default_timezone_set("Asia/Kuala_Lumpur");
if( !empty($_POST["title"]) && !empty($_POST["body"])){
    $s_title = $_POST["title"];
    $s_body = $_POST["body"];
    send_notification($s_title, $s_body);
}else{
    echo "Please Fill In The Fields !";
}

// The reason I push notification as data instead of notification is because when the app is 
// in background the notification will be handle by phone system so the notification set in the apps will be cancel out.
// But data message by default the message priority are set to normal so the phone sometimes will delay the notification(Android Oreo and Above, API 26+).
// so by setting the message prioriry to high the phone will display the notification instantly.


// The device token may change when:
// 1 - The app deletes Instance ID
// 2 - The app is restored on a new device
// 3 - The user uninstalls/reinstall the app
// 4 - The user clears app data.

function send_notification($s_title, $s_body){

    $device_token[0] = "dKl3HPfehaw:APA91bFoZEOyOpLZVS7YFMnNk5ifvd-ol6RCO13oEkkrKn2dklz8n6mIknD7pKY3Rmc5yv5zyideeIB53qtJzJuO3ic-4bblXz7W27LxeZgjatTfdmIPzxnBHcDvacgh2jLRtdE9M9sF";
    $device_token[1] = "e7ikXj9dNes:APA91bF1O-5kyR9aSEdodcT7rsThk_UFB-2o3j6VxQFVu4WD5LsMtVz5JCj1Y4lOzTEnI0YOf5Zx5SPVAVu3u0zgQS75sKVq5kjYHF1oOe1dYI-cz65Z24nzE6eAlinf3IKv1Eq1yh_o";
    $device_token[2] = "cL98P4HzNng:APA91bE8rP6kVMugpqIjXAa6GXVGTj9SWvF7E5x5yxutCAu3K7n-MVNhb14l1-dN4XK3PWEbeGf6NDXqEtuhFaPk1ciff1ZKXBu74MxyG-9t_313j6uq_2qbu-pYDeBBarGKzepA1Stt";
    $device_token[3] = "fPdE8BPhQ6M:APA91bGWYHLgLIM5jvZnLEQAwP595F7R9J5jierAJ4u7_rcUyMY65_l12WIHC-PocmtLqZB51cgnEOjEnHpXo1MWmvDgMgxbWTfoQoMYHhKejWh_6ZSXkJJyL7ylmfxWtA3j1DPP2dsB";
    $device_token[4] = "e5wOn7RMeUE:APA91bHFb2WmUptqzvgi_J1yBhgXePeJF7-dONqUrGEf6u1d5bh6shqxVHhiqxCoVZmfrde0jb9tP_s74DvD1J_ePZWg9fcWQNXIrQKZNCoDV6DCB3lCTK9uDwidIgl1uCVCHwkGumrW";
    $device_token[5] = "dOWFYMiZ_Vo:APA91bHnH7G8hd3PGGkvZZK99kz3yOzzLP6k1dTSulxMC653bV7tzykQCh7pMgAiuFiXGfp8j_diAhKaslEN7zeMEqy-RXICcwZywse8dlO5ipcmzDndr2D64fYyFXLj0ymxzVFEIbRb";
    $device_token[6] = "coyJ4JnI8zg:APA91bG1JpMNxbIGfZWL4K7_8lHz4TY838DxbclNmI94wg-05SbH7TKL1YEBx-0vbfkIuxi0NiRj0QcvdSljGKw2lJngCBXbdRdhsAxVy7SpVwk9Zw59t8QOgMJJzM0lDjZUwgShhxXU";
    $url = 'https://fcm.googleapis.com/fcm/send';
    $server_key = 'AAAAu4g9TaE:APA91bG6XIgcuYzu10kKPGEvFfr07vqA-TO5y_vApabTCQPGavPddoXVuic0E-8E4zs6Kw0pq0S4FWGuljcBbivvDKyNu8hh58khlMvD6koNFofKr4MfLGbSN4gjmXjZTnzeicANjFsC';
    $msg = array (
		'body' 	=> $s_body,
        'title'	=> $s_title,
        'datetime' => date('Y-m-d H:i'),
    );
	$fields = array (
        'to'    =>  $device_token[6],
        'data'	=> $msg,
        'priority' => 'high',
	);
	$headers = array (
        'Authorization: Bearer ' .$server_key,
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, $url );
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch );
    echo $result;
    curl_close( $ch );
}
?>
