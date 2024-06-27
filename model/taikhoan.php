<?php
function dangky($user,$pass,$email,$address,$tel,$role) {
    $sql = "insert into taikhoan(user,pass,email,address,tel,role) values('$user','$pass','$email','$address','$tel','$role')";
    pdo_execute($sql);
}
function check($user,$pass) {
    $sql = "select * from  taikhoan where user='".$user."' and  pass='".$pass."' ";
    $sp = pdo_query_one($sql);
    return $sp;
}
function checkemail($email) {
    $sql = "select * from  taikhoan where email='".$email."' ";
    $sp = pdo_query_one($sql);
    return $sp;
}
function update_taikhoan($id,$user,$pass,$email,$address,$tel,$role){
    $sql = "update taikhoan set  user='".$user."' , pass='".$pass."'  , email='".$email."' , address='".$address."' , tel='".$tel."' , role='".$role."'  where id=".$id;
    pdo_execute($sql);
}
?>