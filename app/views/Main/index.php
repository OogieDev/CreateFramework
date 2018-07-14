<div class="container">
    <button class="btn btn-primary" id="send">
        Send
    </button>
    <?php if(!empty($posts)): ?>
        <?php foreach ($posts as $post): ?>
            <div class="alert alert-primary" role="alert">
                <?=$post['name'];?><br>
                <?=$post['surname'];?><br>
                <?=$post['email'];?><br>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
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
                    console.log(res);
                },
                error: function () {
                    alert('Error!');
                }
            }) ;
        });
    });

</script>