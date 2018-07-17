<?php if(!empty($posts)): ?>
    <?php foreach ($posts as $post): ?>
        <div class="content-grid-info">
            <img src="/blog/images/post1.jpg" alt=""/>
            <div class="post-info">
                <h4><a href="<?= $post->id; ?>"><?= $post->name; ?></a>  July 30, 2014 / 27 Comments</h4>
                <p>Praesent dapibus, neque id cursus faucibus, tortor neque egestas augue, eu vulputate magna eros eu erat. Aliquam erat volutpat. Nam dui mi, tincidunt quis.</p>
                <a href="single.html"><span></span>READ MORE</a>
            </div>
        </div>
    <?php endforeach; ?>
<?php else: ?>
    <h3>Posts not found</h3>
<?php endif; ?>

<?php echo $pagination; ?>
