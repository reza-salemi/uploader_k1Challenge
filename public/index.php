<?php
require_once "../private/initialize.php";

$result = show_img();
$folder ='image-'. rand(1000,9999);
$date = date("F j, Y, g:i a");

if(isset($_POST['submit']))
{
    [$name,$url] = uploader('uploader','uploads/',$folder);
    if(!empty($url))
    {
        insert_img($name,$url,$date);
        echo 'Your image sucessfuly uploaded';
    }

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/stylesheet/style.css">
    <title>Document</title>
</head>
<body>
    <div class="container center">
        <div>
            <h1 class="white">Custom File Upload</h1>
        </div>

        <form method="post" enctype="multipart/form-data">

            <div>
                <p class="white">Only pics allowed! ( jpeg, gif, png)</p>
                <input type="file"  name="uploader">
            </div>

            <div >
                <input type="submit" name="submit" value="Submit!">
            </div>

        </form>

    </div>


    <table class="styled-table">

        <thead>
            <tr>
                <th>Image name</th>
                <th>Image</th>
                <th>Uploaded Date</th>
                <th>Delete</th>
            </tr>
        </thead>
        <?php while ($images = mysqli_fetch_assoc($result)) {?>
        <tbody>
            <tr>
                <td><?php echo $images['name']; ?></td>
                <td><img src="<?php echo $images['url']; ?>" width="100px"></td>
                <td><?php echo $images['date']; ?></td>
                <td><a href="<?php echo "delete.php?id=".urlencode($images['id']);?>"><img src="assets/img/index.png" width="40"></a></td>
            </tr>
        </tbody>
        <?php } ?>
    </table>

</body>
</html>