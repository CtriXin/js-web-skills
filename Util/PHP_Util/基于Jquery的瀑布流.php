<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>AJAX</title>
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
    <script src="js/jquery-1.8.1.min.js"></script>
    <script src="js/jquery.masonry.min.js"></script>
    <script src="js/jquery.infinitescroll.min.js"></script>
    <style>
        #container {
            width: 90%;
            margin: 80px auto;
        }
 
        .box {
            box-shadow: 0 0 4px #999;
            margin-top: 40px;
            padding: 40px;
            font-family: "Century Gothic", "Microsoft YaHei", Arial, monospace;
        }
        .loading {
            text-align: center;
        }
    </style>
</head>
<body>
<div id="container">
    <?php
    $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
    $size = 20;
    try
    {
        $pdo = new PDO('mysql:host=localhost;dbname=wechatbook', 'root', 'root');
        $offset = ($page - 1) * $size;
        $sql = "SELECT title FROM wcb_rss_news limit $offset,$size";
        $stmt = $pdo->query($sql);
        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $list = $stmt->fetchAll();
        if (!empty($list))
        {
            foreach ($list as $row)
            {
                ?>
                <div class="box"><?= $row['title'] ?></div>
            <?php
            }
        }
        else
        {
            echo '';
        }
    }
    catch (PDOException $e)
    {
    }
    ?>
</div>
<div class="loading">
</div>
<div id="next-link"><a href="data.php?page=1">下一页</a></div>
<script>
    $(function() {
        var $container = $("#container");
        $container.imagesLoaded(function() {
            $container.masonry({
                itemSelector: '.box',
                isAnimated: true,
                columnWidth:200,
                gutterWidth:200,
        //      isFitWidth:true,//自适应宽度
                isResizableL:true// 是否可调整大小
            });
        });
        $container.infinitescroll({
            navSelector: '#next-link',
            nextSelector: '#next-link a',
            itemSelector: '.box',
            animate: true,
            loading: {
                msgText: "加载中...",
                finishedMsg: '没有新数据了...',
                img: 'http://xialei.test.com/img/loading.gif',
                selector: '.loading'
            },
            localMode: true
        }, function(newElements) {
            console.dir(newElements)
            var $newEle = $(newElements);
            $newEle.imagesLoaded(function() {
                $container.masonry('appended', $newEle, true);
            });
        });
    });
</script>
</body>
</html>