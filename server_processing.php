<?php

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */

/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */

// DB table to use
$table = 'tb_sales';

// Table's primary key
$primaryKey = 'id';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array(
        'db' => 'id',
        'dt' => 0,
        'formatter' => function ($d, $row) {
            
            return $d;
        }
    ),
    array(
        'db'        => 'date',
        'dt'        => 1,
        'formatter' => function ($d, $row) {
            $date = date_create($d);
            return  date_format($date, "d/m/Y");;
        }
    ),
    array(
        'db'        => 'sex',
        'dt'        => 2,
        'formatter' => function ($d, $row) {
            if ($d == "ช") {
                $sex = "ชาย";
            } else {
                $sex = "หญิง";
            }
            return $sex;
        }
    ),
    array(
        'db'        => 'sales',
        'dt'        => 3,
        'formatter' => function ($d, $row) {
            return number_format($d);
        }
    ),
    array(
        'db'        => 'id',
        'dt'        => 4,
        'formatter' => function ($d, $row) {
            $path = '<a href="postsales/update.php?id=' . $d . '"><button type="button" class="btn btn-sm btn-warning w-50"><i class="bi bi-pencil-square"></i> ดูรายละเอียด</button></a>';
            return $path;
        }
    ),
);

// SQL server connection information
$sql_details = array(
    'user' => 'root',
    'pass' => '',
    'db'   => 'test',
    'host' => 'localhost'
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */

require('ssp.class.php');

echo json_encode(
    SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns)
);
