<!-- I am in your extended network! -->
<table border=1 cellspacing=0 cellpadding=0>
    <tr>
        <td>
            <div align=center>
                <img width="850" height="1" /><br />
                <strong><?= $__config['profile']['name'] ?> is in your extended network</strong><br />
                <img width="850" height="1" />
            </div>
        </td>
    </tr>
</table>

<sub>
    <strong><?= $__config['profile']['name'] ?>'s Latest Blog Entry</strong> [<strong><a href="<?= $__config['profile']['links']['blog'] ?>">Subscribe to this Blog</a></strong>]
</sub>
<br />

<?php
if ( isUrl($__config['profile']['links']['rss']) ) {
    $items = getFeedEntries($__config['profile']['links']['rss'], 5);
    foreach ($items as $item) {
        __($item['title'] . ' (<strong><a href="' . $item['link'] . '">view more</a></strong>)');
    }
}
?>

<?= __('[<strong><a href="' . $__config['profile']['links']['blog'] . '">View All Blog Entries</a></strong>]') ?>
<br />

<?= renderSVGToFile('header-blurbs', 'header.svg.php', ['yield' => $__config['profile']['name'] . '\'s Blurbs']) ?>
<?= renderSVGToFile('subhead-about', 'subhead.svg.php', ['yield' => 'About me:']) ?>
<?= __($__config['profile']['about']) ?>
<br />
<?= renderSVGToFile('subhead-whom', 'subhead.svg.php', ['yield' => 'Whom I\'d like to meet:']) ?>
<?= __($__config['profile']['meet']) ?>
<br />
<?= renderSVGToFile('header-friends', 'header.svg.php', ['yield' => $__config['profile']['name'] . '\'s Friend Space']) ?>
<?=__('<strong>' . $__config['profile']['name'] . ' has ' . renderSVGToFile('rednum-friends', 'rednum.svg.php', ['yield' => $__config['profile']['friends']['count']], false) . ' ' . pluralize($__config['profile']['friends']['count'], 'friend') . '.</strong>') ?>
<br />

<table border=0 cellspacing=0 cellpadding=0>
<?php
$counter = 0;
foreach ( $__config['profile']['friends']['favorites'] as $friend ) {
    if ( $counter % 4 === 0 ) {
?>
    <tr>
<?php
    }
?>
        <td>
            <?= __('<div align="center"><strong><a href="' . $friend['url'] . '">' . $friend['name'] . '</a></strong></div>') ?>
            <img src="<?= $friend['image'] ?>" width="190" />
        </td>
<?php
    if ( $counter % 4 === 3 ) {
?>
    </tr>
<?php
    }

    $counter++;
}
?>
</table>
