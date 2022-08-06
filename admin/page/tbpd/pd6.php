<?php
include("fpd.php");
for ($n = 0; $n < 10; $n++) {
    $date = strtotime("+" . $n . " day");
    $tomorrow[] = date('d/m/Y', $date);
}
?>
<h4 class="text-center mt-3">รายการสินค้า : หมูทอดงา 20 ฿</h4>
<div class="row mb-3">
    <div class="col-10">
    </div>
    <div class="col-2"><button type="button" id="pd6" class="btn btn-sm btn-success" style="width: 10rem;"><i class="bi bi-filetype-pdf"></i> ออกรายงาน PDF</button></div>
</div>
<table class="table mx-auto table-bordered table-sm text-center" id="myTable4" name="myTable4">
    <thead>
        <tr>
            <th>ลำดับ</th>
            <th>วันที่</th>
            <th>หมูทอดงา 20 ฿</th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($tomorrow as $k => $a) {
        ?>
            <tr>
                <td><?= $k + 1 ?></td>
                <td><?= $a ?></td>
                <td><?= pd6()[$k] ?></td>
            </tr>
        <?php

        }
        ?>
    </tbody>
</table>