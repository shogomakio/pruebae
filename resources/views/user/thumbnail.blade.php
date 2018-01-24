    
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" type="text/css" href="css/imgareaselect-default.css" />
  <script type="text/javascript" src="scripts/jquery.min.js"></script>
  <script type="text/javascript" src="scripts/jquery.imgareaselect.pack.js"></script>

</head>
<body>
<form method="POST" action="user/thumbnail" onSubmit="">

<div class="container">
    <img id="photo" src="https://i.ytimg.com/vi/3R2uvJqWeVg/maxresdefault.jpg">
</div>
<button type="submit" class="btn btn-success">Checkout</button>
</form>


<script type="text/javascript"> 

// function check(){

// 	if(window.confirm('送信してよろしいですか？')){ // 確認ダイアログを表示

// 		return true; // 「OK」時は送信を実行

// 	}
// 	else{ // 「キャンセル」時の処理

// 		window.alert('キャンセルされました'); // 警告ダイアログを表示
// 		return false; // 送信を中止

// 	}

// }

// $(document).on('click', 'button', function () {
    $('#photo').imgAreaSelect({ x1: 0, y1: 0, x2: 250, y2: 400, maxHeight:400, minHeight:400, maxWidth:250,minWidth:250,
    });

//     $('img#submit').click(function(){            
//            $.ajax({  
//                 url:postURL,  
//                 method:"POST",  
//                 // data:$('#add_name').serialize(),
//                 type:'json',
//                 // success:function(data)  
//                 // {
//                 //     // if(data.error){
//                 //     //     printErrorMsg(data.error);
//                 //     // }else{
//                 //     //     i=1;
//                 //     //     $('.dynamic-added').remove();
//                 //     //     $('#add_name')[0].reset();
//                 //     //     $(".print-success-msg").find("ul").html('');
//                 //     //     $(".print-success-msg").css('display','block');
//                 //     //     $(".print-error-msg").css('display','none');
//                 //     //     $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
//                 //     // }

//                 // }
//                 function redirect(){
//                     location.href='user/thumbnail';
//                 }  
//            });  }
// });
$('img#photo').imgAreaSelect({
//     onSelectEnd: function redirect(){
// var url = selection.heigth;
          // alert('width: ' + selection.width + '; height: ' + selection.height);
            // location.href ='user.image', ["height" => selection.height, "widt"=>selection.width];
            // var url = 'user/thumbnail?heigth=' + selection.height;
            // var data = {'height':'selection.height', 'widt':'selection.width'};
            location.href = 'user/thumbnail';
            // postForm('user/thumbnail', data);
            // $.redirect("/user/thumbnail")
        }
    });



      

// $('#imgareaselect').on('click', function redirect(){
//                     location.href='home.html';
// });



// $('#submit').click(function(){            
//            $.ajax({  
//                 url:postURL,  
//                 method:"POST",  
//                 data:$('#add_name').serialize(),
//                 type:'json',
//                 // success:function(data)  
//                 // {
//                 //     // if(data.error){
//                 //     //     printErrorMsg(data.error);
//                 //     // }else{
//                 //     //     i=1;
//                 //     //     $('.dynamic-added').remove();
//                 //     //     $('#add_name')[0].reset();
//                 //     //     $(".print-success-msg").find("ul").html('');
//                 //     //     $(".print-success-msg").css('display','block');
//                 //     //     $(".print-error-msg").css('display','none');
//                 //     //     $(".print-success-msg").find("ul").append('<li>Record Inserted Successfully.</li>');
//                 //     // }

//                 // }
//                 function redirect(){
//                     location.href='home.html';
//                 }  
//            });  }


// $(document).ready(function () {
//   $('#photo').imgAreaSelect({ x1: 0, y1: 0, x2: 250, y2: 400, maxHeight:400, minHeight:400, maxWidth:250,minWidth:250 });
// });
</script>
</body>
</html>
    