<?php
include("fpd.php");
for ($n = 0; $n < 10; $n++) {
    $date = strtotime("+" . $n . " day");
    $tomorrow[] = date('d/m/Y', $date);
}

?>
<h4 class="text-center mt-3">รายการเมนู : ทั้งหมด</h4>
<div class="row mb-3">
    <div class="col-10">
    </div>
    <div class="col-2"><button type="button" id="all" class="btn btn-sm btn-success" style="width: 10rem;"><i class="bi bi-filetype-pdf"></i> ออกรายงาน PDF</button></div>
</div>

<table class="table mx-auto table-bordered table-sm text-center" id="myTable4" name="myTable4">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>วันที่</th>
            <th>หมูบด 5 ฿</th>
            <th>หมูชิ้นติดมัน 5 ฿</th>
            <th>ไก่หั่น 20 ฿</th>
            <th>ไก่หั่น 35 ฿</th>
            <th>ไก่ทอด 30 ฿</th>
            <th>หมูทอดงา 20 ฿</th>
            <th>หมูทอดงา 35 ฿</th>
            <th>หมูฝอย 20 ฿</th>
            <th>หมูฝอย 30 ฿</th>
            <th>ข้าวเหนียว 5 ฿</th>
            <th>ไก่ pop 20 ฿</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($tomorrow as $k => $a) {
        ?>
            <tr>
                <td><?= $k + 1 ?></td>
                <td><?= $a ?></td>
                <td><?= pd1()[$k] ?> ไม้</td>
                <td><?= pd2()[$k] ?> ไม้</td>
                <td><?= pd3()[$k] ?> กล่อง</td>
                <td><?= pd4()[$k] ?> ถุง</td>
                <td><?= pd5()[$k] ?> กล่อง</td>
                <td><?= pd6()[$k] ?> ถุง</td>
                <td><?= pd7()[$k] ?> ถุง</td>
                <td><?= pd8()[$k] ?> กล่อง</td>
                <td><?= pd9()[$k] ?> ถุง</td>
                <td><?= pd10()[$k] ?> ถุง</td>
                <td><?= pd11()[$k] ?> ไม้</td>
            </tr>
        <?php

        }
        ?>
    </tbody>
</table>