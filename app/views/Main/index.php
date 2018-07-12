<div class="container">
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