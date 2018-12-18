<?php
require '../vendor/autoload.php';

use Google\Cloud\Core\ServiceBuilder;

if (isset($_POST['submit'])) {
    $cloud = new ServiceBuilder([
        'keyFilePath' => 'glocals-d89b4664e79a.json',
        'projectId' => 'glocals-197409'
    ]);

    $storage = $cloud->storage();
    $bucket = $storage->bucket('glocals_upload');
    $options = [
        'name' => $_FILES["image"]["name"],
        'predefinedAcl' => 'publicRead'
    ];

    $object = $bucket->upload(
            fopen($_FILES['image']['tmp_name'], 'r'), $options
    );
}
?>
<form method="post" enctype="multipart/form-data">
    <input type="file" name="image" id="image" />
    <input type="submit" name="submit" value="submit">
</form>