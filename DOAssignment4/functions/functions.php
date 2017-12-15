<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

    <?php
/**
 * Function to establish a database connection
 * 
 * @return PDO Object
 */

    function searchCorps($column, $searchWord) {
        $db = getDatabase();
        $stmt = $db->prepare("SELECT * FROM corps WHERE $column LIKE :search");
        $search = '%' . $searchWord . '%';

        $binds = array(
            ":search" => $search
        );

        $results = array();

        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            include 'formprocess.php';
            include 'view-order.php';

        } else {
            include 'includes/error.php';
        }
        return $results;
    }
    
    function getSearchData() {
        $results = '';
        if (isset($_GET["searchAction"])) {

            $searchWord = filter_input(INPUT_GET, "searchBox");
            $column = filter_input(INPUT_GET, "searchOption");

            if ($column == null) {
                echo "<p>Select your SEARCH Type</p>";
            } else {
                $results = searchCorps($column, $searchWord);
            }
        }
    }

    function sortData($column, $sortby) {
        $db = getDatabase();
        $stmt = $db->prepare("SELECT * FROM corps ORDER BY $column $sortby");
        $results = array();

        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

            include 'formprocess.php';
            include 'view-order.php';
        } else {
            include 'includes/error.php';
        }
        return $results;
    }

    function getSortData() {
        $results = '';
        if (isset($_GET["sortAction"])) {
            $column = filter_input(INPUT_GET, "sortOption");
            $sortby = filter_input(INPUT_GET, "radioOPTION");

            if ($column == null || $sortby == null) {
                echo "<p>Select your SORT Type</p>";
            } else {
                $results = sortCorps($column, $sortby);
            }
        }
    }
?>