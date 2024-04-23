<?php if ($props['image'] || $props['title'] || $props['meta'] || $props['content']) : ?>
<div>

    <?php if ($props['image'] && $props['link']) : ?>
    <a href="<?= $props['link'] ?>"><img src="<?= $props['image'] ?>" alt="<?= $props['image_alt'] ?>"></a>
    <?php elseif ($props['image']) : ?>
    <img src="<?= $props['image'] ?>" alt="<?= $props['image_alt'] ?>">
    <?php endif ?>

    <?php if ($props['hover_image']) : ?>
    <img src="<?= $props['hover_image'] ?>" alt="">
    <?php endif ?>

    <?php if ($props['title']) : ?>
    <<?= $props['title_element'] ?>><?= $props['title'] ?></<?= $props['title_element'] ?>>
    <?php endif ?>

    <?php if ($props['meta']) : ?>
    <p><?= $props['meta'] ?></p>
    <?php endif ?>

    <?php if ($props['content']) : ?>
    <div><?= $props['content'] ?></div>
    <?php endif ?>

</div>
<?php endif ?>
