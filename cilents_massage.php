<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // 获取表单数据
    $name = $_POST['name'];
    $email = $_POST['email'];
    $comment = $_POST['comment'];

    // 简单的表单验证
    if (!empty($name) && !empty($email) && !empty($comment)) {
        // 构造保存到文件的内容
        $data = "Name: $name, Email: $email, Comment: $comment\n";

        // 在当前目录下打开或创建 client.txt 文件
        $file = fopen(__DIR__ . "/client.txt", "a"); // 以追加模式打开文件
        if ($file) {
            fwrite($file, $data); // 将数据写入文件
            fclose($file); // 关闭文件
            $success = true;
        } else {
            $success = false;
        }
    } else {
        $success = false;
    }

    // 返回处理结果
    if ($success) {
        echo "<script>
                document.querySelector('.result').innerHTML = '<p style=\"color: green;\">表单提交成功！</p>';
              </script>";
    } else {
        echo "<script>
                document.querySelector('.result').innerHTML = '<p style=\"color: red;\">表单提交失败，请重新尝试。</p>';
              </script>";
    }
}
?>
