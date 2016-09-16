<?php
/**
 * User: xiaobiao
 * Date: 16/9/14
 * Time: 下午12:48
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>Responsive Elements - Semantic</title>
    <link rel="stylesheet" type="text/css" href="//cdn.bootcss.com/semantic-ui/2.2.4/semantic.min.css">

    <script src="//cdn.bootcss.com/jquery/3.1.0/jquery.min.js"></script>
    <script src="//cdn.bootcss.com/semantic-ui/2.2.4/semantic.min.js"></script>

    <style>
        #tableList {
            height: 800px;
            overflow-y: scroll;
        }
    </style>
</head>
<body>
<div class="ui two column stackable grid">
    <div class="six wide column">
        <h5 class="ui top attached header">
            <div class="ui checkbox">
                <input type="checkbox" name="">
                <label>全选</label>
            </div>
            <button class="ui button">
                生成下载
            </button>
        </h5>
        <div class="ui attached segment" id="tableList">
            <div class="ui link list">
                <?php
                $tables = $db->getTables();
                foreach ($tables as $table) {
                    ?>
                    <div class="item ui checkbox">
                        <input type="checkbox" name="checkedTable[]">
                        <label><a href="#" class="tableName"><?php echo $table->getName(); ?></a></label>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </div>
    <div class="ten wide column">
        <div class="ui top attached tabular menu">
            <div class="active item">DTO</div>
            <div class="item">IService</div>
            <div class="item">ServiceImpl</div>
            <div class="item">IDao</div>
            <div class="item">XML</div>
            <div class="item">XML-EXT</div>
        </div>
        <div class="ui bottom attached active tab segment" id="tabSegment">

        </div>
    </div>
</div>

<script>
    $('.tableName').on('click', function () {
        var tableName = $(this).html();
        $.ajax({
            url: './www/gen/dto.php',
            data: {table: tableName},
            success: function () {

            }
        })
    })
</script>
</body>
</html>