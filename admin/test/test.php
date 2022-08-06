<?php
/*
include("../config.php");

$sql = "SELECT * FROM `tb_admin`";
$re = mysqli_query($conn, $sql);

while ($row = mysqli_fetch_assoc($re)) {
    $a1 = array(
        "title" => "ยอดขาย : " . $row["id"],
        "start" => "สภาพอากาศ : " . $row["user"],
    );
    $a2[] = $a1;

}

$encode = json_encode($a2);
echo($encode);

*/



$curl = curl_init();

curl_setopt_array($curl, array(
    CURLOPT_URL => "https://data.tmd.go.th/nwpapi/v1/forecast/location/daily/place?province=กรุงเทพมหานคร&fields=tc,rain,cond&duration=30",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 30,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "GET",
    CURLOPT_HTTPHEADER => array(
        "accept: application/json",
        "authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6ImRkZTQzZGU2Yjc2MWZlM2FjZWQ1YzViNmU1NmNjOTlmMDEwOWNlNzFjYzdlMmViMDNhYjY3Njg3NzVlZTIwOGE5OTVlYTJjMmVjMDA1YjU1In0.eyJhdWQiOiIyIiwianRpIjoiZGRlNDNkZTZiNzYxZmUzYWNlZDVjNWI2ZTU2Y2M5OWYwMTA5Y2U3MWNjN2UyZWIwM2FiNjc2ODc3NWVlMjA4YTk5NWVhMmMyZWMwMDViNTUiLCJpYXQiOjE2MjczODI5MTMsIm5iZiI6MTYyNzM4MjkxMywiZXhwIjoxNjU4OTE4OTEzLCJzdWIiOiIxNTQ2Iiwic2NvcGVzIjpbXX0.VojmIoh4n_OnPH191uB1sq9M_4HSn5L-RaftO-xoZ-RcT2L04ia61EW5uZYdg713gGHbhsldvHdr85aE40hHFkM1hmHiDLW5QKDQTGqi-rMsLVyTT38FYDCB_-2G0KqZX1M46lzM6VkNpZHyhEclyWq634veK0ILECGUvqMG_XbD4F-oXDjqKFfeclz_FintXlp4RXlCje1GPFYQoResTlmmZhmImcDEbG19TZhZ2QuYy1RbaaspljGQEN_v98p_ujas2C08LvgehQT-qg-6Q_uXw4tY4i0CVK2oIjE22Yj9a1dDAhZ6tmRXFD5UAs8za9E4Dn7r44MDNOobDayjfdObu7himJmsMIL7SdNbEuyWQHKeDTy5BLo1Y4U9nhVqXKxxyqlDsiqrXUS01RagEf59epxQzAq6oWGp68Q0GgzWnrhu3SZDbt2KYlIVj_YoZW4j08Puz8XnbGtcHS22rcfJfVuSHv24mfhTkOEX-uDCuO2S6-a4P3rjHvKCxMkk34iLnD3GsYkmLKnZMlk4NpVLr_pL_2vCJBcRkGAeKcB9FINbeXB5tlh40O8GiFKs5EYOO4JL-B6dtXsNx38FB02TcXld68i3JWafkCV81MKbMfkot7sAlCYZhOhkxDC5dJHMFLeNxnbQ2f5DoAMfjHfVZDNRnlJj0pGhadlXQ6A",
    ),
));

$response = curl_exec($curl);
$err = curl_error($curl);


curl_close($curl);
$jsde = json_decode($response);


$province = $jsde->WeatherForecasts[0]->location->province;

$arr = array(
    1 => "ท้องฟ้าแจ่มใส (Clear)",
    2 => "มีเมฆบางส่วน (Partly cloudy)",
    3 => "เมฆเป็นส่วนมาก (Cloudy)",
    4 => "มีเมฆมาก (Overcast)",
    5 => "ฝนตกเล็กน้อย (Light rain)",
    6 => "ฝนปานกลาง (Moderate rain)",
    7 => "ฝนตกหนัก (Heavy rain)",
    8 => "ฝนฟ้าคะนอง (Thunderstorm)",
    9 => "อากาศหนาวจัด (Very cold)",
    10 => "อากาศหนาว (Cold)",
    11 => "อากาศเย็น (Cool)",
    12 => "อากาศร้อนจัด (Very hot)"
);


foreach ($jsde->WeatherForecasts[0]->forecasts as $a) {
    $date = date_create($a->time);


    $d[] = date_format($date, "Y-m-d");
    $ms[] = $arr[$a->data->cond];
    $tc[] = $a->data->tc;
}

/*
foreach ($d as $key => $row) {
    $a1 = array(
        "title" => "ยอดขาย : \n สภาพอากาศ : " . $ms[$key] . "",
        "start" => $d[$key]
    
    );
    $a2[] = $a1;
}
*/

foreach ($d as $key => $row) {
    $a1 = array(
        "title" => "ยอดขาย : 1231313",
        "start" => $d[$key]

    );
    $a2[] = $a1;
}

foreach ($d as $key => $row) {
    $a3 = array(
        "title" => "สภาพอากาศ : " . $ms[$key] . "",
        "start" => $d[$key]

    );
    $a2[] = $a3;
}
$encode = json_encode($a2);
echo ($encode);
