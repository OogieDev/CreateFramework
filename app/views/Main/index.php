<div class="container">
    <div id="answer">

    </div>
    <button class="btn btn-primary" id="send">
        Send
    </button>
<!--    --><?php //new \fw\widgets\menu\Menu([
//            'tpl' => WWW . '/menu/select.php' ,
//            'container' => 'select',
//            'table' => 'categories',
//            'cache' => 60,
//            'cacheKey' => 'menu_select',
//    ]); ?>

    <?php if(!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <div class="alert alert-primary" role="alert">
                <?=$post['name'];?><br>
                <?=$post['surname'];?><br>
                <?=$post['email'];?><br>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>

    <div class="row justify-content-center">
        <p class="col-12">Статьи <?= (count($posts) * $pagination->currentPage); ?> из <?= $total; ?></p>
        <?php if($pagination->countPages > 1): ?>
            <?= $pagination; ?>
        <?php endif; ?>
    </div>

</div>
<script src="/js/test.js"></script>
<script>
    $(function(){
        $('#send').click(function(){
            $.ajax({
                url: '/main/test',
                type: 'post',
                data: {'id': 2},
                success: function(res){

                    $('#answer').html(res);
                    console.log(res);
                },
                error: function () {
                    alert('Error!');
                }
            }) ;
        });
    });

</script>

<h1>Hello world</h1>