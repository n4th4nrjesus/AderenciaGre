<?php
$servername = "localhost:3306";
$username = "usu@AderenciaGre";
$password = "aderenciagrepassword";
$database = "aderencia_gre";

$conn = mysqli_connect(
    $servername,
    $username,
    $password,
    $database
);

mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, "SET NAMES 'utf8'");
mysqli_query($conn, 'SET character_set_connection=utf8');
mysqli_query($conn, 'SET character_set_client=utf8');
mysqli_query($conn, 'SET character_set_results=utf8');

function executeSelect(string $query)
{
    global $conn;

    if ($result = mysqli_query($conn, $query)) {
        if (mysqli_num_rows($result) > 0)
            return ['status' => 1, 'result' => $result];

        return
            ['status' => 0, 'result' => 'Found no rows.'];
    }

    return ['status' => -1, 'result' => mysqli_error($conn)];
}

function executeInsert(string $sql)
{
    global $conn;

    if (mysqli_query($conn, $sql)) {
        return ['status' => 1, 'result' => "Row inserted."];
    }

    return ['status' => -1, 'result' => mysqli_error($conn)];
}

function find(string $table, $where = '', string $joins = '', $fields = '*')
{
    $queryFields = $fields;
    $queryWhere = '';

    if (is_array($fields))
        $queryFields = implode(',', $fields);

    if (!empty($where))
        $queryWhere = 'WHERE ' . $where;

    $query = "
        SELECT
            {$queryFields}
        FROM aderencia_gre.{$table}
        {$joins}
        {$queryWhere};
    ";

    return executeSelect($query);
}

function create($table, array $fields)
{
    foreach ($fields as $key => $value) {
        $fieldNames[] = $key;
        $fieldValues[] = $value;
    }

    $fieldNames = implode(',', $fieldNames);

    for ($i = 0; $i < count($fieldValues); $i++) {
        $fieldValue = $fieldValues[$i];
        if (!is_integer($fieldValue)) $fieldValues[$i] = "'" . $fieldValue . "'";
        if (empty($fieldValue) && $fieldValue !== 0) $fieldValues[$i] = "NULL";
    }

    $fieldValues = implode(',', $fieldValues);

    $sql = "
        INSERT INTO aderencia_gre.{$table}
        ({$fieldNames}) VALUES
        ({$fieldValues})
    ";

    return executeInsert($sql);
}
