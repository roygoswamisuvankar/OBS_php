<html>
    <head>
        <title></title>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <?php
include_once 'dbconfig.php';
include_once 'usersession.php';

$prev_card = mysqli_query($connect,"select *from debit");

if(isset($_POST['save'])){
    $phone = $_POST['phone'];
    $cardno = $_POST['cardno'];
    $holder = $_POST['holder'];
    $cvv = $_POST['cvv'];
    $expire = $_POST['date'];
    $bankname = $_POST['bank'];
    $pin = $_POST['pin'];
    
    $pin_encrypt = md5($pin);
    
    while($debit_card = mysqli_fetch_array($prev_card)){
        
        if($debit_card['cardno'] == $cardno){
            echo '<script>swal({
                                      title: "Error!",
                                      text: "This card number already used, please try another!",
                                      icon: "warning"
                                    }).then(function() {
                                            window.location = "user_welcome.php";
                                    });</script>';
        }
        else
        {
            $save_card = mysqli_query($connect, "insert into debit(phone,cardno,holder,cvv,expire,bankname,pin) values('$phone','$cardno','$holder','$cvv','$expire','$bankname','$pin_encrypt')");
            echo '<script>swal({
                                      title: "Success!",
                                      text: "Your card saved successfully",
                                      icon: "success"
                                    }).then(function() {
                                            window.location = "user_welcome.php";
                                    });</script>';
        }
    }
    
    
}
?>
    </body>
</html>


