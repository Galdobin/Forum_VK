<link rel="stylesheet" type="text/css" href="View/rubricView.css">
<?php
// Отображает список рубрик и позволяет указать рубрику по ключу, для передачи в файл rublic.php
// По GET получает номер рубрики для отображения, если GET пуст - то отображает корневую рубрику форума
require_once 'Include/functions.php';

PrintGET();
//PrintQuery('select id as ID, name as "Название рубрики" from rubrics', 'rubric.php', 'ID');

require_once 'View/ViewTables.php';
ViewRubric1();
?>
