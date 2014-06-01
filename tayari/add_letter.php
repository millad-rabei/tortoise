<!DOCTYPE html>
<html>
<head> <meta charset="UTF-8"> </head>
<body>
<style>
 body {background-color:#B0E0E6;}
</style>
<center><h1> *** </h1></center>

<form action="home.php" method="post">

<fieldset align="right" ><legend align="right" >

<form>
 <input type="char" name="mozoo">: موضوع :
 <input type="char" name="shomare" >  شماره
 <br>
<input type="char" name="be" > : بــــــــــــه
</form> 
</legend>

<fieldset align="right" > 

<!-- ***EDITOR***   #b0c4de  -->



<!DOCTYPE html>
<html>
    <head>
        <title>A Simple Page with CKEditor</title>
        <!-- Make sure the path to CKEditor is correct. -->
        <script src="../ckeditor.js"></script>
    </head>
    <body>
        <form>
            <textarea name="editor1" id="editor1" rows="15" cols="160">
               <!-- This is my textarea to be replaced with CKEditor. -->
            </textarea>
            <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'editor1' );
            </script>
        </form>
    </body>
</html>


<hr>

<form>
<input type="submit" value="ارسال">
 <input type="char" name="atach"> : فایل ضمیمه
</form> 



<head>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js">
</script>
<script> 
$(document).ready(function(){
  $("#flip").click(function(){
    $("#panel").slideToggle("slow");
  });
});
</script>
 
<style> 
#panel,#flip
{
padding:5px;
text-align:center;
background-color:#0099FF;
border:solid 1px #c3c3c3;
}
#panel
{
padding:50px;
display:none;
}
</style>
</head>
<body>
 
<div id="flip">گیرندگان</div>
<div id="panel">

<fieldset>
<form action="">
<input type="checkbox" name="vehicle" value="r1">گیرنده  شماره 1
<input type="checkbox" name="vehicle" value="r2">گیرنده  شماره 2 
<input type="checkbox" name="vehicle" value="r3">گیرنده  شماره 3
<input type="checkbox" name="vehicle" value="r4">گیرنده  شماره 4 
<input type="checkbox" name="vehicle" value="r5">گیرنده  شماره 5
<input type="checkbox" name="vehicle" value="r6">گیرنده  شماره 6 
<input type="checkbox" name="vehicle" value="r7">گیرنده  شماره 7
<input type="checkbox" name="vehicle" value="r8">گیرنده  شماره 8 
<input type="checkbox" name="vehicle" value="r9">گیرنده  شماره 9
<br>
<input type="checkbox" name="vehicle" value="r10">گیرنده شماره10
<input type="checkbox" name="vehicle" value="r11">گیرنده شماره11 
<input type="checkbox" name="vehicle" value="r12">گیرنده شماره12
<input type="checkbox" name="vehicle" value="r13">گیرنده شماره13 
<input type="checkbox" name="vehicle" value="r14">گیرنده شماره14
<input type="checkbox" name="vehicle" value="r15">گیرنده شماره15 
<input type="checkbox" name="vehicle" value="r16">گیرنده شماره16
<input type="checkbox" name="vehicle" value="r17">گیرنده شماره17 
<input type="checkbox" name="vehicle" value="r18">گیرنده شماره18
</div>
</body>

<tagname>: نوع نامه </tagname>

<form>
<input type="radio" name="text" value="1"> صادره
<input type="radio" name="text" value="2" > داخلی
</form> 

</fieldset>

<input type="submit" value="ارسال">
<input type="submit" value="ذخیره">

</form>
</body>
</html>