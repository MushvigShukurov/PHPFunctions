<style>
    .box{
        padding: 30px 20px;
        border: 1px solid rgb(10,113,254);
        margin-top: 15px;
    }
</style>
<?php 
# Instagram : mushvigsh
$data = file_get_contents('https://jsonplaceholder.typicode.com/posts');
$data = json_decode($data);
foreach($data as $post):
    echo "<div class='box'>";
    echo '<b>'.$post->title.'</b><br>'.$post->body.'<br>';
    echo "</div>";
endforeach;
# Author : Shukurov Mushvig