<?php
function pdo_get_connection(){
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "duanmausql";
    
    try {
        $conn = new PDO("mysql:host=$host;port=3307;dbname=$dbname", $username, $password);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn; // Trả về kết nối PDO đã thiết lập
    } catch (PDOException $e) {
        die("Connect failed " . $e->getMessage());
    }
}
// Dùng để truy vấn cơ sở dữ liệu (thêm sửa xóa)
function pdo_execute($sql){
    $sql_args = array_slice(func_get_args(),1); //đã lấy tất cả các đối số truyền vào hàm và trả về chúng dưới dạng một mảng.
    try{
        $conn = pdo_get_connection(); // liên kết cơ sở dữ liệu
        $stmt = $conn->prepare($sql); // xác định câu lệnh truy vấn thông qua biến &stmt 
        $stmt->execute($sql_args); // Thực hiện câu truy vấn đã có ở dùng 21
    }
    catch(PDOException $e){
        throw $e; // thông báo lỗi
    }
    finally{
        // Đóng kết nối sau khi sử dụng
        unset($conn);
    }
}
// dùng để lấy id và hiện thị trong khóa đơn
function pdo_execute_return_last($sql){
    $sql_args = array_slice(func_get_args(),1); //
    try{
        $conn = pdo_get_connection(); // 
        $stmt = $conn->prepare($sql); //
        $stmt->execute($sql_args); // 
        return $conn->lastInsertId(); // để id tự động tăng 
    }
    catch(PDOException $e){
        throw $e; // thông báo lỗi
    }
    finally{
        // Đóng kết nối sau khi sử dụng
        unset($conn);
    }
}
// truy vấn nhiều dữ liệu
function pdo_query($sql){
    $sql_args = array_slice(func_get_args(),1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn -> prepare($sql);
        $stmt ->execute($sql_args);
        $rows = $stmt->fetchAll(); //  sử dụng để lấy tất cả các dòng dữ liệu từ kết quả của câu truy vấn SQL
        return $rows;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
// truy vấn 1 dữ liệu
function pdo_query_one($sql){
    $sql_args = array_slice(func_get_args(),1);
    try{
        $conn = pdo_get_connection();
        $stmt = $conn -> prepare($sql);
        $stmt ->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC); // được sử dụng để lấy một dòng dữ liệu từ kết quả của câu truy vấn SQL
        // đọc và hiển thị giá trị trong danh sách trả về
        return $row;
    }
    catch(PDOException $e){
        throw $e;
    }
    finally{
        unset($conn);
    }
}
?>
