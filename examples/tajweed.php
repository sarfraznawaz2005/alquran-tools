<?php
require_once('vendor/autoload.php');

$json = json_decode(file_get_contents('../data/tajweed.json'));
$text = $json->data->text;

$parser = new AlQuranCloud\Tools\Parser\Tajweed();
?>
<link href="https://alquran.cloud/public/css/font-all.css" rel="stylesheet">
<link href="css/tajweed.css" rel="stylesheet">
<div class="font-uthmani" style="direction: rtl">
<?=$parser->parse($text);?>
</div>

<hr />

<table>
    <thead>
        <tr>
            <th>Type</th>
            <th>Identifier</th>
            <th>Colour</th>
            <th>CSS</th>
            <th>Description</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($parser->getMeta() as $meta) { ?>
            <tr>
                <td class="<?=$meta['default_css_class'];?>"><?=$meta['type'];?></td>
                <td><?=$meta['identifier'];?></td>
                <td style="background-color: <?=$meta['html_color'];?>"><?=$meta['html_color'];?></td>
                <td><?=$meta['default_css_class'];?></td>
                <td><?=$meta['description'];?></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
